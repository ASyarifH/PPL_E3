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
        // Validasi input
        $request->validate([
            'suhu' => 'required|numeric',
            'curah_hujan' => 'required|string',
            'pH' => 'required|numeric',
        ]);

        // Ambil data dari form
        $suhu = $request->input('suhu');
        $curah_hujan = $request->input('curah_hujan');
        $pH = $request->input('pH');

        // Panggil skrip Python
        $command = "C:\Users\ViCtus\AppData\Local\Programs\Python\Python311\python.exe";
        $scriptPath = base_path('app/Scriptpy/AI.py');
        $process = new Process([$command, $scriptPath, $suhu, $curah_hujan, $pH]);
        $process->run();
        
        // Tangani hasil
        $output = $process->getOutput() ?? 'Tidak dapat diprediksi';

        // Pisahkan hasil menjadi baris
        $lines = explode("\n", $output);

        // Ambil hasil prediksi
        $prediction = null;
        foreach ($lines as $line) {
            if (strpos($line, "Hasil Prediksi:") !== false) {
                $prediction = str_replace("Hasil Prediksi:", "", $line);
                break;
            }
        }

        // Kirim hasil prediksi ke tampilan
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'prediction' => $prediction
        ]);
    }
}
