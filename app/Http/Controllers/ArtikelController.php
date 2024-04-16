<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function ArtikelAdmin()
    {
        return view('artikel.indexA');
    }
    public function ArtikelPetani()
    {
        return view('artikel.indexP');
    }
}