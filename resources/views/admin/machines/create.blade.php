@extends('layouts.admin')

@section('title', 'Tambah Mesin')

@section('content')
<h4>Tambah data mesin</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Tambah Data Mesin</h4>
                <form action="{{ route('machines.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Nama Mesin</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama mesin" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Kode Mesin</label>
                                    <input type="text" name="code" class="form-control" placeholder="Kode mesin" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tipe Mesin</label>
                                    <input type="text" name="type" class="form-control" placeholder="Tipe mesin" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="form-label">No Inventaris</label>
                                    <input type="text" name="inventory_number" class="form-control" placeholder="Tipe mesin" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tahun Perolehan</label>
                                    <input type="number" name="year_acquired" class="form-control" min="1900" max="{{ date('Y') }}" step="1"
                                        placeholder="e.g. 2020">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif
                                        <option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">Kondisi</label>
                                    <select name="condition" class="form-control">
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <div class="row">

                            <label>Spesifikasi Mesin</label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Ukuran</label>
                            <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="length" class="form-control"
                                                step="0.01">
                                            <span class="input-group-text">meter</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="width" class="form-control"
                                                step="0.01">
                                            <span class="input-group-text">meter</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <input type="number" name="height" class="form-control"
                                                step="0.01">
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
                                    <input type="number" class="form-control" id="inputDaya"
                                        name="power" placeholder="Daya">
                                    <span class="input-group-text">watt</span>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Repair Complexity</label>
                                    <input type="number" name="repair_complexity" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" name="supplier" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                                    <div class="mt-2">
                                        <img id="imagePreview" src="#" alt="Image Preview"
                                            style="display:none; max-height: 200px; border:1px solid #ddd; padding:5px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Save</button>
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