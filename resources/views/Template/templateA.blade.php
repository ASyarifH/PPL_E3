<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPL</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Inline CSS for button -->
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:display=swap');   
        
        *{
            font-family: 'Poppins', sans-serif;
            src: url();
        }
        
        .navbar {
            top: 0;
            width: 100%;
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

    </style>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <img src="{{ asset('img/SiPetani.png') }}" alt="SiPetani Logo">
                </a>
                <button class="navbar-toggler" style="background-color:#198754" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/dashboardA"><strong>Beranda</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/artikelA"><strong>Artikel</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/diskusiA"><strong>Diskusi</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('daftar.petani') }}"><strong>Daftar Petani</strong></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/Akun.png')}}" alt="SiPetani Logo" style="width: 35%;">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profileA">Akun</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        
    </script>

</body>

</html>
