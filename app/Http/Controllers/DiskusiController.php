<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiskusiController extends Controller
{
    public function DiskusiAdmin()
    {
        return view('diskusi.indexA');
    }
    public function DiskusiPetani()
    {
        return view('diskusi.indexP');
    }
}