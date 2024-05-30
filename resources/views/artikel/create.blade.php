@extends('Template.templateAF')

@section('content')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Artikel</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  
    <style>
        body {
            background-color: #CCC1B5;
        }

        .content {
            margin-left: 100px;
            padding: 20px;
            width: calc(100% - 100px);
        }

        .card {
            margin: 0 auto;
            width: 100%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .preview-container {
            margin-bottom: 20px;
        }

        .preview-image {
            max-width: 200px;
            margin-right: 10px;
        }
  </style>
</head>
<body> 
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h2>Edit Artikel</h2>
            </div>
                @if ($errors->any())
                <br/>
                    <div class="container" style="color: red;">
                        <strong></strong> Judul artikel dan isi artikel harus diisi.
                    </div>
                @endif
            <div class="card-body">
                <form action="{{ route ('artikel.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input id="isi" type="hidden" name="isi">
                        <trix-editor input="isi"></trix-editor>
                    </div>
                    <a href="/artikelA" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn" style="background-color:#729043; color:white;">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handler untuk tombol hapus gambar
            $('#hapus-gambar').click(function() {
                $('.preview-container').remove(); // Hapus container preview gambar
                $('#gambar').val(''); // Hapus file yang dipilih di input gambar
            });
        });
    </script>
</body>
@endsection
