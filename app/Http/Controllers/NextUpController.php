<?php

// app/Http/Controllers/NextUpController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class NextUpController extends Controller
{
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

        return view('nextup',compact('data'));  // Mengarahkan ke view nextup.blade.php
    }
    public function show($data_lagu)
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

        // return view('nextup',compact('data'));  // Mengarahkan ke view nextup.blade.php
    }
}
