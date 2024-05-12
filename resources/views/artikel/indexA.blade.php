@extends('Template.templateA')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="mt-3">
                <a href="{{ route('artikel.create') }}" class="btn btn-success btn-block w-100">Tambah Artikel</a>
            </div>
        </div>
        <div class="col-lg-9">
            @foreach($artikels->sortByDesc(function($artikel) {return $artikel->bookmarks()->where('user_id', auth()->id())->exists();}) as $artikel)
                <a href="{{ route('artikel.showAdmin', ['id' => $artikel->id]) }}" class="container card mb-3" style="color: black; text-decoration: none;">
                    <div class="card-body">
                        <h4 class="card-text" style="margin-left: 150px;">{{ $artikel->judul }}</h4>
                        <img src="{{ asset('media/'.$artikel->gambar) }}" alt="Gambar Artikel" style="max-width: 100px; margin-top: -50px;">
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('artikel.toggleBookmark', ['id' => $artikel->id]) }}" method="POST">
                            @csrf
                            @php
                                $isBookmarked = $artikel->bookmarks()->where('user_id', auth()->id())->exists();
                            @endphp
                            @if($isBookmarked)
                                <button type="submit" class="btn btn-danger"> Hapus dari Bookmark </button>
                            @else
                                <button type="submit" class="btn btn-primary">Tambahkan ke Bookmark </button>
                            @endif
                        </form>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection