@extends('layouts.admin')

@section('title', 'Daftar Pemeriksaan Mesin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Daftar Pemeriksaan Mesin</h4>
    @if(Auth::user()->role === 'plp')
    <!-- <a href="{{ route('preventive-schedules.create') }}" class="btn btn-primary">+ Ajukan Jadwal</a> -->
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
        <table id="multi_col_order" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Mesin</th>
                    <th>Nama Mesin</th>
                    <th>Periode</th>
                    <th>Realisasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $i => $req)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $req->machine->code }}</td>
                    <td>{{ $req->machine->name }}</td>
                    <td>{{ \Carbon\Carbon::create($req->period_year, $req->period_month)->translatedFormat('F Y') }}</td>
                    <td>
                        @if($req->checklist && $req->checklist->lines->count() > 0)
                        {{ $req->checklist->checked_at}}
                        @else
                        -
                        @endif
                        <!-- {{ $req->checked_at ? $req->checked_at . '-' . $req->checked_at  : '-' }} -->
                    </td>
                    <td>
                        @if($req->checklist && $req->checklist->lines->count() > 0)

                        <span class="badge rounded-pill bg-success">Selesai</span>
                        @else
                        <span class="badge rounded-pill bg-warning">Waiting</span>
                        @endif
                    </td>
                    <td>
                        @if($req->checklist && $req->checklist->lines->count() > 0)
                        <a href="{{ route('checklists.show', $req->checklist->id) }}" class="btn btn-sm btn-info btn-rounded"><i class=" fas fa-eye"></i></a>
                        @else
                        @if(Auth::user()->role !== 'kepala_jurusan')
                        <a href="{{ route('checklists.create', $req->id) }}" class="btn btn-sm btn-primary btn-rounded"><i class="fas fa-arrow-alt-circle-right"></i></a>
                        @else
                        -
                        @endif
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection