@extends('Template.templateA')

@section('content')
    <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    thead {
    background-color: #729043;
    color: white;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    
    </style>
    <h5 class="container">Daftar Petani</h5>
    
    <table class="container table">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Password</th>
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
@endsection
