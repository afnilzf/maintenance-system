@extends('layouts.admin')

@section('title', 'Detail Perbaikan Mesin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row g-3 mb-5">
                <div class="col-md-4">
                    <label class="form-label">Mesin</label>
                    <input type="text" class="form-control" value="{{ $repair->machine->code }} - {{ $repair->machine->name }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">PLP</label>
                    <input type="text" class="form-control" value="{{ $repair->user->name ?? '-' }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Satuan Kerja</label>
                    <input type="text" class="form-control" value="{{ $repair->user->sektor ?? '-' }}" disabled>
                </div>
            </div>
            <div class="row g-3 mb-5">
                <div class="col-md-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="text" class="form-control" value="{{ $repair->repair_date_start }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="text" class="form-control" value="{{ $repair->repair_date_finish }}" disabled>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Total Waktu</label>
                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($repair->repair_date_start)->diffInDays($repair->repair_date_finish) }} Hari" disabled>
                </div>
            </div>
            <hr>
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Bagian</th>
                            <th>Kerusakan</th>
                            <th>Penyebab</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repair->lines as $line)
                        <tr>
                            <td>{{ $line->part }}</td>
                            <td>{{ $line->issue }}</td>
                            <td>{{ $line->cause }}</td>
                            <td>{{ $line->solution }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <a href="{{ route('repairs.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection