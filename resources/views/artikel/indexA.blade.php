@extends('Template.templateA')

@section('content')
<div class="container">
    <a href="{{ route('artikel.create') }}" class="btn btn-success btn-block w-100">Tambah Artikel</a>
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
                        <a href="{{ route('artikel.showAdmin', ['id' => $artikel->id]) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
