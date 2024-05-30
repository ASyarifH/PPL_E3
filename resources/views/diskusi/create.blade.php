@extends('Template.templateP')

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .main-content {
            flex: 1;
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
            padding: 10px 0;
            background-color: #f3f3f3;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
            flex-shrink: 0;
        }
</style>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<div class="container card">
    <div class="card-header d-flex justify-content-between" style="background-color:transparent">
        <div class="d-flex align-items-center">
            <img width="40px" height="40px" style="border-radius: 50%; margin-right: 10px;" src="{{ asset('images/user.png') }}" alt="">
            <span>{{ Auth::user()->name }}</span>
        </div>
        <div>
            <i class="fas fa-ellipsis-h" data-toggle="modal" data-target="#editModal"></i>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route ('diskusi.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="pertanyaan">pertanyaan</label>

                    <input id="pertanyaan" type="hidden" name="pertanyaan">
                    <trix-editor input="pertanyaan"></trix-editor>

                </div>
            <br/>
            <a href="javascript:history.back()" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Tambahkan</button>
        </form>
    </div>
</div>
<footer class="site-footer">
    Copyright @ 2024, SIPETANI
</footer>
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection