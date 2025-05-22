@extends('layouts.admin')

@section('title', 'Tambah Mesin')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h4 class="mb-4">Form Tambah Mesin</h4>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('mesin.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mesin</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Mesin</label>
                <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}">
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Mesin</label>
                <input type="text" name="jenis" class="form-control" value="{{ old('jenis') }}">
            </div>

            <button type="submit" class="btn btn-success">
                <i data-feather="save"></i> Simpan
            </button>
            <a href="{{ route('mesin.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection