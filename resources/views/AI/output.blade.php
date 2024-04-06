@extends('Template.template')

@section('content')
    <div class="container">
        <div class="container2">
            <h2>Inputan</h2>
            <p>Suhu: {{ $suhu }}</p>
            <p>Curah Hujan: {{ $curah_hujan }}</p>
            <p>Tingkat Keasaman tanah (pH): {{ $ph }}</p>
            <h2>Prediksi</h2>
            <p>{{ $prediction }}</p>
        </div>
    </div>
@endsection