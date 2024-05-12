@extends('Template.templateP')

@section('content')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<div class="container card">
    <div class="card-header" style="background-color:transparent">Tambahkan Diskusi</div>

    <div class="card-body">
        <form action="{{ route ('diskusi.store')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="pertanyaan">pertanyaan</label>

                    <input id="pertanyaan" type="hidden" name="pertanyaan">
                    <trix-editor input="pertanyaan"></trix-editor>

                </div>
            <br/>
            <button type="submit" class="btn btn-success">Tambahkan</button>
        </form>
    </div>
</div>

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection