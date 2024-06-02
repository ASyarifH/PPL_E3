@extends('Template.templateP')

@section('content')

<head>
    <style>
        body {
            background-color: #D3BBA4;
            margin: 0;
            padding: 0;
        }

        .custom-card {
            background-color: #FFFFFF;
            width: 90%;
            max-width: 75%;
            min-height: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .custom-card-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .navbar-nav .nav-link {
            color: #729043;
            align-items: center;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #4B4D26;
        }

        .navbar-nav .nav-link i {
            margin-right: 5px;
        }

        .form-container {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-label {
            font-weight: bold;
        }

        .form-footer {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .custom-card .btn-primary {
            background-color: #6AA12A;
            border: none;
        }

        .custom-card .btn-primary:hover {
            background-color: #5C9125;
        }

        .separator {
            border-top: 1px solid #000000;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .custom-card {
                width: 95%;
                min-height: 80vh;
                padding: 15px;
            }

            .custom-card-header {
                font-size: 20px;
            }

            .form-footer {
                bottom: 15px;
                right: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="custom-card">
                <div class="custom-card-header">Kelola Akun</div>
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div style="color: red;">
                        <strong></strong> Nama pengguna, Email harus diisi.
                    </div>
                @endif

                <div class="separator"></div>

                <div class="form-container">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Pengguna</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</body>
@endsection

