@extends('Template.templateA')

@section('content')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <div class="container card-body">
        <form action="{{ route ('artikel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control">

            <div class="form-group">
                <label for="isi">Isi</label>

                <input id="isi" type="hidden" name="isi">
                <trix-editor input="isi"></trix-editor>
            </div>

            <br/>
            
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>
            
            <br/> 
            <button type="submit" class="btn btn-success">Tambahkan</button>
        </form>
    </div>

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection