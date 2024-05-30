<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\Jawaban;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    public function DiskusiAdmin()
    {
        $diskusis = Diskusi::orderBy('created_at', 'desc')->get();
        return view('diskusi.indexA', compact('diskusis'));
    }
    public function DiskusiPetani()
    {
        $diskusis = Diskusi::orderBy('created_at', 'desc')->get();
        return view('diskusi.indexP', compact('diskusis'));
    }

    public function pertanyaansaya()
    {
        $pertanyaansaya = Diskusi::where('user_id', Auth::id())->get();
        return view('diskusi.pertanyaansaya', compact('pertanyaansaya'));
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
            'pertanyaan' => 'required',
        ]);

        $slug = Str::slug($request->pertanyaan) . '-' . now()->timestamp;
    
        // Membuat diskusi
        Diskusi::create([
            'pertanyaan' => $request->pertanyaan,
            'slug' => $slug,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('diskusiP')->with('success_buat', 'pertanyaan berhasil ditambahkan');
    }

    public function showAdmin($slug)
    {
        $diskusi = Diskusi::where('slug', $slug)->firstOrFail();
        return view('diskusi.showA', compact('diskusi'));
    }
    
    public function showPetani($slug)
    {
        $diskusi = Diskusi::where('slug', $slug)->firstOrFail();
        return view('diskusi.showP', compact('diskusi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $diskusi = Diskusi::findOrFail($id);
        $referrer = request()->headers->get('referer');
        return view('diskusi.edit', compact('diskusi', 'referrer'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
        ]);
    
        $diskusi = Diskusi::findOrFail($id);
        $diskusi->pertanyaan = $request->input('pertanyaan');
        $diskusi->save();
    
        $referrer = $request->input('referrer');
        
        if (strpos($referrer, route('diskusiP')) !== false) {
            return redirect()->route('diskusiP')->with('success_edit_pertanyaan', 'Pertanyaan berhasil diubah');
        } elseif (strpos($referrer, route('diskusi.showP', $diskusi->slug)) !== false) {
            return redirect()->route('diskusi.showP', $diskusi->slug)->with('success_edit_pertanyaan', 'Pertanyaan berhasil diubah');
        } else {
            // Default redirection if the referrer is not recognized
            return redirect()->route('diskusi.index')->with('success_edit_pertanyaan', 'Pertanyaan berhasil diubah');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}