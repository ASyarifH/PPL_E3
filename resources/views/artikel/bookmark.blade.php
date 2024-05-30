@extends('Template.templateP')

@section('content')
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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

        .navbar-brand {
            font-weight: bold;
        }

        .navbar .navbar-nav .nav-link {
            color: #729043;
            align-items: center;
            font-weight: 500;
        }

        .navbar .navbar-nav .nav-link:hover {
            color: #4B4D26;
        }

        .card {
            border: none;
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            max-width: 350px;
            margin: 0 10px;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.9rem;
            color: gray;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
        }

        .footer {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            margin-top: 2rem;
        }

        .bookmark-icon {
            font-size: 1.2rem;
            color: #4B4D26;
            cursor: pointer;
        }

        .input-group .form-control {
            border-right: 0;
        }

        .input-group .input-group-append {
            border-left: 0;
        }

        .search-bookmark {
            background-color: #ADC685;
            margin-left: 10px;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 10px;
            color: #4B4D26;
            cursor: pointer;
            font-size: 1.2rem;
            position: absolute;
            top: 18px;
            transform: translateY(-50%);
        }

        .btn {
            height: 38px;
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

        .bookmark-button-container {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
        }

        .heading-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .heading-container i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .heading-container h5 {
            margin: 0;
            font-size: 1.25rem;
        }

        .articles-row {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 10px;
        }
    </style>
</head>
<div class="content-wrapper">
    <div class="main-content">
        <div class="container">
            <div class="heading-container">
                <a href="/artikelP" class="text-dark d-flex align-items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
                <h5 class="mb-0 ml-2">Artikel Disukai</h5>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="container">
                <div class="row justify-content-start">
                    @foreach($bookmarkedArtikels as $artikel)
                        @php
                            $isBookmarked = true;
                        @endphp
                        <div class="col-md-4 mb-4 d-flex align-items-stretch">
                            <div class="card w-100">
                                @if($artikel->gambar)
                                    <img src="{{ asset('media/'.$artikel->gambar) }}" class="card-img-top img-fluid" alt="Gambar Artikel" style="object-fit: cover; height: 200px;">
                                @else
                                    <div class="card-img-top img-fluid d-flex justify-content-center align-items-center" style="height: 200px; background-color: #f3f3f3;">
                                        <span class="text-muted">Gambar tidak tersedia</span>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <a href="{{ route('artikel.showPetani', ['id' => $artikel->id]) }}">
                                        <h5 class="card-title" style="color: black;">{{ $artikel->judul }}</h5>
                                        <p class="card-text">{{ \Carbon\Carbon::parse($artikel->created_at)->locale('id')->translatedFormat('j F Y') }}</p>
                                    </a>
                                    <div class="bookmark-button-container">
                                        <form action="{{ route('artikel.toggleBookmark', ['id' => $artikel->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" id="bookmarkButton-{{ $artikel->id }}" class="btn bookmark-button">
                                                <i class="{{ $isBookmarked ? 'fas' : 'far' }} fa-bookmark bookmark-icon"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="site-footer">
    Copyright @ 2024, SIPETANI
</footer>
@endsection
