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
        $diskusi = Diskusi::orderBy('created_at', 'desc')->get();
        return view('diskusi.indexA', compact('diskusi'));
    }
    public function DiskusiPetani()
    {
        $diskusi = Diskusi::orderBy('created_at', 'desc')->get();
        return view('diskusi.indexP', compact('diskusi'));
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
    
        return redirect()->route('diskusiP');
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

// if search()
// {
//     $customers = Customer::where('full_name', 'LIKE', "%{$search}%")->get();
//     return($costumer)
// }
