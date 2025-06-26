@extends('layouts.admin')

@section('title', 'Daftar Jadwal Preventif')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Pengajuan Perawatan</h4>
    @if(Auth::user()->role === 'plp')
    <a href="{{ route('maintenance-requests.create') }}" class="btn btn-primary">+ Buat Pengajuan</a>
    @endif
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('warning'))
<div class="alert alert-warning">{{ session('warning') }}</div>
@endif

<div class="card">
    <div class="card-body table-responsive">
        <table id="multi_col_order" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mesin</th>
                    <th>Minggu</th>
                    <th>Periode</th>
                    <th>Diajukan Oleh</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $idx => $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $schedule->machine->code }} - {{ $schedule->machine->name }}</td>
                    <td>{{ $schedule->period_week }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->period)->translatedFormat('F Y') }}</td>
                    <td>{{ $schedule->creator->name }}</td>
                    <td>
                        @if($schedule->approval_status === 'approved')
                        <span class="badge bg-success">Disetujui</span>
                        @elseif($schedule->approval_status === 'rejected')
                        <span class="badge bg-danger">Ditolak</span>
                        @else
                        <span class="badge bg-warning">Menunggu</span>
                        @endif
                    </td>
                    <td>
                        @if($schedule->approval_status === 'pending' && in_array(Auth::user()->role, ['admin', 'kepala_jurusan']))
                        <form action="{{ route('maintenance-requests.approve', $schedule->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        <form action="{{ route('maintenance-requests.reject', $schedule->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                        @endif

                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $schedule->id }}">Detail</button>

                        <!-- Modal -->
                        <div class="modal fade" id="detailModal{{ $schedule->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $schedule->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $schedule->id }}">Detail Jadwal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Mesin:</strong> {{ $schedule->machine->code }} - {{ $schedule->machine->name }}</p>
                                        <p><strong>Minggu ke-:</strong> {{ $schedule->period_week }}</p>
                                        <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($schedule->period)->translatedFormat('F Y') }}</p>
                                        <p><strong>Diajukan Oleh:</strong> {{ $schedule->creator->name }}</p>
                                        <p><strong>Status:</strong>
                                            @if($schedule->approval_status === 'approved')
                                            <span class="badge bg-success">Disetujui</span>
                                            @elseif($schedule->approval_status === 'rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                            @else
                                            <span class="badge bg-warning">Menunggu</span>
                                            @endif
                                        </p>
                                        <!-- <h6>Daftar Persetujuan</h6>
                                        <ul class="list-unstyled">
                                            <li class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong>Kepala Bengkel</strong><br>
                                                    <small class="text-muted">Persetujuan</small>
                                                </div>
                                                <div class="text-end">
                                                    @if($schedule->approved_by_head)
                                                    <span class="badge bg-success">Disetujui</span><br>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($schedule->approved_by_head_at)->translatedFormat('d M Y H:i') }}</small>
                                                    @else
                                                    <span class="badge bg-secondary">Belum disetujui</span>
                                                    @endif
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center mt-2">
                                                <div>
                                                    <strong>Kepala Jurusan</strong><br>
                                                    <small class="text-muted">Persetujuan</small>
                                                </div>
                                                <div class="text-end">
                                                    @if($schedule->approved_by_department)
                                                    <span class="badge bg-success">Disetujui</span><br>
                                                    <small class="text-muted">{{ \Carbon\Carbon::parse($schedule->approved_by_department_at)->translatedFormat('d M Y H:i') }}</small>
                                                    @else
                                                    <span class="badge bg-secondary">Belum disetujui</span>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul> -->

                                        <p><strong>Deskripsi:</strong> {{ $schedule->description ?? '-' }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada pengajuan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection