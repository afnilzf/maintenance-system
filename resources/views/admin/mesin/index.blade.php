@extends('layouts.admin')

@section('title', 'Data Mesin')

@section('content')


@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Mesin</h4>
    <a href="{{ route('mesin.create') }}" class="btn btn-primary">
        <i data-feather="plus"></i> Tambah Mesin
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mesin</th>
                <th>Kode</th>
                <th>Lokasi</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mesins as $index => $mesin)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mesin->nama }}</td>
                <td>{{ $mesin->kode }}</td>
                <td>{{ $mesin->lokasi }}</td>
                <td>{{ $mesin->jenis }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data mesin.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection