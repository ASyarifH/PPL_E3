@extends('Template.templateP')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<!-- show.blade.php -->
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
        <h3>{!! $diskusi->pertanyaan !!}</h3>
    </div>
</div>


@foreach($diskusi->jawaban as $jawaban)
<br/>
    <div class="container card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                    <span>{{ $jawaban->pemilik->name }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
        {!! $jawaban->jawaban !!}
        </div>    
    </div>
@endforeach

<br/>

<div class="container card">
    <div class="card-header">
        <div class="card">
            <div class="card-header">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>

            <div class="card-body">
                Jawaban
                <form action="{{ route('jawaban.store', $diskusi->slug) }}" method="POST">
                    @csrf
                    <input type="hidden" name="jawaban" id="jawaban">
                    <trix-editor input="jawaban"></trix-editor>

                    <button type="submit" class="btn btn-sm my-Z btn-success">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
@endsection