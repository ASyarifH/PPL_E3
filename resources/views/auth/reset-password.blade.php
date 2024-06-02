<!-- resources/views/auth/reset-password.blade.php -->
@extends('Template.templateLR')

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"/>
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
            top: 50%;
            right: 10%;
            transform: translateY(-50%);
            width: 45%;
            max-width: 600px;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            overflow: hidden;
        }
        
        .login {
            height: auto;
            align-items: center;
            height: 100vh;
        }

        .login-left {
            height: auto;
            width: 50%;
        }

        .login-right {
            height: auto;
            width: 50%;
        }

        .login-form {
            width: 100%;
            margin: auto;
            margin-right: auto;
        }

        .login-right img {
            max-width: 100%;
            height: auto;
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

        .login-form .Reset-Password {
            width: 100%;
            height: 42px;
            background: #447b0d;
            border-radius: 8px;
            color: #ffffff;
            border: none;
        }
    </style>
    <section>
      <div class="login d-flex">
        <div class="login-left w-50 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-6">
                <div class="header">
                <h1>Atur Ulang Kata Sandi</h1>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <form method="POST" action="{{ route('reset-password.post') }}">
                    @csrf
                        <div class="login-form">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <label for="password" class="form-label">Kata Sandi</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi" required autofocus>

                            <br />
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
                            <br />
                            <button type="submit" class="Reset-Password">Konfirmasi</button>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
    <div class="login-right">
          <img src="/img/Login.png" alt="Background Image"/>
    </div>
@endsection