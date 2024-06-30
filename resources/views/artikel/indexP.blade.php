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
        
        .content {
            flex: 1;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar .navbar-nav .nav-link {
            color: #729043;
            align-items: center;
            font-weight: 500 ;
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
            flex-shrink: 0;
        }
        .card-body {
            flex-grow: 1;
        }
        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            flex-shrink: 0;
            width: 100%;
            text-align: center;
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
            margin-left: 700px;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 10px;
            color: #4B4D26;
            cursor: pointer;
            font-size: 1.2rem;
            position: absolute;
            transform: translateY(-50%);
            top: -2px;
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
    </style>
</head>

<body>
<div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-append">
                        <a href="{{ route('artikel.bookmark') }}">
                        <button class="search-bookmark"><i class="far fa-bookmark"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Articles -->
    <div class="container">
        <div class="row justify-content-start">
            @foreach($artikels as $artikel)
                <div class="col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card w-100">
                        <a href="{{ route('artikel.showPetani', ['id' => $artikel->id]) }}">
                        @if($artikel->gambar)
                            <img src="{{ asset('media/'.$artikel->gambar) }}" class="card-img-top img-fluid" alt="Gambar Artikel" style="object-fit: cover; height: 200px;">
                        @else
                            <div class="card-img-top img-fluid d-flex justify-content-center align-items-center" style="height: 200px; background-color: #f3f3f3;">
                                <span class="text-muted">Gambar tidak tersedia</span>
                            </div>
                        @endif
                            <div class="card-body d-flex flex-column">
                                    <h5 class="card-title" style="color: black;">{{ $artikel->judul }}</h5>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($artikel->created_at)->locale('id')->translatedFormat('j F Y') }}</p>
                            </a>
                                <form id="bookmarkForm-{{ $artikel->id }}" action="{{ route('artikel.toggleBookmark', ['id' => $artikel->id]) }}" method="POST" class="bookmark-button-container">
                                    @csrf
                                    @php
                                        $isBookmarked = $artikel->bookmarks()->where('user_id', auth()->id())->exists();
                                    @endphp
                                    <button type="submit" id="bookmarkButton-{{ $artikel->id }}" class="btn bookmark-button">
                                        <i class="{{ $isBookmarked ? 'fas' : 'far' }} fa-bookmark bookmark-icon"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="site-footer">
        Copyright @ 2024, SIPETANI
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.bookmark-button').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const bookmarkButton = event.currentTarget;
                const bookmarkForm = bookmarkButton.closest('form');

                // Save the previous bookmark status
                const isBookmarked = bookmarkButton.querySelector('.bookmark-icon').classList.contains('fas');

                // Toggle icon and button class
                const bookmarkIcon = bookmarkButton.querySelector('.bookmark-icon');
                bookmarkIcon.classList.toggle('fas');
                bookmarkIcon.classList.toggle('far');

                // Update button text based on new bookmark status
                bookmarkButton.setAttribute('aria-label', isBookmarked ? 'Tambahkan ke Bookmark' : 'Hapus dari Bookmark');
                bookmarkButton.setAttribute('title', isBookmarked ? 'Tambahkan ke Bookmark' : 'Hapus dari Bookmark');

                // Submit the form
                bookmarkForm.submit();
            });
        });
    });
    </script>
</body>
@endsection
