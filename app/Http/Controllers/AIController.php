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

//     public function predict(Request $request)
//     {
//         // Validasi input
//         $request->validate([
//             'suhu' => 'required|numeric',
//             'curah_hujan' => 'required|string',
//             'pH' => 'required|numeric',
//             'kecepatan_angin' => 'required|string',
//             'kelembapan' => 'required|string',
//             'intensitas_cahaya' => 'required|string',
//             'intensitas_curah_hujan' => 'required|string',
//         ]);
    
//         // Ambil data dari form
//         $suhu = $request->input('suhu');
//         $curah_hujan = $request->input('curah_hujan');
//         $pH = $request->input('pH');
//         $kecepatan_angin = $request->input('kecepatan_angin');
//         $kelembapan = $request->input('kelembapan');
//         $intensitas_cahaya = $request->input('intensitas_cahaya');
//         $intensitas_curah_hujan = $request->input('intensitas_curah_hujan');
    
//         // Panggil skrip Python
//         $command = "C:\Users\ViCtus\AppData\Local\Programs\Python\Python311\python.exe";
//         $scriptPath = base_path('app/Scriptpy/AI.py');
//         $process = new Process([$command, $scriptPath, $suhu, $curah_hujan, $pH, $kecepatan_angin, $kelembapan, $intensitas_cahaya, $intensitas_curah_hujan]);
//         $process->run();
        
//         // Tangani hasil
//         $output = $process->getOutput() ?? 'Tidak dapat diprediksi';
    
//         // Ambil hasil prediksi
//         $prediction = null;
//         if (strpos($output, "Hasil Prediksi:") !== false) {
//             $prediction = str_replace("Hasil Prediksi:", "", $output);
//         }
    
//         // Kirim hasil prediksi ke tampilan
//         return view('AI.output', [
//             'suhu' => $suhu,
//             'curah_hujan' => $curah_hujan,
//             'ph' => $pH,
//             'kecepatan_angin' => $kecepatan_angin,
//             'kelembapan' => $kelembapan,
//             'intensitas_cahaya' => $intensitas_cahaya,
//             'intensitas_curah_hujan' => $intensitas_curah_hujan,
//             'prediction' => $prediction
//         ]);
//     }
// }


    public function predict(Request $request)
    {
    $request->validate([
        'suhu' => 'required|numeric',
        'curah_hujan' => 'required|string',
        'pH' => 'required|numeric',
        'kelembapan' => 'required|numeric'
    ]);

    $suhu = $request->input('suhu');
    $curah_hujan = $request->input('curah_hujan');
    $pH = $request->input('pH');
    $kelembapan = $request->input('kelembapan');

    if ($curah_hujan === "Hujan Petir" && ($pH < 5.5 || $pH > 7.5)) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'prediction' => 'Tidak dapat diprediksi: Curah Hujan dan pH tanah tidak mendukung untuk penanaman'
        ]);
    }    

    if ($pH < 5.5 || $pH > 7.5) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'prediction' => 'Tidak dapat diprediksi: Nilai pH terlalu rendah atau tinggi untuk melakukan penanaman'
        ]);
    }

    if ($curah_hujan === "Hujan Petir") {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'prediction' => 'Tidak dapat diprediksi: Curah Hujan ini termasuk badai yang memungkinkan untuk merusak tanaman'
        ]);
    }

    if ($kelembapan < 60 || $pH > 95) {
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $pH,
            'kelembapan' => $kelembapan,
            'prediction' => 'Tidak dapat diprediksi: Nilai kelembapan terlalu rendah/kering atau tinggi/basah untuk melakukan penanaman'
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
        'prediction' => $prediction
        ]);
    }
}