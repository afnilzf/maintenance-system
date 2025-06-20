@extends('layouts.admin')

@section('title', 'Pengajuan Perawatan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Ajukan Perawatan</h4>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('maintenance-requests.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="plp" class="form-label">PLP</label>
                <input type="text" name="plp" class="form-control" value="{{ Auth::user()->name }}" disabled>
            </div>

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
                <input type="number" name="period_week" class="form-control" min="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="period_month" class="form-label">Bulan & Tahun</label>
                <input type="month" name="period" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Siklus Perawatan</label>
                <div class="row">
                    <div class="col-md-6">
                        <select name="cycle_type" class="form-control" required>
                            <option value="">-- Pilih Siklus --</option>
                            <option value="I">I</option>
                            <option value="K">K</option>
                            <option value="M">M</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="interval_month" class="form-control" min="1" placeholder="Isi Angka Siklus" required>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Deskripsi (Opsional)</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Ajukan</button>
                <a href="{{ route('maintenance-requests.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</form>
@endsection