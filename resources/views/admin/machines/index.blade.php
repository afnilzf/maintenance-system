@extends('layouts.admin')

@section('title', 'Data Mesin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Mesin</h4>
    <a href="{{ route('machines.create') }}" class="btn btn-rounded btn-primary">
        <i data-feather="plus"></i> Add Machine
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="default_order" class="table border table-striped table-bordered text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mesin</th>
                            <th>Nama Mesin</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Kondisi</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($machines as $idx => $machine)
                        <tr>
                            <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                            <td>{{ $machine->code }}</td>
                            <td>{{ $machine->name }}</td>
                            <td>{{ $machine->type }}</td>

                            {{-- STATUS --}}
                            <td>
                                @if($machine->status === 'Aktif')
                                <span class="badge rounded-pill text-bg-success">Aktif</span>
                                @else
                                <span class="badge rounded-pill text-bg-danger">{{ $machine->status }}</span>
                                @endif
                            </td>

                            {{-- KONDISI --}}
                            <td>
                                @if($machine->condition === 'Baik')
                                <span class="badge rounded-pill text-bg-info">Baik</span>
                                @elseif($machine->condition === 'Rusak')
                                <span class="badge rounded-pill text-bg-warning">Rusak</span>
                                @else
                                <span class="badge rounded-pill text-bg-secondary">{{ $machine->condition }}</span>
                                @endif
                            </td>

                            {{-- SPESIFIKASI --}}
                            <td>
                                <!-- <a href="" class="btn btn-sm btn-rounded btn-primary"><i class="fas fa-info"></i></a> -->
                                <button type="button"
                                    class="btn btn-sm btn-rounded btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#specModal{{ $machine->id }}">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </td>

                            {{-- ACTION --}}
                            <td>
                                <!-- Misalnya tombol edit dan delete -->
                                <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-sm btn-rounded btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-rounded btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data mesin ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @if($machine->components->isEmpty())
                                <a href="{{ route('components.create', ['machine' => $machine->id]) }}"
                                    class="btn btn-sm btn-rounded btn-success" title="Tambah Komponen">
                                    <i class="fas fa-plus"></i>
                                </a>
                                @else
                                <a href="{{ route('components.index', ['machine' => $machine->id]) }}"
                                    class="btn btn-sm btn-rounded btn-secondary" title="Lihat Komponen">
                                    <i class="fas fa-cogs"></i>
                                </a>
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
@foreach($machines as $idx => $machine)
<!-- Modal -->
<div class="modal fade" id="specModal{{ $machine->id }}" tabindex="-1" aria-labelledby="specModalLabel{{ $machine->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="specModalLabel{{ $machine->id }}">Spesifikasi Mesin - {{ $machine->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode</th>
                        <td>{{ $machine->code }}</td>
                    </tr>
                    <tr>
                        <th>Tipe</th>
                        <td>{{ $machine->type }}</td>
                    </tr>
                    <tr>
                        <th>No Inventaris</th>
                        <td>{{ $machine->inventory_number }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Perolehan</th>
                        <td>{{ $machine->year_acquired }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $machine->status == 'Aktif' ? 'Aktif' : 'Tidak Aktif' }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>{{ $machine->condition == 'Baik' ? 'Baik' : 'Rusak' }}</td>
                    </tr>
                    <tr>
                        <th>Ukuran (P x L x T)</th>
                        <td>
                            {{ rtrim(rtrim($machine->length, '0'), '.') }} x
                            {{ rtrim(rtrim($machine->width, '0'), '.') }} x
                            {{ rtrim(rtrim($machine->height, '0'), '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Daya</th>
                        <td>{{ $machine->power }}</td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td>{{ $machine->supplier }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if ($machine->image)
                            <img src="{{ asset('storage/' . $machine->image) }}"
                                alt="Foto Mesin"
                                style="max-height: 100px; cursor: zoom-in;"
                                onclick="showFullImage('{{ asset('storage/' . $machine->image) }}')">
                            @else
                            <em>Tidak ada foto</em>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal Tampilan Gambar Besar -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white text-center">
            <div class="modal-body p-0">
                <img id="fullImage" src="" class="img-fluid" alt="Full Image">
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    function showFullImage(src) {
        document.getElementById('fullImage').src = src;
        let modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
        modal.show();
    }
</script>

@endsection