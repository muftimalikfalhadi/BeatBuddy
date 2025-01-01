<?php

// app/Http/Controllers/PlayerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return view('player');  // Mengarahkan ke view player.blade.php
    }
}

