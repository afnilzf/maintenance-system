@extends('layouts.admin')

@section('title', 'Daftar Pengajuan Suku Cadang')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Daftar Pengajuan Suku Cadang</h4>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="multi_col_order" class="table table-bordered table-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Supplier</th>
                    <th>Pengaju</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->sparepart->name }}</td>
                    <td>{{ $request->quantity }}</td>
                    <td>{{ $request->sparepart->unit }}</td>
                    <td>{{ $request->sparepart->supplier ?? '-' }}</td>
                    <td>{{ $request->requestedBy->name ?? '-' }}</td>
                    <td>{{ $request->created_at->format('d-m-Y') }}</td>
                    <td>
                        @if($request->status === 'pending')
                        <span class="badge rounded-pill bg-warning">Menunggu</span>
                        @elseif($request->status === 'approved')
                        <span class="badge rounded-pill  bg-success">Disetujui</span>
                        @else
                        <span class="badge rounded-pill  bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if($request->status === 'pending')
                        @if(Auth::user()->role !== 'plp')
                        <form action="{{ route('spareparts.approve-request', $request->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm btn-rounded"><i class=" fas fa-check-circle"></i></button>
                        </form>
                        <form action="{{ route('sparepart-requests.reject', $request->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm btn-rounded"><i class=" fas fa-times-circle"></i></button>
                        </form>
                        <a href="{{ route('spareparts.print-request', $request->id) }}" class="btn btn-sm btn-secondary btn-rounded">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        @endif
                        @elseif($request->status === 'rejected')
                        -
                        @else
                        <a href="{{ route('spareparts.print-request', $request->id) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-file-pdf"></i> Cetak
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection