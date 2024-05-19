@extends('Template.templateP')

@section('content')
<div class="container">
    <a href="{{ route('artikel.bookmark')}}" class="btn btn-success btn-block w-100">Daftar Bookmark</a>
</div>
<br/>
<div class="container">
    <div class="row justify-content-center">
        @foreach($artikels as $artikel)
            <div class="col-md-5 mb-4 d-flex align-items-stretch">
                <div class="card w-100">
                    @if($artikel->gambar)
                        <img src="{{ asset('media/'.$artikel->gambar) }}" class="card-img-top img-fluid" alt="Gambar Artikel" style="object-fit: cover; height: 200px;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $artikel->judul }}</h5>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit(strip_tags($artikel->isi), 100, '...') }}
                        </p>
                        <a href="{{ route('artikel.showPetani', ['id' => $artikel->id]) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                        <form action="{{ route('artikel.toggleBookmark', ['id' => $artikel->id]) }}" method="POST" class="mt-2">
                            @csrf
                            @php
                                $isBookmarked = $artikel->bookmarks()->where('user_id', auth()->id())->exists();
                            @endphp
                            @if($isBookmarked)
                                <button type="submit" class="btn btn-danger w-100"> Hapus dari Bookmark </button>
                            @else
                                <button type="submit" class="btn btn-success w-100">Tambahkan ke Bookmark </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
