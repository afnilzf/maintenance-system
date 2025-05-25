@extends('layouts.admin')

@section('title', 'Edit Komponen Mesin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Edit Komponen - Mesin: <strong>{{ $machine->name }}</strong></h4>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('components.update', $machine->id) }}" method="POST" id="editComponentForm">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <input type="text" id="input-name" class="form-control" placeholder="Nama Komponen">
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="input-criteria" class="form-control" placeholder="Kriteria Pengukuran">
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="add-row" class="btn btn-primary">Tambah Baris</button>
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
                            <tbody>
                                @foreach($machine->components as $index => $component)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <input type="text" name="components[{{ $index }}][name]" class="form-control" value="{{ $component->name }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="components[{{ $index }}][measurement_criteria]" class="form-control" value="{{ $component->measurement_criteria }}">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        <a href="{{ route('machines.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        function refreshRowIndices() {
            $('#component-table tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
                $(this).find('input').each(function() {
                    const field = $(this).attr('name').split('][')[1];
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
                <td><input type="text" name="components[][name]" class="form-control" value="${name}" required></td>
                <td><input type="text" name="components[][measurement_criteria]" class="form-control" value="${criteria}"></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button></td>
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
    });
</script>
@endsection


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@endsection