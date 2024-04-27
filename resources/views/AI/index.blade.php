@extends('Template.templateP')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Tanaman Cocok</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .navbar {
            top: 0; /* Memastikan navbar berada di bagian atas halaman */
            width: 100%; /* Melebarkan navbar untuk menutupi seluruh lebar halaman */
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            width: 150px;
            height: auto;
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            margin-right: 10px;
        }

        .navbar-nav .nav-item:first-child .nav-link {
            padding-right: 10px;
        }

        .navbar-nav .nav-link:last-child {
            margin-right: 50px;
        }

        .login-btn {
            background-color: #447b0d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .container2 {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        #date, #location, #humidity, #temperature {
            margin: 20px 0;
            font-size: 18px;
        }

    </style>
</head>
<body>
    <main>
        <div class="container2">
            <h2>Cuaca BMKG</h2>
            <h3>Update Setiap 6 jam</h3>
            <div id="date"></div>
            <div id="location"></div>
            <div id="prediction"></div>
            <div id="humidity"></div>
            <div id="temperature"></div>
        <h2>Prediksi Kecocokan Tanam</h2>
            @if ($errors->any())
                <div style="color: red;">
                    <strong></strong> Data curah hujan dan data ph tanah tidak boleh kosong
                </div>
                <br>
            @endif
        <form id="predictForm" action="{{ url('/AI/predict') }}" method="post">
            @csrf
            <input type="hidden" id="suhu" name="suhu">
            <label for="curah_hujan">Curah Hujan: </label>
            <select id="curah hujan" name="curah_hujan">
                <option value="Cerah">Cerah</option>
                <option value="Cerah Berawan">Cerah Berawan</option>
                <option value="Berawan">Berawan</option>
                <option value="Hujan Ringan">Hujan Ringan</option>
                <option value="Hujan Sedang">Hujan Sedang</option>
                <option value="Hujan Lebat">Hujan Lebat</option>
                <option value="Hujan Petir">Hujan Petir</option>
                </select><br><br>
            <label for="pH">pH Tanah: </label>
            <input type="text" id="pH" name="pH"><br><br>
            <input type="submit" value="Predict">
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        window.addEventListener('load', async () => {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(async (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            const dateElement = document.getElementById("date");
            const currentDate = new Date();
            dateElement.textContent = `Tanggal: ${currentDate.toLocaleDateString()}`;

            const weatherData = await getWeather(latitude, longitude);
            const nearestArea = findNearestArea(latitude, longitude, weatherData);

            const locationElement = document.getElementById("location");
            const areaDescription = nearestArea.getAttribute('description');
            locationElement.textContent = `Daerah: ${areaDescription}`;

            const currentDateTime = getCurrentDateTime(currentDate);

            const predictionElement = document.getElementById("prediction");
            const predictionData = getNearestData(nearestArea, 'weather', currentDateTime);
            predictionElement.textContent = `Prediksi Cuaca: ${getWeatherDescription(predictionData)}`;

            const humidityElement = document.getElementById("humidity");
            const humidityValue = getNearestData(nearestArea, 'hu', currentDateTime);
            humidityElement.textContent = `Kelembapan: ${humidityValue}%`;

            const temperatureElement = document.getElementById("temperature");
            const temperatureValue = getNearestData(nearestArea, 't', currentDateTime);
            temperatureElement.textContent = `Suhu: ${temperatureValue}°C`;

            document.getElementById('suhu').value = temperatureValue;
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
