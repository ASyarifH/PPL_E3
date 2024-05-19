@extends('Template.templateP')

@section('content')
    <div class="container">
        <div class="container2 d-flex justify-content-center align-items-center">
            <div>
                <h2>Hasil Prediksi</h2>
                <p>{{ $prediction }}</p>
                @if (strpos($prediction, 'Padi') !== false)
                    <p>Padi tumbuh optimal pada suhu {{ $suhu }} C karena mendukung pertumbuhan padi dalam rentang suhu optimal yang memastikan proses fotosintesis dan pertumbuhan tanaman berlangsung baik.</p>
                    <p>Curah hujan &quot;{{ $curah_hujan }}&quot; merupakan kondisi ideal untuk padi karena mendukung kebutuhan air yang esensial untuk pertumbuhannya.</p>
                    <p>Tingkat pH tanah {{ $ph }} mendukung pertumbuhan padi karena berada dalam rentang yang memungkinkan penyerapan nutrisi secara efektif.</p>
                    <p>Kelembapan {{ $kelembapan }}% mendukung pertumbuhan padi karena memastikan kondisi lingkungan yang ideal untuk metabolisme dan pertumbuhan tanaman.</p>
                @else (strpos($prediction, 'Jagung') !== false)
                    <p>Jagung tumbuh baik pada suhu {{ $suhu }} C karena mendukung pertumbuhan jagung dalam rentang suhu optimal yang memastikan proses fotosintesis dan pertumbuhan tanaman berlangsung baik.</p>
                    <p>Curah hujan &quot;{{ $curah_hujan }}&quot; merupakan kondisi ideal untuk jagung karena mendukung kebutuhan air yang esensial untuk pertumbuhannya tanpa menyebabkan kondisi tanah yang terlalu basah.</p>
                    <p>Tingkat pH tanah {{ $ph }} mendukung pertumbuhan jagung karena berada dalam rentang yang memungkinkan penyerapan nutrisi secara efektif.</p>
                    <p>Kelembapan {{ $kelembapan }}% mendukung pertumbuhan jagung karena memastikan kondisi lingkungan yang ideal untuk metabolisme dan pertumbuhan tanaman.</p>

                @endif
            </div>
        </div>
    </div>
@endsection
