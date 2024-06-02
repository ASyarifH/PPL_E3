@extends('Template.templateAF')

@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Petani</title>
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
          <h2>Data Petani</h2>
        </div>
        <div class="card-body">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Kata Sandi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petani as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- <td>{{ substr_replace($user->email, '****', 3, strpos($user->email, '@') - 3) }}</td> -->
                    <td>
                        @if(password_needs_rehash($user->password, PASSWORD_DEFAULT))
                            {{ '****' }}
                        @else
                            {{ decrypt($user->password) }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
