@extends('layouts.admin')

@section('title', 'Buat Pemeriksaan Mesin')

@section('content')
<div class="container-fluid">
    <form action="{{ route('checklists.store', $schedule->id) }}" method="POST">
        @csrf
        <div class="card mb-3">
            <div class="card-body row g-3">
                <div class="col-md-3">
                    <label>Kode Mesin</label>
                    <input type="text" class="form-control" value="{{ $machine->code }}" disabled>
                </div>
                <div class="col-md-3">
                    <label>Nama Mesin</label>
                    <input type="text" class="form-control" value="{{ $machine->name }}" disabled>
                </div>
                <div class="col-md-3">
                    <label>Siklus</label>
                    <input type="text" class="form-control" value="{{ $schedule->cycle_type }}{{ $schedule->interval_month }}" disabled>
                </div>
                <div class="col-md-3">
                    <label>Tanggal Realisasi</label>
                    <input type="date" name="checked_at" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Komponen</th>
                            <th>Tolok Ukur</th>
                            <th>Kondisi</th>
                            <th>Perlakuan</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($components as $index => $component)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $component->name }}</td>
                            <td>{{ $component->measurement_criteria }}</td>
                            <td>
                                <select name="components[{{ $index }}][condition]" class="form-select" required>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="Rs">Rs</option>
                                    <option value="Rb">Rb</option>
                                </select>
                            </td>
                            <td>
                                <select name="components[{{ $index }}][treatment]" class="form-select">
                                    <option value="">-</option>
                                    <option value="P">P</option>
                                    <option value="Lo">Lo</option>
                                    <option value="Lg">Lg</option>
                                    <option value="Pb">Pb</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="components[{{ $index }}][note]" class="form-control">
                                <input type="hidden" name="components[{{ $index }}][component_id]" value="{{ $component->id }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Penjelasan -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="keterangan-box">
                            <strong>Penjelasan Kondisi:</strong><br>
                            B = Baik<br>
                            O = Sedang<br>
                            Rs = Rusak,sudah diperbaiki/ganti<br>
                            Rb = Rusak, perlu penanganan lebih lanjut
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="keterangan-box">
                            <strong>Penjelasan Perlakuan:</strong><br>
                            P = Pembersihan<br>
                            Lo = Lumasi oli<br>
                            Lg = Lumasi gemuk<br>
                            Pb = Perbaikan / Service
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <a href="{{ route('checklists.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection