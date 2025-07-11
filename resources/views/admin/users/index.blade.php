@extends('layouts.admin')
@section('title', 'Manajemen User')
@section('content')
<div class="container-fluid">
    <a href="{{ route('users.create') }}" class="btn btn-rounded btn-primary mb-3">Tambah </a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <div class="card card-body">
        <div class="table-responsive">
            <table id="multi_col_order" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-rounded btn-warning">Edit</a>
                            <form action="{{ route('users.reset-password', $user) }}" method="POST" style="display:inline">
                                @csrf @method('PUT')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Reset password ke default?')">Reset</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection