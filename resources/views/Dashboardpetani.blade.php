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
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:display=swap');
        
        *{
            font-family: 'Poppins', sans-serif;
            src: url();
        }

        .navbar {
            position: fixed;
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

        .free-text{
            color:#4B4D26;
            font-size: 64px;
            margin-bottom: 160px;
        }

        .judul-about,
        .judul-alasan {
            background-color: transparent;
            position: relative;
            color: #4B4D26;
            display: inline-block;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .isi-about{
            color:#729043;
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
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <img src="img/SiPetani.png" alt="SiPetani Logo">
                </a>
                <button class="navbar-toggler" style="background-color:#198754" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/dashboardP"><strong>Beranda</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/AI"><strong>Prediksi Tanam</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/diskusiP"><strong>Diskusi</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="/artikelP"><strong>Artikel</strong></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="img/Akun.png" alt="SiPetani Logo" style="width: 35%;">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profileP">Akun</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="hero-section">
            <div class="section-overlay"></div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 mt-auto mb-5 text-center">
                        <h1 class="free-text">Waktu tanam ideal, sahabat terbaik para petani!</h1>
                    </div>
                    <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                    </div>
                </div>
            </div>
            <div class="video-wrap">
                <img src="img/Home.png" class="custom-video" alt="Home Image">
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="img/Home2.png" class="about-image img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="judul-about">Temukan cerita dibalik sipetani</h2>
                            <p class="isi-about">SIPETANI merupakan inovasi baru dalam dunia pertanian yang menggabungkan kecerdasan buatan dengan data lingkungan untuk memberikan prediksi tanam yang akurat. Kami berkomitmen untuk membantu petani dengan informasi dan pengetahuan yang mereka butuhkan untuk meningkatkan hasil panen.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding" id="section_3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="judul-alasan">MENGAPA HARUS SIPETANI?</h2>
                    </div>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0 text-center">
                        <div class="feature">
                            <img src="img/feature1.png" alt="Feature 1" class="img-fluid mb-3">
                            <h4 class="">FITUR PREDIKSI TANAM</h4>
                            <p>Kami menggunakan teknologi AI untuk memberikan prediksi waktu tanam yang akurat berdasarkan kondisi lingkungan yang ada.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0 text-center">
                        <div class="feature">
                            <img src="img/feature2.png" alt="Feature 2" class="img-fluid mb-3">
                            <h4>FITUR FORUM DISKUSI</h4>
                            <p>Forum diskusi untuk berbagi pengalaman, berdiskusi, dan belajar dari petani lain.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0 text-center">
                        <div class="feature">
                            <img src="img/feature3.png" alt="Feature 3" class="img-fluid mb-3">
                            <h4>FITUR ARTIKEL</h4>
                            <p>Kami menyediakan berbagai artikel informatif seputar pertanian yang dapat membantu petani.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        Copyright @ 2024, SIPETANI
    </footer>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        
    </script>
</body>

</html>
