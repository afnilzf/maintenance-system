@extends('layouts.admin')
@section('title', 'Tambah User')
@section('content')
<div class="container-fluid">
    <form action="{{ route('users.store') }}" method="POST">@csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="kepala_bengkel">Kepala Bengkel</option>
                        <option value="kepala_jurusan">Kepala Jurusan</option>
                        <option value="teknisi">Teknisi</option>
                        <option value="plp">PLP</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection