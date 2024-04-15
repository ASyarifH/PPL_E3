@extends('Template.template4')

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if(session()->has('registerError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('registerError')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="script.js"></script>

  <link rel="stylesheet" href="style.css"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .login-right {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      width: 50vw;
      background-color: #f8f9fa;
      display: flex;
      align-items: flex-end;
      justify-content: flex-end;
      overflow: hidden;
    }

    .login-right img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      object-position: center top;
    }

    .login-form label {
      margin-bottom: -5px; /* Mengurangi jarak bawah antara label dan input */
    }

    .login-form input {
      margin-bottom: -15px; /* Mengurangi jarak bawah antara input */
    }

    .login-form button {
      margin-top: 15px; /* Menambahkan jarak atas untuk tombol */
    }

    .login-form .register {
    width: 100%;
    height: 42px;
    background: #447b0d;
    border-radius: 8px;
    color: #ffffff;
    border: none;
    }

  </style>
</head>

<body>
<section>
  <div class="login d-flex">
    <div class="login-left w-50 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-6">
          <div class="header">
            <h1>Welcome to Our Website</h1>
            <p>Register your account to get started</p>
          </div>
          <div>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="login-form">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Username" autofocus required>
                <br />
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                <br />
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <br />
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                <br />
                <button class="register" type="submit">Register</button>
                <p>Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="login-right">
      <img src="img/Login.jpeg" alt="Background Image"/>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

@endsection
