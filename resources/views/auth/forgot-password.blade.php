@extends('Template.templateLR')

@section('content')
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
            display: flex;
            align-items: center;
            height: 100vh;
        }

        .login-left {
            width: 50%;
        }

        .login-right {
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

        .login-form .Forgot-password {
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
                <h1>Reset Password</h1>
                    <!-- <p>Enter your Credentials to access your account</p> -->
                </div>
                @if ($errors->has('message'))
                  <div style="color: red;">
                    {{ $errors->first('message') }}
                  </div>
                @endif
                @if ($errors->has('name'))
                  <div style="color: red;">
                    <strong></strong> Username dan Email harus diisi.
                  </div>
                @elseif ($errors->has('email'))
                  <div style="color: red;">
                    <strong></strong> Username dan Email harus diisi.
                  </div>
                @endif
                <div>
                    <form method="POST" action="{{ route('forgot-password.post') }}">
                    @csrf
                        <div class="login-form">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Username" value="{{ old('name') }}" autofocus>
                        <br />
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email') }}">
                        <br />
                        <button type="submit" class="Forgot-password">Send Reset Link</button>
                        </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    <div class="login-right">
          <img src="img/Login.png" alt="Background Image"/>
    </div>
    <script>

    </script>
@endsection