@extends('Template.templateA')

@section('content')

@foreach($diskusi as $diskusi)
    <a href="{{ route('diskusi.showA', $diskusi->slug) }}" class="container card mb-3" style="color: black; text-decoration: none;">
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


@endsection