@extends('Template.templateP')

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('success_edit_pertanyaan'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success_edit_pertanyaan')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('success_edit'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success_edit')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
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

        header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            flex-shrink: 0;
            width: 100%;
            text-align: center;
        }

        .list-group-item {
            border: 1px solid #dee2e6;
            margin-bottom: 10px;
        }

        .btn-success {
            background-color: #729043;
        }

        .btn-primary {
            background-color: #4B4D26;
            border: none;
        }

        .btn-primary:hover {
            background-color: #729043;
        }

        .navbar-nav .nav-link {
            color: #729043;
            align-items: center;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #4B4D26;
        }

        .navbar-nav .nav-link i {
            margin-right: 5px;
        }

        .list-group-item hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .list-group .list-group-item strong {
            font-weight: 100;
        }

        .list-group .list-group-item i {
            color: #CBCBCB;
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

        .card-body form {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <main class="container my-4 flex-grow-1">   
    <div class="list-group mb-4">
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                        <span style="margin-left: 10px;">{{ $diskusi->author->name }}</span>
                    </div>
                </div>
                <hr style="border-width: 2px; border-color: #BFBFBF;">
                <h5 class="mb-1">{!! $diskusi->pertanyaan !!}</h5>
                <div class="d-flex justify-content-between">
                    <div>
                        <i class="far fa-comments"></i>
                        <a href="{{ route('diskusi.showA', $diskusi->slug) }}">
                            <small class="text-muted">{{ $diskusi->countJawaban() }} Pembahasan</small>
                        </a>
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->id == $diskusi->author->id)
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('diskusi.edit', ['id' => $diskusi->id, 'from_show' => true]) }}" class="btn" style="background-color: #729043; color: white;">Edit</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Answer Form -->
        <div class="list-group mb-4">
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}" alt="">
                        <span style="margin-left: 10px;">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <hr style="border-width: 2px; border-color: #BFBFBF;">
                    @if ($errors->has('jawaban'))
                        <div style="color: red;">
                            <strong></strong> Jawaban harus di isi.
                        </div>
                    @endif
                <div class="card-body">
                    <form action="{{ route('jawaban.store', $diskusi->slug) }}" method="POST">
                        @csrf
                        <input type="hidden" name="jawaban" id="jawaban">
                        <trix-editor input="jawaban"></trix-editor>
                        <br/> 
                        <button type="submit" class="btn btn-success">Balas</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Answers List -->
        @foreach($diskusi->jawaban as $jawaban)
            <div class="list-group mb-4">
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img width="40px" height="40px" style="border-radius: 50%;" src="{{ asset('images/user.png') }}" alt="">
                            <span style="margin-left: 10px;">{{ $jawaban->pemilik->name }}</span>
                        </div>
                    </div>
                    <hr style="border-width: 2px; border-color: #BFBFBF;">
                    <div class="card-body">
                        <div id="jawaban_{{ $jawaban->id }}_content">
                            {!! $jawaban->jawaban !!}
                        </div>
                        @if(Auth::id() == $jawaban->user_id)
                            <div class="d-flex justify-content-end mb-2">
                                <button class="btn btn-sm btn-success" onclick="showEditForm('{{ $jawaban->id }}', '{{ $jawaban->jawaban }}')" id="editButton_{{ $jawaban->id }}">Edit</button>
                            </div>
                        @endif
                        <form id="editForm_{{ $jawaban->id }}" action="{{ route('jawaban.update', ['jawaban' => $jawaban->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="jawaban" id="edit_jawaban_{{ $jawaban->id }}">
                            <trix-editor input="edit_jawaban_{{ $jawaban->id }}"></trix-editor>
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="cancelEdit('{{ $jawaban->id }}')">Batal</button>
                        </form>
                    </div>    
                </div>
            </div>
        @endforeach
    </main>
    <footer class="site-footer">
        Copyright @ 2024, SIPETANI
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
</body>

@endsection
