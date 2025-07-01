@extends('layouts.admin')

@section('title', 'Buat Component')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Buat Komponen</h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Komponen untuk Mesin: <strong>{{ $machine->name }}</strong></h4>
            </div>
            <div class="card-body">
                <form action="{{ route('components.store', ['machine' => $machine->id]) }}" method="POST" id="componentForm">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="duplicate_from" class="form-label">Duplikasi dari mesin lain</label>
                            <select name="duplicate_from" id="duplicate_from" class="form-control select2">
                                <option value="">-- Pilih Mesin --</option>
                                @foreach ($otherMachinesWithComponents as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5">
                            <input type="text" id="input-name" class="form-control" placeholder="Nama Komponen">
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="input-criteria" class="form-control" placeholder="Kriteria Pengukuran">
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="add-row" class="btn btn-primary btn-rounded"><i class=" fas fa-arrow-circle-down"> Tambah</i></button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="component-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Komponen</th>
                                    <th>Kriteria Pengukuran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('components.index', $machine->id) }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        function refreshRowIndices() {
            $('#component-table tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
                $(this).find('input[name^="components"]').each(function() {
                    const field = $(this).attr('name').split('][')[1]; // e.g. name or measurement_criteria
                    $(this).attr('name', `components[${index}][${field.replace(']', '')}]`);
                });
            });
        }

        $('#add-row').click(function() {
            const name = $('#input-name').val();
            const criteria = $('#input-criteria').val();

            if (!name.trim()) {
                alert('Nama komponen wajib diisi.');
                return;
            }

            const row = `<tr>
                <td></td>
                <td>
                    ${name}
                    <input type="hidden" name="components[][name]" value="${name}">
                </td>
                <td>
                    ${criteria || '-'}
                    <input type="hidden" name="components[][measurement_criteria]" value="${criteria}">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>`;

            $('#component-table tbody').append(row);
            refreshRowIndices();
            $('#input-name').val('');
            $('#input-criteria').val('');
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            refreshRowIndices();
        });

        $('#duplicate_from').change(function() {
            const machineId = $(this).val();
            if (machineId) {
                $.get(`/admin/machines/${machineId}/components/json`, function(data) {
                    data.forEach((component) => {
                        const row = `<tr>
                            <td></td>
                            <td>
                                ${component.name}
                                <input type="hidden" name="components[][name]" value="${component.name}">
                            </td>
                            <td>
                                ${component.measurement_criteria ?? '-'}
                                <input type="hidden" name="components[][measurement_criteria]" value="${component.measurement_criteria ?? ''}">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button>
                            </td>
                        </tr>`;
                        $('#component-table tbody').append(row);
                    });
                    refreshRowIndices();
                });
            }
        });
    });
</script>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@endsection