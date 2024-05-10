@include('includes.header')
@include('includes.navbar')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Produk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_product">Nama Produk</label>
                            <input type="text" name="nama_product" id="nama_product" class="form-control" value="{{ $product->nama_product }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ $product->deskripsi }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" name="harga" id="harga" class="form-control" min="0" value="{{ $product->harga }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" id="rating" class="form-control" min="0" max="5" value="{{ $product->rating }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Utama</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                            <small id="fotoHelpBlock" class="form-text text-muted">Unggah foto utama produk (opsional).</small>
                        </div>
                        <div class="form-group">
                            <label for="foto1">Foto 1</label>
                            <input type="file" name="foto1" id="foto1" class="form-control-file">
                            <small id="foto1HelpBlock" class="form-text text-muted">Unggah foto tambahan produk (opsional).</small>
                        </div>
                        <div class="form-group">
                            <label for="foto2">Foto 2</label>
                            <input type="file" name="foto2" id="foto2" class="form-control-file">
                            <small id="foto2HelpBlock" class="form-text text-muted">Unggah foto tambahan produk (opsional).</small>
                        </div>
                        <div class="form-group">
                            <label for="foto3">Foto 3</label>
                            <input type="file" name="foto3" id="foto3" class="form-control-file">
                            <small id="foto3HelpBlock" class="form-text text-muted">Unggah foto tambahan produk (opsional).</small>
                        </div>
                        <div class="form-group">
                            <label for="foto4">Foto 4</label>
                            <input type="file" name="foto4" id="foto4" class="form-control-file">
                            <small id="foto4HelpBlock" class="form-text text-muted">Unggah foto tambahan produk (opsional).</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Mengaktifkan CKEditor untuk textarea dengan id "deskripsi"
    CKEDITOR.replace('deskripsi');
</script>
@include('includes.footer')
@include('includes.scripts')
