@extends('Template.templateP')

@section('content')

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
                {{$diskusi->title}}

                <hr>
                
                {!!$diskusi->content!!}

            </div>
        </div>
    @endforeach
</div>