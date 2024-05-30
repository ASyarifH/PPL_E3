<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPL</title>

    <!-- CSS FILES -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inline CSS for sidebar -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:display=swap');   
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .sidebar {
            height: 100vh;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }
        
        .sidebar a {
            display: flex;
            align-items: center;
            color: black;
            padding: 16px;
            text-decoration: none;
        }
        
        .sidebar a img {
            margin-right: 10px;
        }
        
        .sidebar a:hover {
            background-color: #f1f1f1;
        }
        
        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            margin-left: 220px; /* Same width as the sidebar */
            padding: 20px;
        }
        
        .dropdown-btn {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            width: 100%;
            text-align: left;
            padding: 16px;
            color: black;
            display: flex;
            align-items: center;
        }

        .dropdown-btn img {
            margin-right: 10px;
        }

        .dropdown-container {
            display: none;
            background-color: #f9f9f9;
            padding-left: 8px;
        }

        .dropdown-container a {
            padding: 10px 16px;
            display: flex;
            align-items: center;
        }

        .dropdown-container a img {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/SiPetani.png') }}" alt="SiPetani Logo" width="150">
        </div>
        <a href="/dashboardA"><img src="{{ asset('img/LogoHome.png') }}" alt="Home" width="20"><strong>Beranda</strong></a>
        <a href="/artikelA"><img src="{{ asset('img/Artikel.png') }}" alt="Artikel" width="20"><strong>Artikel</strong></a>
        <a href="/diskusiA"><img src="{{ asset('img/Diskusi.png') }}" alt="Diskusi" width="20"><strong>Diskusi</strong></a>
        <a href="{{ route('daftar.petani') }}"><img src="{{ asset('img/DataPetani.png') }}" alt="Daftar Petani" width="20"><strong>Daftar Petani</strong></a>
        <button class="dropdown-btn"><img src="{{ asset('img/AkunAdmin.png') }}" alt="Akun" style="width: 20px;"> Akun
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/profileA">Akun</a>
            <a href="/logout">Logout</a>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var dropdown = document.querySelectorAll(".dropdown-btn");
        dropdown.forEach(btn => {
            btn.addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        });
    </script>

</body>

</html>
