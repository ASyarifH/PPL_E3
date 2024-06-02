@extends('Template.templateAF')

@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Artikel</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
    <style>
        body {
            background-color: #CCC1B5;
        }

        .content {
            margin-left: 100px;
            padding: 20px;
            width: calc(100% - 100px);
        }

        .table th, .table td {
            vertical-align: middle;
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
  </style>
</head>
<body> 
    <div class="content">
      <div class="card">
        <div class="card-header">
          <h2>Data Artikel</h2>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" style="background-color: transparent;">&times;</button>
            </div>
        @endif
        @if(session()->has('success_edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_edit') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" style="background-color: transparent;">&times;</button>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Thumbnail</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikels as $index => $artikel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $artikel->judul }}</td>
                            <td>{{ Str::limit(strip_tags($artikel->isi), 200, '...') }}</td>
                            <td>
                                @if($artikel->gambar)
                                    <img src="{{ asset('media/'.$artikel->gambar) }}" alt="Thumbnail" style="max-height: 100px;">
                                @else
                                    <div class="card-img-top img-fluid d-flex justify-content-center align-items-center" style="height: 100px; background-color: #f3f3f3;">
                                        <span class="text-muted">Gambar tidak tersedia</span>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('artikel.edit', ['id' => $artikel->id]) }}">
                                    <img src="{{ asset('img/EditArtikel.png') }}" alt="Edit" style="max-height: 30px;">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('artikel.create') }}" class="btn btn-success btn-block w-100">Tambah Artikel</a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
