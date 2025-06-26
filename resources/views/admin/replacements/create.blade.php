@extends('layouts.admin')

@section('title', 'Input Penggantian Suku Cadang')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h4 class="mb-4">Input Penggantian Suku Cadang</h4>
    <form action="{{ route('replacements.store') }}" method="POST">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Mesin</label>
                <select name="machine_id" class="form-control" required>
                    <option value="">-- Pilih MESIN --</option>
                    @foreach($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->code }} - {{ $machine->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Ganti</label>
                <input type="date" name="replacement_date" class="form-control" required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Nama Barang</label>
                <select name="sparepart_id" class="form-control" required>
                    <option value="">-- Pilih Sparepart --</option>
                    @foreach($spareparts as $sparepart)
                    <option value="{{ $sparepart->id }}">{{ $sparepart->name }} (Stok: {{ $sparepart->stock }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Jumlah</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Keterangan</label>
                <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
        </div>

        @if(Auth::user()->role === 'admin')
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Pilih PLP</label>
                <select name="replaced_by" class="form-control" required>
                    <option value="">-- Pilih PLP --</option>
                    @foreach(App\Models\User::where('role', 'plp')->get() as $plp)
                    <option value="{{ $plp->id }}">{{ $plp->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('replacements.index') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection