@extends('Template.templateP')

@section('content')
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            body {
                background-color: #F5F5F5;
            }

            .navbar {
                margin-bottom: 20px;
            }

            .navbar a{
                -webkit-text-fill-color: #729043;
                font-size: 18px;
                text-decoration: none;
                font-weight: 500;
                margin-left: 35px;
                transition: 3s;
            }

            .weather-card{
                background-color: #F6F3EE;
                border-radius: 10px;
            }

            .weather-card .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly ;
                
            }body {
                background-color: #F5F5F5;
            }

            .navbar {
                margin-bottom: 20px;
            }

            .navbar a{
                -webkit-text-fill-color: #729043;
                font-size: 18px;
                text-decoration: none;
                font-weight: 500;
                margin-left: 35px;
                transition: 3s;
            }

            .weather-card{
                background-color: #F6F3EE;
                border-radius: 10px;
            }



            .weather-card .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly ;
                
            }

            .site-footer{
                color: #729043;
                text-align: center;
                bottom: 0;
                width: 100%;
                padding: 10px 0;
                background-color: #f3f3f3;
            }
        </style>
    </head>
    <body>
        <div class="text-center" style="padding-top: 10px;">
            <h1>HASIL PREDIKSI TANAM</h1>
            <div class="container my-5">
                <div class="card weather-card p-4 mb-4">
                    <div class="row text-center align-items-center">
                        <div class="col-md-6 mb-3">
                            <img src="{{ asset('img/hasil.png') }}" alt="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <h2 class="text-start">Tanaman yang cocok untuk kondisi saat ini: {{ $prediction }}</h2>
                            <hr>
                            @if (strpos($prediction, 'Padi') !== false)
                                <h2 class="text-start"> Di daerah {{ $tempat }}, dengan {{ $curah_hujan }}, kelembapan {{ $kelembapan }}%, dan suhu  {{ $suhu }}°C maka padi cocok untuk ditanam pada saat ini.</h2>
                            @elseif (strpos($prediction, 'Jagung') !== false)
                                <h2 class="text-start"> Di daerah {{ $tempat }}, dengan {{ $curah_hujan }}, kelembapan {{ $kelembapan }}%, dan suhu  {{ $suhu }}°C maka Jagung cocok untuk ditanam pada saat ini.</h2>
                            @else
                                <h2 class="text-start"> 
                                    @if ($suhu < 20 || $suhu > 32)
                                        Suhu saat ini berada di luar kisaran optimal untuk penanaman.
                                    @elseif ($curah_hujan === "Hujan Petir" && ($ph < 5.5 || $ph > 7.5))
                                        Kondisi curah hujan yang ekstrem dan tingkat keasaman tanah yang tidak sesuai membuat penanaman tidak memungkinkan.
                                    @elseif ($ph < 5.5 || $ph > 7.5)
                                        Tingkat pH tanah tidak berada dalam rentang yang ideal untuk penanaman.
                                    @elseif ($curah_hujan === "Hujan Petir")
                                        Curah hujan yang sangat lebat dan disertai petir dapat merusak tanaman.
                                    @elseif ($kelembapan < 60 || $kelembapan > 95)
                                        Tingkat kelembapan saat ini terlalu rendah atau terlalu tinggi untuk mendukung penanaman.
                                    @elseif (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir")
                                        Suhu yang tidak sesuai dan curah hujan ekstrem membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && ($ph < 5.5 || $ph > 7.5))
                                        Suhu yang tidak sesuai dan tingkat keasaman tanah yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && ($kelembapan < 60 || $kelembapan > 95))
                                        Suhu yang tidak sesuai dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif ($curah_hujan === "Hujan Petir" && ($ph < 5.5 || $ph > 7.5) && ($kelembapan < 60 || $kelembapan > 95))
                                        Curah hujan yang ekstrem, tingkat keasaman tanah, dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif ($curah_hujan === "Hujan Petir" && ($kelembapan < 60 || $kelembapan > 95))
                                        Curah hujan ekstrem dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($ph < 5.5 || $ph > 7.5) && ($kelembapan < 60 || $kelembapan > 95))
                                        Tingkat keasaman tanah dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($ph < 5.5 || $ph > 7.5))
                                        Suhu yang tidak sesuai, curah hujan ekstrem, dan tingkat keasaman tanah yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($kelembapan < 60 || $kelembapan > 95))
                                        Suhu yang tidak sesuai, curah hujan ekstrem, dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && ($ph < 5.5 || $ph > 7.5) && ($kelembapan < 60 || $kelembapan > 95))
                                        Suhu yang tidak sesuai, tingkat keasaman tanah, dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif ($curah_hujan === "Hujan Petir" && ($ph < 5.5 || $ph > 7.5) && ($kelembapan < 60 || $kelembapan > 95))
                                        Curah hujan ekstrem, tingkat keasaman tanah, dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @elseif (($suhu < 20 || $suhu > 32) && $curah_hujan === "Hujan Petir" && ($ph < 5.5 || $ph > 7.5) && ($kelembapan < 60 || $kelembapan > 95))
                                        Suhu yang tidak sesuai, curah hujan ekstrem, tingkat keasaman tanah, dan kelembapan yang tidak ideal membuat penanaman tidak memungkinkan.
                                    @else
                                        Kondisi cuaca dan/atau tanah saat ini tidak mendukung untuk penanaman.
                                    @endif
                                </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        <footer class="site-footer">
            Copyright @ 2024, SIPETANI
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
@endsection
