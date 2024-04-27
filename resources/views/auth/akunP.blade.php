<!-- resources/views/auth/profile.blade.php -->

@extends('Template.templateP')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Pengguna</div>
                @if (session('success'))
                    <div class="alert alert-success">
                        Data berhasil diubah.
                    </div>
                @endif
                @if ($errors->any())
                    <div style="color: red;">
                        <strong></strong> Username dan Email harus diisi.
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
