{{-- resources/views/admin/spareparts/history.blade.php --}}
@extends('layouts.admin')

@section('title', 'Riwayat Suku Cadang')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Riwayat Penggunaan dan Penambahan Suku Cadang</h4>

    <ul class="nav nav-tabs mb-3" id="stokTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="masuk-tab" data-bs-toggle="tab" data-bs-target="#stokMasuk"
                type="button" role="tab">Stok Masuk</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="keluar-tab" data-bs-toggle="tab" data-bs-target="#stokKeluar"
                type="button" role="tab">Stok Digunakan</button>
        </li>
    </ul>

    <div class="tab-content" id="stokTabsContent">
        {{-- Stok Masuk --}}
        <div class="tab-pane fade show active" id="stokMasuk" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Masuk</th>
                            <th>Satuan</th>
                            <th>Tanggal Masuk</th>
                            <th>Supplier</th>
                            <th>Pengaju</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inHistory as $index => $entry)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $entry->sparepart->name ?? '-' }}</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>{{ $entry->unit }}</td>
                            <td>{{ $entry->created_at->format('d-m-Y') }}</td>
                            <td>{{ $entry->supplier }}</td>
                            <td>{{ $entry->requestedBy->name ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Stok Keluar --}}
        <div class="tab-pane fade" id="stokKeluar" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Digunakan</th>
                            <th>Satuan</th>
                            <th>Tanggal</th>
                            <th>Kode Mesin</th>
                            <th>Nama Mesin</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outHistory as $index => $entry)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $entry->sparepart->name ?? '-' }}</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>{{ $entry->unit }}</td>
                            <td>{{ $entry->created_at->format('d-m-Y') }}</td>
                            <td>{{ $entry->machine_code ?? '-' }}</td>
                            <td>{{ $entry->machine_name ?? '-' }}</td>
                            <td>{{ $entry->description ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection