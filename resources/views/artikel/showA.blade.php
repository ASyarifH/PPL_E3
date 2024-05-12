@extends('Template.templateA')

@section('content')
    <div class="container">
        <div class="card-body">
            <h4 class="card-text text-center display-3">{{ $artikel->judul }}</h4>
            <div class="text-center">
                <img src="{{ asset('media/'.$artikel->gambar) }}" alt="Gambar Artikel" style="max-width: 500px;">
            </div>
                <p class="card-text" >{!! $artikel->isi !!}</p>
        </div>
    </div>
@endsection