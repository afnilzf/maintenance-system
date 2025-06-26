@extends('layouts.admin')

@section('title', 'Daftar Penggantian Suku Cadang')

@section('content')
<div class="container-fluid">
    @if(Auth::user()->role !== 'kepala_jurusan')
    <a href="{{ route('replacements.create') }}" class="btn btn-primary mb-3">Tambah Penggantian Suku Cadang Baru</a>
    @endif

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="multi_col_order" class="table border table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Mesin</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($replacements as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->replacement_date)->format('d-m-Y') }}</td>
                            <td>{{ $item->machine->code ?? '-' }}</td>
                            <td>{{ $item->sparepart->name ?? '-' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->note }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data penggantian suku cadang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection