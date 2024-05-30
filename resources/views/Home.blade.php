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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:display=swap');
        
        *{
            font-family: 'Poppins', sans-serif;
            src: url();
        }

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
        .register-btn {
            background-color: transparent;
            color: #447b0d; /* Ubah warna teks menjadi hijau */
            border: 2px solid #447b0d; /* Tambahkan garis tepi hijau */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px; /* Tambahkan jarak antara tombol login dan tombol register */
        }

        .login-btn {
            background-color: #447b0d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .free-text{
            color:#4B4D26;
            font-size: 64px;
            margin-bottom: 120px;
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
                            <a class="nav-link click-scroll" href="artikel"><strong>Artikel</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="diskusi"><strong>Diskusi</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="AI"><strong>Prediksi Tanam</strong></a>
                        </li>
                    </ul>
                        <!-- Button Login -->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <a href="/register" class="register-btn btn custom-btn d-lg-block d-none">Daftar</a>
                            <a href="/login" class="login-btn btn custom-btn d-lg-block d-none">Login</a>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>

        <section class="hero-section">
            <div class="section-overlay"></div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-12 mt-auto mb-5 text-center">
                        <h1 class="free-text">Waktu tanam ideal, sahabat terbaik para petani!</h1>
                        <a class="btn custom-btn smoothscroll" href="/register">Gabung Sekarang</a>
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
    <script>
        
    </script>
</body>

</html>
