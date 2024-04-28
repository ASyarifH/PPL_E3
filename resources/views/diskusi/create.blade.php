@extends('Template.templateP')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<div class="container card">
    <div class="card-header">Tambahkan Diskusi</div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
@endsection