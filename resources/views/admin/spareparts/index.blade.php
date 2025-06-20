@extends('layouts.admin')

@section('title', 'Daftar Suku Cadang')

@section('content')
<div class="container-fluid">
    <a href="{{ route('spareparts.create') }}" class="btn btn-rounded btn-primary">
        <i data-feather="plus"></i> Tambah Suku Cadang dan Oli
    </a>
    <a href="{{ route('spareparts.history') }}" class="btn btn-rounded btn-info ms-2">
        <i data-feather="clock"></i> Riwayat Suku Cadang
    </a>

    <div class="row mt-3">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table border table-striped table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Spesifikasi</th>
                                <th>Stok</th>
                                <th>Supplier</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($spareparts as $index => $sparepart)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sparepart->name }}</td>
                                <td>{{ $sparepart->specification }}</td>
                                <td>{{ $sparepart->stock }}</td>
                                <td>{{ $sparepart->supplier }}</td>
                                <td>
                                    @if($sparepart->stock == 0 && in_array(Auth::user()->role, ['plp', 'admin']))
                                    @if(!$sparepart->pendingRequest)
                                    <button type="button" class="btn btn-sm btn-rounded btn-warning" data-bs-toggle="modal" data-bs-target="#modalPengajuan" data-id="{{ $sparepart->id }}" data-name="{{ $sparepart->name }}">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </button>
                                    @else
                                    <span class="badge bg-secondary">Menunggu Approval</span>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalPengajuan" tabindex="-1" aria-labelledby="modalPengajuanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="pengajuanForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengajuanLabel">Form Pengajuan Pembelian Suku Cadang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="sparepart_id" id="sparepart_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="sparepart_name" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Pembelian</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    @if(Auth::user()->role === 'plp')
                    <div class="mb-3">
                        <label class="form-label">Pengaju</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Contoh: Stok habis, perlu pembelian segera"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ajukan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const modalPengajuan = document.getElementById('modalPengajuan');
    modalPengajuan.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');

        document.getElementById('sparepart_id').value = id;
        document.getElementById('sparepart_name').value = name;

        // Ubah action form dengan parameter sparepart_id
        const form = document.getElementById('pengajuanForm');
        form.setAttribute('action', `/spareparts/${id}/request`);
    });
</script>

@endsection