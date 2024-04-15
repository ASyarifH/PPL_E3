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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Inline CSS for button -->
    <style>
        .navbar {
            background-color: white;
            border-bottom: 1px solid #ddd;
            position: relative;
            top: 0;
            z-index: 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            width: 50px;
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

        .Home-right {
            position: absolute;
            top: 75px;
            right: 200px;
            bottom: 75px;
            width: 30%;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            z-index: 0;
        }

        .Home-right img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .header {
            text-align: left;
            margin: auto;
            max-width: 600px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 200px;
            transform: translateY(-50%);
            z-index: 0; /* Mengatur posisi z-index header */
        }

        @media screen and (max-width: 1280px) {
            .header {
                position: relative;
                top: 0;
                left: 0;
                text-align: left;
                transform: translateY(0);
                padding-top: 100px; /* Tambahkan padding atas saat layar kecil */
                z-index: 0; /* Mengatur posisi z-index header */
            }

            .Home-right {
                display: none;
            }

            body {
                padding-top: 0px;
            }
        }
    </style>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand">
                    <img src="img/SiPetani.png" alt="SiPetani Logo">
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
                            <a class="nav-link click-scroll" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="diskusi">Diskusi</a>
                        </li>
                    </ul>
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
    </main>
    <div class="header">
        <h1>Welcome Back</h1>
        <p>Merupakan sebuah inovasi sistem informasi berbasis website yang dirancang khusus untuk memberikan solusi kepada para petani dalam menghadapi tantangan waktu tanam</p>
    </div>
    <div class="Home-right">
        <img src="img/Home.png" alt="Home Image" />
    </div>
    <footer class="site-footer">
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        
    </script>

</body>

</html>
