@extends('layouts.admin')
@section('title', 'Daftar Perbaikan Mesin')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        @if(Auth::user()->role !== 'kepala_jurusan')
        <a href="{{ route('repairs.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Buat Perbaikan
        </a>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="multi_col_order" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Mesin</th>
                            <th>Nama Mesin</th>
                            <th>Pelaksana</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($repairs as $index => $repair)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $repair->machine->code ?? '-' }}</td>
                            <td>{{ $repair->machine->name ?? '-' }}</td>
                            <td>{{ $repair->user->name ?? '-' }}</td>
                            <td>{{ $repair->repair_date_start }}</td>
                            <td>{{ $repair->repair_date_finish }}</td>
                            <td>
                                <a href="{{ route('repairs.show', $repair->id) }}" class="btn btn-sm btn-info">Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data yang ditampilkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection