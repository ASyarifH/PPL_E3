@extends('Template.template')

@section('content')
    <div class="container">
        <div class="container2">
            <h2>Hasil Prediksi</h2>
            <p>Inputan:</p>
            <ul>
                <li>Suhu: {{ $suhu }}</li>
                <li>Curah Hujan: {{ $curah_hujan }}</li>
                <li>Tingkat pH Tanah: {{ $ph }}</li>
            </ul>
            <br></br>
            <h2>Prediksi</h2>
            <p>{{ $prediction }}</p>
        </div>
    </div>
@endsection
