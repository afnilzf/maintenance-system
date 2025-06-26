@extends('layouts.admin')

@section('title', 'Preview Pemeriksaan Mesin')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-body row g-3">
            <div class="col-md-3">
                <label>Kode Mesin</label>
                <input type="text" class="form-control" value="{{ $checklist->machine->code }}" disabled>
            </div>
            <div class="col-md-3">
                <label>Nama Mesin</label>
                <input type="text" class="form-control" value="{{ $checklist->machine->name }}" disabled>
            </div>
            <div class="col-md-3">
                <label>Siklus</label>
                <input type="text" class="form-control" value="{{ $checklist->schedule->cycle_type }} / {{ $checklist->schedule->interval_month }}" disabled>
            </div>
            <div class="col-md-3">
                <label>Tanggal Realisasi</label>
                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($checklist->checked_at)->format('d-m-Y') }}" disabled>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Komponen</th>
                        <th>Tolok Ukur</th>
                        <th>Kondisi</th>
                        <th>Perlakuan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checklist->lines as $line)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $line->component->name }}</td>
                        <td>{{ $line->component->measurement_criteria }}</td>
                        <td>{{ $line->condition }}</td>
                        <td>{{ $line->treatment ?? '-' }}</td>
                        <td>{{ $line->note ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Penjelasan -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="keterangan-box">
                        <strong>Penjelasan Kondisi:</strong><br>
                        B = Baik<br>
                        O = Operasional, ditunda<br>
                        Rs = Rusak perlu ganti<br>
                        Rb = Rusak berat, penanganan lanjut
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="keterangan-box">
                        <strong>Penjelasan Perlakuan:</strong><br>
                        P = Pembersihan<br>
                        Lo = Lumasi oli<br>
                        Lg = Lumasi gemuk<br>
                        Pb = Perbaikan / Service
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <a href="{{ route('checklists.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection