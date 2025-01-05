<?php

// app/Http/Controllers/PlayerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        // File JSON di storage
        $path = 'album.json'; // path relatif dari folder storage/app/

        // Membaca file JSON menggunakan Storage facade
        if (Storage::exists($path)) {
            $jsonContent = Storage::get($path);

            // Decode JSON menjadi array
            $data = json_decode($jsonContent, true);

            if (!$data || !isset($data['lagu'])) {
                return response()->json(['error' => 'Invalid JSON structure'], 400);
            }

            // Ambil nilai 'playlist' dari request, dan ubah menjadi array
            $playlist = $request->input('playlist'); // Ambil parameter playlist
            if (!$playlist) {
                return response()->json(['error' => 'Playlist parameter is missing'], 400);
            }

            // Ambil nilai 'trackIndex' dari request
            $trackIndex = $request->input('trackIndex');// Ambil parameter trackIndex
            // dd($request);
            // Konversi playlist menjadi array integer
            $playlistIds = array_map('intval', explode(',', $playlist));
            
            // Filter lagu berdasarkan id_lagu yang ada di playlist
            $filteredLagu = array_filter($data['lagu'], function ($lagu) use ($playlistIds) {
                return in_array($lagu['id_lagu'], $playlistIds);
            });

            // Menghubungkan array lagu dengan artis berdasarkan `id_artis` dan `id_artis` dari artis
            foreach ($filteredLagu as &$value) {
                // Cari artis yang sesuai dengan id_artis
                $artist = array_filter($data['artis'], function($art) use ($value) {
                    return $art['id_artis'] == $value['id_artis'];
                });
                // Ambil nama artis dari hasil filter
                $value['nama_artis'] = !empty($artist) ? reset($artist)['nama_artis'] : 'Unknown';
            }
           
           // Membuat array untuk memetakan ID ke indeks dalam array lagu
           $order = [];
           foreach ($filteredLagu as $key => $val) {
                $order[] = array_search($val['id_lagu'], $playlistIds);
           }
           
           // Mengurutkan lagu berdasarkan array urutan
           array_multisort($order, SORT_ASC, $filteredLagu);
           
            // Format hasil ke dalam array tanpa id_lagu sebagai key
            $formattedPlaylist = array_map(function ($lagu) use ($data){
                return [
                    'url' => $lagu['url_lagu'], // URL of the song
                    'title' => $lagu['nama_lagu'], // Song title
                    'artist' => $lagu['nama_artis'], // Artist name
                    'cover' => $lagu['img'], // Cover image
                ];
            }, array_values($filteredLagu)); // Ensure it's indexed numerically

            // dd($formattedPlaylist, $filteredLagu, $playlistIds,$artist,$trackIndex);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }

        return view('player', compact('formattedPlaylist','trackIndex'));  // Mengarahkan ke view player.blade.php
    }
}
