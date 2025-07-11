@extends('layouts.admin')

@section('title', 'Laporan Penggantian Suku Cadang')

@section('content')
<div class="container-fluid">
    <form method="GET" action="{{ route('laporan.penggantian') }}" class="row mb-3 g-2">
        <div class="col-md-3">
            <label>Sparepart</label>
            <select name="sparepart_id" class="form-control">
                <option value="">-- Semua --</option>
                @foreach($spareparts as $part)
                <option value="{{ $part->id }}" {{ request('sparepart_id') == $part->id ? 'selected' : '' }}>
                    {{ $part->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label>Periode Awal</label>
            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="col-md-2">
            <label>Periode Akhir</label>
            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary btn-rounded"><i class=" fas fa-search"></i>
            </button>
            <a href="{{ route('laporan.penggantian') }}" class="btn btn-secondary">Reset</a>
        </div>
        <div class="col-md-2 align-self-end text-end">
            <a href="{{ route('laporan.penggantian.export', request()->query()) }}" class="btn btn-success btn-rounded">
                <i class=" fas fa-download"> .xlsx</i>
            </a>
        </div>
    </form>

    <div class="card">
        <div class="card-body table-responsive">
            <table id="multi_col_order" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Sparepart</th>
                        <th>Mesin</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($replacements as $r)
                    <tr>
                        <td>{{ $r->replacement_date }}</td>
                        <td>{{ $r->sparepart->name }}</td>
                        <td>{{ $r->machine->name ?? '-' }}</td>
                        <td>{{ $r->quantity }}</td>
                        <td>{{ $r->notes }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection