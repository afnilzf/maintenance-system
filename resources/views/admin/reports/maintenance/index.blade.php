@extends('layouts.admin')

@section('title', 'Laporan Perawatan Mesin')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Laporan Perawatan Mesin</h4>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('laporan.perawatan') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="machine_id" class="form-label">Mesin</label>
            <select name="machine_id" id="machine_id" class="form-control">
                <option value="">-- Semua Mesin --</option>
                @foreach ($machines as $machine)
                <option value="{{ $machine->id }}" {{ request('machine_id') == $machine->id ? 'selected' : '' }}>
                    {{ $machine->code }} - {{ $machine->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="start_date" class="form-label">Periode Awal</label>
            <input type="date" name="start_date" id="start_date" class="form-control"
                value="{{ request('start_date') }}">
        </div>

        <div class="col-md-3">
            <label for="end_date" class="form-label">Periode Akhir</label>
            <input type="date" name="end_date" id="end_date" class="form-control"
                value="{{ request('end_date') }}">
        </div>

        <div class="col-md-3 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('laporan.perawatan.export', request()->all()) }}" class="btn btn-success">Export Excel</a>
        </div>
    </form>

    <!-- Table -->
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kode Mesin</th>
                        <th>Nama Mesin</th>
                        <th>Periode</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($results as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->machine->code ?? '-' }}</td>
                        <td>{{ $item->machine->name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::createFromDate($item->period_year, $item->period_month)->translatedFormat('F Y') }}</td>
                        <td><span class="badge bg-info">{{ ucfirst($item->approval_status) }}</span></td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection