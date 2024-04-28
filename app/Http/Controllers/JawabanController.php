<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        $request->validate([
            'jawaban' => 'required',
        ]);

        $diskusi = Diskusi::where('slug', $slug)->firstOrFail();

        Jawaban::create([
            'jawaban' => $request->jawaban,
            'user_id' => Auth::id(),
            'diskusi_id' => $diskusi->id,
        ]);

        return redirect()->route('diskusi.show', $slug);
    }

    public function show(string $id)
    {
        //
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
