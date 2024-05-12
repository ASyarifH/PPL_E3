@extends('Template.templateA')

@section('content')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<!-- show.blade.php -->
<div class="container card">
    <div class="card-header "style="background-color:transparent">
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
<br/>

@foreach($diskusi->jawaban as $jawaban)
    <div class="container card mb-3">
        <div class="card-header" style="background-color:transparent">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                    <span>{{ $jawaban->pemilik->name }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="jawaban_{{ $jawaban->id }}_content">
                {!! $jawaban->jawaban !!}
            </div>
            <!-- Tombol Edit -->
            @if(Auth::id() == $jawaban->user_id)
            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-sm btn-success" onclick="showEditForm('{{ $jawaban->id }}', '{{ $jawaban->jawaban }}')" id="editButton_{{ $jawaban->id }}">Edit</button>
            </div>
            @endif
            <!-- Form Edit -->
            <form id="editForm_{{ $jawaban->id }}" action="{{ route('jawaban.update', ['jawaban' => $jawaban->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
                <input type="hidden" name="jawaban" id="edit_jawaban_{{ $jawaban->id }}">
                <trix-editor input="edit_jawaban_{{ $jawaban->id }}"></trix-editor>
                <br/>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                <button type="button" class="btn btn-sm btn-danger" onclick="cancelEdit('{{ $jawaban->id }}')">Batal</button>
            </form>
        </div>    
    </div>
    <br>
@endforeach


<div class="container card">
    <div class="card-header" style="background-color:transparent">
        <div class="card">
            <div class="card-header" style="background-color:transparent">
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
                    <br/> 
                    <button type="submit" class="btn btn-sm my-Z btn-success">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<script>
    function showEditForm(id, jawaban) {

        document.getElementById('editButton_' + id).style.display = 'none';

        var editForm = document.getElementById('editForm_' + id);
        editForm.style.display = 'block';

        var editor = editForm.querySelector('trix-editor');
        editor.editor.loadHTML(jawaban);
    }

    function cancelEdit(id) {

        document.getElementById('editButton_' + id).style.display = 'block';

        document.getElementById('editForm_' + id).style.display = 'none';
    }
</script>

@endsection