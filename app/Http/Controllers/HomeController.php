<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //public $data;
    public function index()
    {
        // File JSON di storage
        $path = 'album.json'; // path relatif dari folder storage/app/

        // Membaca file JSON menggunakan Storage facade
        if (Storage::exists($path)) {
            $jsonContent = Storage::get($path);
            
            // Decode JSON menjadi array atau objek
            $data = json_decode($jsonContent, true); // true untuk array, false untuk objek
            
            //return response()->json($data);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
        //return view('home');  // Mengarahkan ke view home.blade.php
        return view('home', compact('data'));
    }

    // private function readJson()
    // {
    //     // File JSON di storage
    //     $path = 'album.json'; // path relatif dari folder storage/app/

    //     // Membaca file JSON menggunakan Storage facade
    //     if (Storage::exists($path)) {
    //         $jsonContent = Storage::get($path);
            
    //         // Decode JSON menjadi array atau objek
    //         $data = json_decode($jsonContent, true); // true untuk array, false untuk objek
            
    //         return response()->json($data);
    //     } else {
    //         return response()->json(['error' => 'File not found'], 404);
    //     }
    // }
}

