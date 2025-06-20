@extends('layouts.admin')

@section('title', 'Tambah Suku Cadang')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Suku Cadang</h4>
                    <form action="{{ route('spareparts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Filter Udara">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Spesifikasi</label>
                            <input type="text" name="specification" class="form-control" placeholder="Contoh: Ukuran 20x30cm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok Awal</label>
                            <input type="number" name="stock" class="form-control" placeholder="Contoh: 10">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Satuan</label>
                            <input type="text" name="unit" class="form-control" placeholder="Contoh: Buah">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <input type="text" name="supplier" class="form-control" placeholder="Contoh: CV. Sumber Teknik">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('spareparts.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection