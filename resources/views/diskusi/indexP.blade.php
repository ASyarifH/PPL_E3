@extends('Template.templateP')

@section('content')
<div class="container d-flex justify-content-end mb-2">
    <a href="{{ route('diskusi.pertanyaansaya') }}" style='margin-right:16px' class="btn btn-success">Daftar Pertanyaan</a>
    <a href="{{ route('diskusi.create') }}" class="btn btn-success">Tambahkan Diskusi</a>
</div>

@foreach($diskusi as $diskusi)
        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                        <span>{{ $diskusi->author->name }}</span>

                    </div>
                </div>
            </div>


            <div class="card-body">
                {!!$diskusi->pertanyaan!!}
            </div>
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('diskusi.show', $diskusi->slug) }}" class="btn btn-success">Lihat</a>
            </div>
        </div>
        <br/>
    @endforeach

@endsection