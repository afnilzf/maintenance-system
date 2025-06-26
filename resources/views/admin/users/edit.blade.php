@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
    <form action="{{ route('users.update', $user) }}" method="POST">@csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kepala_bengkel" {{ $user->role == 'kepala_bengkel' ? 'selected' : '' }}>Kepala Bengkel</option>
                        <option value="kepala_jurusan" {{ $user->role == 'kepala_jurusan' ? 'selected' : '' }}>Kepala Jurusan</option>
                        <option value="teknisi" {{ $user->role == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                        <option value="plp" {{ $user->role == 'plp' ? 'selected' : '' }}>PLP</option>
                    </select>
                </div>
                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection