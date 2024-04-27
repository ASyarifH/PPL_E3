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
    
        if (empty($curah_hujan) || empty($pH)) {
            return redirect()->back()->withInput()->withErrors('Data curah hujan dan data pH tanah tidak boleh kosong');
        }


        if ($curah_hujan === "Hujan Petir" and $pH < 5.5 || $pH > 7.5) {
            return view('AI.output', [
                'suhu' => $suhu,
                'curah_hujan' => $curah_hujan,
                'ph' => $pH,
                'prediction' => 'Tidak dapat diprediksi: Curah Hujan dan pH tanah tidak mendukung untuk penanaman'
            ]);
        }    
        
        if ($pH < 5.5 || $pH > 7.5) {
            return view('AI.output', [
                'suhu' => $suhu,
                'curah_hujan' => $curah_hujan,
                'ph' => $pH,
                'prediction' => 'Tidak dapat diprediksi: Nilai pH terlalu rendah atau tinggi untuk melakukan penanaman'
            ]);
        }
        
        if ($curah_hujan === "Hujan Petir") {
            return view('AI.output', [
                'suhu' => $suhu,
                'curah_hujan' => $curah_hujan,
                'ph' => $pH,
                'prediction' => 'Tidak dapat diprediksi: Curah Hujan ini termasuk badai yang memungkinkan untuk merusak tanaman'
            ]);
        }    
        
        // Panggil skrip Python
        $command = "C:\Users\ViCtus\AppData\Local\Programs\Python\Python311\python.exe";
        $scriptPath = base_path('app/Scriptpy/AI.py');
        $process = new Process([$command, $scriptPath, $suhu, $curah_hujan, $pH]);
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
            'prediction' => $prediction
        ]);
    }
}
