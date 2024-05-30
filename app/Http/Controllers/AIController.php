<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AIController extends Controller
{
    public function index()
    {
        return view('AI.index');
    }

    public function predict(Request $request)
    {
    $request->validate([
        'suhu' => 'required|numeric',
        'curah_hujan' => 'required|string',
        'pH' => 'required|numeric',
        'kelembapan' => 'required|numeric',
        'tempat' => 'required'
    ]);

    $suhu = $request->input('suhu');
    $curah_hujan = $request->input('curah_hujan');
    $pH = $request->input('pH');
    $kelembapan = $request->input('kelembapan');
    $tempat = $request->input('tempat');
    
    if ($suhu < 20 || $suhu > 32) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($pH < 5.5 || $pH > 7.5) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($curah_hujan === "Hujan Petir") {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($kelembapan < 60 || $kelembapan > 95) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir") {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && ($pH < 5.5 || $pH > 7.5)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($curah_hujan === "Hujan Petir" && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($pH < 5.5 || $pH > 7.5) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && ($pH < 5.5 || $pH > 7.5) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if ($curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    if (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5) && ($kelembapan < 60 || $kelembapan > 95)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'tempat' => $tempat,
            'prediction' => 'Tidak dapat diprediksi'
        ]);
    }
    
    // Panggil skrip Python
    $command = "C:\Users\ViCtus\AppData\Local\Programs\Python\Python311\python.exe";
    $scriptPath = base_path('app/Scriptpy/AI.py');
    $process = new Process([$command, $scriptPath, $suhu, $curah_hujan, $pH, $kelembapan]);
    $process->run();
    
    // Tangani hasil
    $output = $process->getOutput() ?? 'Tidak dapat diprediksi';

    // Ambil hasil prediksi
    $prediction = null;
    if (strpos($output, "Hasil Prediksi:") !== false) {
        $prediction = str_replace("Hasil Prediksi:", "", $output);
    }

    // Kirim hasil prediksi ke tampilan
    return view('AI.output', [
        'suhu' => $suhu,
        'curah_hujan' => $curah_hujan,
        'ph' => $pH,
        'kelembapan' => $kelembapan,
        'tempat' => $tempat,
        'prediction' => $prediction,
        ]);
    }
}