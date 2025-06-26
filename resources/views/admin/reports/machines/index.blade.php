@extends('layouts.admin')

@section('title', 'Laporan Data Mesin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h4>Laporan Data Mesin</h4>
        <a href="{{ route('laporan.mesin.export') }}" class="btn btn-success">Download Excel</a>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Tahun</th>
                        <th>Kompleksitas</th>
                        <th>Jumlah Komponen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($machines as $machine)
                    <tr>
                        <td>{{ $machine->code }}</td>
                        <td>{{ $machine->name }}</td>
                        <td>{{ $machine->brand }}</td>
                        <td>{{ $machine->type }}</td>
                        <td>{{ $machine->year }}</td>
                        <td>{{ $machine->repair_complexity }}</td>
                        <td>{{ $machine->components->count() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data mesin.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection