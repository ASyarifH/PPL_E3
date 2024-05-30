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

        .btn-success {
            background-color: #6c757d;
            border: none;
        }

        .btn-success:hover {
            background-color: #5a6268;
        }

        .navbar .navbar-nav .nav-link {
            color: #729043;
            /* display: flex; */
            align-items: center;
            font-weight: 500 ;
        }

        .navbar .navbar-nav  .nav-link:hover {
            color: #4B4D26;
        }


        .weather-card{
            background-color: #F6F3EE;
            border-radius: 10px;
        }

        .weather-card .data {
            background-color: #A8C686;
            border-radius: 10px;
            padding: 10px;
            margin: 10px 0;
            height: 120px;
            width: 300px;
        }

        .weather-card .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly ;
            
        }

        .data {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            height: 120px; /* Tinggi kontainer */
            position: relative; /* Menjadikan posisi yang relatif */
        }

        .data img {
            width: 50px;
            height: 50px;
            position: absolute; /* Menjadikan posisi yang absolut */
            top: 50%; /* Menempatkan gambar di tengah vertikal */
            right: 5%; /* Menempatkan gambar di sebelah kanan */
            transform: translateY(-50%); /* Menyesuaikan posisi vertikal */
        }


        .data h5{
            left: 11%;
            position: absolute;
            top: 40%; /* Menempatkan gambar di tengah vertikal */
            transform: translateY(-50%); /* Menyesuaikan posisi vertikal */
        }


        .data p{
            position: absolute;
            left: 11%;
            top: 58%; /* Menempatkan gambar di tengah vertikal */
            transform: translateY(-50%); /* Menyesuaikan posisi vertikal */
        }

        .prediction-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .prediction-form input{
            -webkit-text-fill-color: #F6F6E9;
        }

        .prediction-form button{
            background-color: #729043;
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
    <main>
        <div class="container my-5">
            <div class="card weather-card p-4 mb-4">
                <h2 class="mb-4 text-center">CUACA BMKG</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="data">
                            <h5>Tanggal</h5>
                            <p id="date"></p>
                            <img src="img/tanggal.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="data">
                            <h5>Daerah</h5>
                            <p id="location"></p>
                            <img src="img/daerah.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="data">
                            <h5>Prediksi Cuaca</h5>
                            <p id="prediction"></p>
                            <img src="img/cuaca.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="data">
                            <h5>Kelembapan</h5>
                            <p id="humidity"></p>
                            <img src="img/kelembapan.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="data">
                            <h5>Suhu</h5>
                            <p id="temperature"></p>
                            <img src="img/suhu.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mx-auto">
                <div class="prediction-form" style="width: 400px;">
                    <h2 class="text-center" style="color: #4B4D26;">PREDIKSI TANAM</h2>
                    @if ($errors->any())
                        <div class="text-center" style="color: red;">
                            <strong></strong> Data tidak boleh kosong
                        </div>
                    @endif
                     <form id="predictForm" action="{{ url('/AI/predict') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" id="suhu" name="suhu">
                            <label for="curah_hujan" class="form-label"></label>
                            <select id="curah_hujan" name="curah_hujan" class="form-control" placeholder="Cuaca" style="background-color: #ADC685; color: white;">
                                <option value="Cerah">Cerah</option>
                                <option value="Cerah Berawan">Cerah Berawan</option>
                                <option value="Berawan">Berawan</option>
                                <option value="Hujan Ringan">Hujan Ringan</option>
                                <option value="Hujan Sedang">Hujan Sedang</option>
                                <option value="Hujan Lebat">Hujan Lebat</option>
                                <option value="Hujan Petir">Hujan Petir</option>
                            </select>
                        <div class="mb-3">
                            <label for="pH" class="form-label"></label>
                            <input type="text" class="form-control" id="pH" name="pH" placeholder="Tanah" style="background-color: #ADC685;">
                        </div>
                            <input type="hidden" id="kelembapan" name="kelembapan">
                            <input type="hidden" id="tempat" name="tempat">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Prediksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
<footer class="site-footer">
    Copyright @ 2024, SIPETANI
</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    window.addEventListener('load', async () => {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(async (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

            const dateElement = document.getElementById("date");
            const currentDate = new Date();
            dateElement.textContent = `${currentDate.toLocaleDateString()}`;

            const weatherData = await getWeather(latitude, longitude);
            const nearestArea = findNearestArea(latitude, longitude, weatherData);

            const locationElement = document.getElementById("location");
            const areaDescription = nearestArea.getAttribute('description');
            locationElement.textContent = `${areaDescription}`;

            const currentDateTime = getCurrentDateTime(currentDate);

            const predictionElement = document.getElementById("prediction");
            const predictionData = getNearestData(nearestArea, 'weather', currentDateTime);
            predictionElement.textContent = `${getWeatherDescription(predictionData)}`;

            const humidityElement = document.getElementById("humidity");
            const humidityValue = getNearestData(nearestArea, 'hu', currentDateTime);
            humidityElement.textContent = `${humidityValue}%`;

            const temperatureElement = document.getElementById("temperature");
            const temperatureValue = getNearestData(nearestArea, 't', currentDateTime);
            temperatureElement.textContent = `${temperatureValue}°C`;

            document.getElementById('suhu').value = temperatureValue;
            document.getElementById('kelembapan').value = humidityValue;
            document.getElementById('tempat').value = areaDescription;
        });
    } else {
        console.log("Lokasi Geografis tidak didukung didalam web ini.");
    }
});

async function getWeather(latitude, longitude) {
    const apiUrl = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaTimur.xml';
    
    try {
        const response = await fetch(apiUrl);
        const xmlData = await response.text();
        const parser = new DOMParser();
        return parser.parseFromString(xmlData, "text/xml");
    } catch (error) {
        console.error('Error fetching weather data:', error);
    }
}

function findNearestArea(latitude, longitude, xmlDoc) {
    const areas = xmlDoc.querySelectorAll('area');
    let minDistance = Number.MAX_VALUE;
    let nearestArea = null;

    areas.forEach(area => {
        const areaLatitude = parseFloat(area.getAttribute('latitude'));
        const areaLongitude = parseFloat(area.getAttribute('longitude'));

        const distance = getDistance(latitude, longitude, areaLatitude, areaLongitude);
        if (distance < minDistance) {
            minDistance = distance;
            nearestArea = area;
        }
    });

    return nearestArea;
}

function getDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the earth in km
    const dLat = deg2rad(lat2 - lat1);
    const dLon = deg2rad(lon2 - lon1);
    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const d = R * c; // jarak dalam satuan km
    return d;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180);
}

function getCurrentDateTime(currentDate) {
    const year = currentDate.getFullYear();
    const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    const day = ('0' + currentDate.getDate()).slice(-2);
    const hours = ('0' + currentDate.getHours()).slice(-2);
    const minutes = ('0' + currentDate.getMinutes()).slice(-2);
    const seconds = ('0' + currentDate.getSeconds()).slice(-2);
    return `${year}${month}${day}${hours}${minutes}${seconds}`;
}

function getNearestData(area, parameterId, dateTime) {
    const parameterElements = area.querySelectorAll(`parameter[id="${parameterId}"] > timerange`);
    let nearestData = null;
    let minTimeDiff = Infinity;

    parameterElements.forEach(element => {
        const elementDateTime = element.getAttribute('datetime');
        const elementType = element.getAttribute('type');
        const elementDate = new Date(elementDateTime.slice(0, 8)); // Ambil tanggal dari elementDateTime
        const currentDate = new Date(dateTime.slice(0, 8)); // Ambil tanggal dari dateTime
        const elementTime = parseInt(elementDateTime.slice(8, 10), 10); // Ambil jam dari elementDateTime
        const currentTime = parseInt(dateTime.slice(8, 10), 10); // Ambil jam dari dateTime
        let timeDiff;

        if (elementType === 'hourly') {
            // type hourly
            timeDiff = Math.abs(currentTime - elementTime);
        } else if (elementType === 'daily') {
            // type daily
            timeDiff = Math.abs(currentDate - elementDate);
        }

        // Memeriksa perbedaan waktu lebih kecil dari yang sebelumnya
        if (timeDiff < minTimeDiff) {
            // Memperbarui nilai terdekat
            minTimeDiff = timeDiff;
            nearestData = element.querySelector('value').textContent;
        }
    });

    return nearestData;
}

function getWeatherDescription(code) {
    // Kode cuaca yang diambil dari BMKG Digital Forecast
    const weatherCodes = {
        '0': 'Cerah',
       '1': 'Cerah Berawan',
        '2': 'Cerah Berawan',
        '3': 'Berawan',
       '4': 'Berawan Tebal',
       '5': 'Udara Kabur',
       '10': 'Asap',
       '45': 'Kabut',
        '60': 'Hujan Ringan',
        '61': 'Hujan Sedang',
        '63': 'Hujan Lebat',
       '80': 'Hujan Lokal',
        '95': 'Hujan Petir',
    };
    return weatherCodes[code] || 'Unknown';
}

    </script>
</body>

@endsection
