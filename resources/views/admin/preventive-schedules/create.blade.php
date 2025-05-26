@extends('layouts.admin')

@section('title', 'Pengajuan Jadwal Preventif')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Ajukan Jadwal Preventif</h4>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('preventive-schedules.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="machine_id" class="form-label">Pilih Mesin</label>
                <select name="machine_id" id="machine_id" class="form-control" required>
                    <option value="">-- Pilih Mesin --</option>
                    @foreach($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->code }} - {{ $machine->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="period_week" class="form-label">Minggu Ke-</label>
                <input type="number" name="period_week" id="period_week" class="form-control" min="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="period" class="form-label">Periode (Bulan & Tahun)</label>
                <input type="month" name="period" id="period" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Deskripsi (Opsional)</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Ajukan</button>
                <a href="{{ route('preventive-schedules.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</form>
@endsection