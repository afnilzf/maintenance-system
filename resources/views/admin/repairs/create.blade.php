@extends('layouts.admin')

@section('title', 'Tambah Perbaikan Mesin')

@section('content')
<div class="container-fluid">
    <form action="{{ route('repairs.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row g-3 mb-5">
                    <div class="col-md-4">
                        <label class="form-label">Mesin</label>
                        <select name="machine_id" class="form-control" required>
                            <option value="">-- Pilih Mesin --</option>
                            @foreach ($machines as $machine)
                            <option value="{{ $machine->id }}">{{ $machine->code }} - {{ $machine->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if (Auth::user()->role === 'admin')
                    <div class="col-md-3">
                        <label class="form-label">Pilih PLP</label>
                        <select name="repaired_by" id="repaired_by" class="form-control" required>
                            <option value="">-- Pilih PLP --</option>
                            @foreach($plps as $plp)
                            <option value="{{ $plp->id }}" data-sektor="{{ $plp->sektor }}">{{ $plp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Satuan Kerja</label>
                        <input type="text" id="sektor" class="form-control" disabled>
                    </div>
                    @else
                    <div class="col-md-3">
                        <label class="form-label">PLP</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        <input type="hidden" name="repaired_by" value="{{ Auth::id() }}">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Satuan Kerja</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->sektor }}" disabled>
                    </div>
                    @endif
                </div>

                <hr>

                <div class="row g-3 mb-5">
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="repair_date_start" id="repair_date_start" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="repair_date_finish" id="repair_date_finish" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Total Waktu</label>
                        <input type="text" class="form-control" id="total_days" disabled readonly>
                    </div>
                </div>

                <hr>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-sm" id="repair-table">
                        <thead class="table-light">
                            <tr>
                                <th>Bagian</th>
                                <th>Kerusakan</th>
                                <th>Penyebab</th>
                                <th>Solusi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-secondary" id="add-row">Tambah Baris</button>
                </div>

                <div class="text-end">
                    <a href="{{ route('repairs.index') }}" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary" type="submit">Simpan Perbaikan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function updateTotalDays() {
        const start = document.getElementById('repair_date_start').value;
        const finish = document.getElementById('repair_date_finish').value;
        if (start && finish) {
            const startDate = new Date(start);
            const finishDate = new Date(finish);
            const diffTime = finishDate - startDate;
            const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
            document.getElementById('total_days').value = diffDays + ' Hari';
        }
    }

    document.getElementById('repair_date_start').addEventListener('change', updateTotalDays);
    document.getElementById('repair_date_finish').addEventListener('change', updateTotalDays);

    let rowIdx = 0;
    document.getElementById('add-row').addEventListener('click', () => {
        const tbody = document.querySelector('#repair-table tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" name="lines[${rowIdx}][part]" class="form-control" required></td>
            <td><input type="text" name="lines[${rowIdx}][issue]" class="form-control"></td>
            <td><input type="text" name="lines[${rowIdx}][cause]" class="form-control"></td>
            <td><input type="text" name="lines[${rowIdx}][solution]" class="form-control"></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove()">Hapus</button></td>
        `;
        tbody.appendChild(row);
        rowIdx++;
    });

    document.addEventListener('DOMContentLoaded', function() {
        const repairedBySelect = document.getElementById('repaired_by');
        const sektorInput = document.getElementById('sektor');

        if (repairedBySelect && sektorInput) {
            repairedBySelect.addEventListener('change', function() {
                const sektor = this.options[this.selectedIndex].getAttribute('data-sektor');
                sektorInput.value = sektor || '';
            });
        }
    });
</script>
@endsection