@extends('Template.templateP')

@section('content')
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
        font-family: Arial, sans-serif;
    }

    h1, h2 {
        color: #4B4D26;
    }

    .navbar-brand {
        font-weight: bold;
        color: #2e7d32 !important;
    }

    .navbar .navbar-nav .nav-link {
        color: #729043;
        /* display: flex; */
        align-items: center;
        font-weight: 500 ;
    }

        .navbar .navbar-nav  .nav-link:hover {
        color: #4B4D26;
    }


    .card .card-header{
        background-color: #F6F3EE;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 0.75rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card {
        background-color: #F6F3EE;
        border: 20px;
        box-shadow: 0 4px 15px 0 rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding-top: 3.5rem;
    }

    footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        flex-shrink: 0;
        width: 100%;
        text-align: center;
    }
  
    .site-footer {
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card position-relative">
                    <div class="card-header d-flex justify-content-between align-items-center ">
                        <a href="/artikelP" class="text-dark"><i class="fas fa-arrow-left"></i></a>
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
                    <div class="card-body">
                    <h1 class="display-4">{{ $artikel->judul }}</h1>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($artikel->created_at)->locale('id')->translatedFormat('j F Y') }}</p>
                        @if($artikel->gambar)
                            <div class="text-center">
                                <img src="{{ asset('media/'.$artikel->gambar) }}" class="img-fluid mb-4" alt="Gambar Artikel">
                            </div>
                        @endif
                        <p>{!! $artikel->isi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        Copyright @ 2024, SIPETANI
    </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection