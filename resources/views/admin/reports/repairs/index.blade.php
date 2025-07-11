@extends('layouts.admin')

@section('title', 'Laporan Perbaikan Mesin')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Laporan Perbaikan Mesin</h4>

    <form method="GET" action="{{ route('laporan.perbaikan') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="machine_id" class="form-label">Mesin</label>
            <select name="machine_id" class="form-control">
                <option value="">-- Semua Mesin --</option>
                @foreach($machines as $machine)
                <option value="{{ $machine->id }}" {{ request('machine_id') == $machine->id ? 'selected' : '' }}>
                    {{ $machine->code }} - {{ $machine->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="start_date" class="form-label">Periode Awal</label>
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">Periode Akhir</label>
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-3 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary btn-rounded"><i class=" fas fa-search"></i></button>
            <a href="{{ route('laporan.perbaikan.export', request()->all()) }}" class="btn btn-success btn-rounded"><i class=" fas fa-download"> .xlsx</i></a>
        </div>
    </form>

    <div class="card">
        <div class="card-body table-responsive">
            <table id="multi_col_order" class="table table-bordered">
                <thead class=" table-light">
                    <tr>
                        <th>#</th>
                        <th>Kode Mesin</th>
                        <th>Nama Mesin</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>PLP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $i => $log)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $log->machine->code }}</td>
                        <td>{{ $log->machine->name }}</td>
                        <td>{{ $log->repair_date_start }}</td>
                        <td>{{ $log->repair_date_finish }}</td>
                        <td>{{ $log->repairedBy->name ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data perbaikan ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection