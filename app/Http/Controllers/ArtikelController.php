<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function toggleBookmark(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $user = auth()->user();
    
        // Periksa apakah artikel sudah di-bookmark oleh user
        $bookmark = Bookmark::where('user_id', $user->id)
                            ->where('artikel_id', $artikel->id)
                            ->first();
    
        // Jika sudah di-bookmark, hapus dari bookmark
        if ($bookmark) {
            $bookmark->delete();
        } else {
            // Jika belum di-bookmark, tambahkan ke bookmark
            Bookmark::create([
                'user_id' => $user->id,
                'artikel_id' => $artikel->id
            ]);
        }
    
        // Redirect ke halaman sebelumnya
        return back();
    }

    public function ArtikelAdmin()
    {
        $artikels = Artikel::orderByDesc('bookmark')->get();
        return view('artikel.indexA', compact('artikels'));
    }
    
    public function ArtikelPetani()
    {
        $artikels = Artikel::orderByDesc('bookmark')->get();
        return view('artikel.indexP', compact('artikels'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('media'), $imageName);
    
        Artikel::create([
            'judul' => $validatedData['judul'],
            'isi' => $validatedData['isi'],
            'gambar' => $imageName,
        ]);
    
        return redirect()->route('artikelA');
    }
    

    public function showAdmin(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.showA', compact('artikel'));
    }
    
    public function showPetani(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.showP', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        //
    }

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