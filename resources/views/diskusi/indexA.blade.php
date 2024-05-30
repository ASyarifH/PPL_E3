@extends('Template.templateA')

@section('content')

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .main-content {
            flex: 1;
        }

        header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            flex-shrink: 0;
            width: 100%;
            text-align: center;
        }

        .list-group-item {
            border: 1px solid #dee2e6;
            margin-bottom: 10px;
        }

        .btn-success {
            background-color: #729043;
        }

        .btn-primary {
            background-color: #4B4D26;
            border: none;
        }

        .btn-primary:hover {
            background-color: #729043;
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

        .list-group-item hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .list-group .list-group-item strong {
            font-weight: 100;
        }

        .list-group .list-group-item i {
            color: #CBCBCB;
        }

        .site-footer {
            color: #729043;
            text-align: center;
            padding: 10px 0;
            background-color: #f3f3f3;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
            flex-shrink: 0;
        }


        .card-body form {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <main class="container my-4 flex-grow-1">
    @foreach($diskusis as $diskusi)
            <div class="list-group mb-3">
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                            <span style="margin-left: 10px;">{{ $diskusi->author->name }}</span>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #BFBFBF;">
                    <h5 class="mb-1">{!! $diskusi->pertanyaan !!}</h5>
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="far fa-comments"></i>
                            <a href="{{ route('diskusi.showA', $diskusi->slug) }}">
                                <small class="text-muted">{{ $diskusi->countJawaban() }} Pembahasan</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
    <footer class="site-footer">
        Copyright @ 2024, SIPETANI
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection
