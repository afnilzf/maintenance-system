@extends('layouts.admin')

@section('title', 'Edit Machine')

@section('content')
<h4>Edit Machine Data</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('machines.update', $machine->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Mesin</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $machine->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Kode Mesin</label>
                                    <input type="text" name="code" class="form-control" value="{{ old('code', $machine->code) }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tipe Mesin</label>
                                    <input type="text" name="type" class="form-control" value="{{ old('type', $machine->type) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">No Inventaris</label>
                                    <input type="text" name="inventory_number" class="form-control" value="{{ old('inventory_number', $machine->inventory_number) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tahun Perolehan</label>
                                    <input type="number" name="year_acquired" class="form-control" min="1900" max="{{ date('Y') }}" value="{{ old('year_acquired', $machine->year_acquired) }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Aktif" {{ $machine->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Tidak Aktif" {{ $machine->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">Kondisi</label>
                                    <select name="condition" class="form-control">
                                        <option value="Baik" {{ $machine->condition == 'Baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="Rusak" {{ $machine->condition == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <label>Spesifikasi Mesin</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ukuran</label>
                            <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="length" class="form-control" step="0.01" value="{{ old('length', rtrim(rtrim($machine->length, '0'), '.')) }}">
                                            <span class="input-group-text">meter</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="width" class="form-control" step="0.01" value="{{ old('width', rtrim(rtrim($machine->width, '0'), '.')) }}">
                                            <span class="input-group-text">meter</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="height" class="form-control" step="0.01" value="{{ old('height', rtrim(rtrim($machine->height, '0'), '.')) }}">
                                            <span class="input-group-text">meter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputDaya" class="col-sm-2 col-form-label">Daya</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="power" class="form-control" value="{{ old('power', $machine->power) }}">
                                    <span class="input-group-text">watt</span>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Repair Complexity</label>
                                    <input type="number" name="repair_complexity" class="form-control" value="{{ old('repair_complexity', $machine->repair_complexity) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" name="supplier" class="form-control" value="{{ old('supplier', $machine->supplier) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                                    <div class="mt-2">
                                        <img id="imagePreview" src="{{ asset('storage/' . $machine->image) }}" alt="Foto Mesin" style="max-height: 150px; {{ $machine->image ? '' : 'display:none;' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('machines.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');
        const file = input.files[0];

        if (file) {
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!validTypes.includes(file.type)) {
                alert("Only JPG and PNG images are allowed.");
                input.value = "";
                preview.style.display = 'none';
                return;
            }

            if (file.size > maxSize) {
                alert("Image must be less than 2MB.");
                input.value = "";
                preview.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection