<!-- Tampilan diskusi.index -->
@extends('Template.templateP')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="mt-3">
                <a href="{{ route('diskusi.pertanyaansaya') }}" class="btn btn-success btn-block w-100">Daftar Pertanyaan</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('diskusi.create') }}" class="btn btn-success btn-block w-100">Tambah Diskusi</a>
            </div>
        <br/>
        </div>

        <div class="col-lg-9">
            @foreach($diskusi as $diskusi)
            <a href="{{ route('diskusi.showP', $diskusi->slug) }}" class="card mb-3" style="color: black; text-decoration: none;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                            <span>{{ $diskusi->author->name }}</span>
                        </div>
                        <div>
                            <span>{{ $diskusi->countJawaban() }} Jawaban</span>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">{!! $diskusi->pertanyaan !!}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection

