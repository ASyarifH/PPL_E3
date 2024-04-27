<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    public function DiskusiAdmin()
    {
        $diskusi = Diskusi::all();
        return view('diskusi.indexA', compact('diskusi'));
    }
    public function DiskusiPetani()
    {
        $diskusi = Diskusi::all(); // Ambil semua data diskusi
        return view('diskusi.indexP', compact('diskusi')); // Kirim data diskusi ke view
    }

    public function create()
    {
        return view('diskusi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi manual
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        // Membuat slug dengan tambahan timestamp untuk memastikan keunikan
        $slug = Str::slug($request->title) . '-' . now()->timestamp;
    
        // Membuat diskusi
        Diskusi::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('diskusiP');
    }

    public function show($slug)
    {
        $diskusi = Diskusi::where('slug', $slug)->firstOrFail();
        return view('diskusi.show', ['diskusi' => $diskusi]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
