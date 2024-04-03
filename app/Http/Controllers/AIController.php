<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AIController extends Controller
{
    public function index()
    {
        $curah_hujan_choices = [
            'Cerah', 'Cerah Berawan', 'Berawan', 'Hujan Ringan', 'Hujan Sedang', 'Hujan Lebat', 'Hujan Petir'
        ];

        return view('AI.index', compact('curah_hujan_choices'));
    }

    public function predict(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'suhu' => 'required|numeric',
            'curah_hujan' => 'required',
            'ph' => 'required|numeric',
        ]);

        // Ambil data input dari form
        $suhu = $validatedData['suhu'];
        $curah_hujan = $validatedData['curah_hujan'];
        $ph = $validatedData['ph'];

        // Panggil fungsi prediksi
        $prediction = $this->predict_crop($suhu, $curah_hujan, $ph);

        // Print prediksi
        Log::info('Prediction: ' . $prediction);

        // Kirim hasil prediksi ke tampilan
        return view('AI.output', [
            'suhu' => $suhu,
            'curah_hujan' => $curah_hujan,
            'ph' => $ph,
            'prediction' => $prediction,
        ]);
    }

    // Fungsi untuk prediksi tanaman cocok berdasarkan input
    private function predict_crop($suhu, $curah_hujan, $Tanah_pH)
    {
        // Jika suhu berada di rentang 27-32, curah hujan Cerah, Cerah Berawan, atau Berawan, dan pH di rentang 5,5-7, prediksi Jagung
        if ($suhu >= 27 && $suhu <= 32 && in_array($curah_hujan, ['Cerah', 'Cerah Berawan', 'Berawan']) && $Tanah_pH >= 5.5 && $Tanah_pH <= 7) {
            return 'Tanaman yang cocok untuk data tersebut adalah Jagung';
        }
        // Jika suhu berada di rentang 20-26, curah hujan Hujan Ringan, Hujan Sedang, atau Hujan Lebat, dan pH di rentang 4-7, prediksi Padi
        elseif ($suhu >= 20 && $suhu <= 26 && in_array($curah_hujan, ['Hujan Ringan', 'Hujan Sedang', 'Hujan Lebat']) && $Tanah_pH >= 4 && $Tanah_pH <= 7) {
            return 'Tanaman yang cocok untuk data tersebut adalah Padi';
        }
        // Jika tidak memenuhi kondisi di atas, tidak ada prediksi
        else {
            return 'Tidak dapat diprediksi';
        }
    }
}
