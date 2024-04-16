<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediksi Tanaman Cocok</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            position: fixed; /* Menetapkan navbar di posisi tetap */
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
            color: rgba(0, 0, 0, 0.55);
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
  
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: left;
        }
  
        li {
            display: inline;
            margin: 0 30px;
        }
  
          a {
            text-decoration: none;
            color: black;
        }
  
          a:hover {
            color: #ccc;
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
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <img src="{{ asset('img/SiPetani.png') }}">
                    SiPetani
                </a>
                <a href="" class="btn custom-btn d-lg-none ms-auto me-4"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/"><strong>Home</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="artikelP"><strong>Artikel</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="diskusiP"><strong>Diskusi</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="AI"><strong>Prediksi Tanam</strong></a>
                        </li>
                    </ul>
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="???">Akun</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </main>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>