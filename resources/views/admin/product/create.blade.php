@include('includes.header')
@include('includes.navbar')
<!-- Menggunakan CKEditor via CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<h1>Tambah Produk</h1>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama_product">Nama Produk</label>
        <input type="text" name="nama_product" id="nama_product" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control" min="0" required>
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" name="rating" id="rating" class="form-control" min="0" max="5" value="0" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto Utama</label>
        <input type="file" name="foto" id="foto" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="foto1">Foto 1</label>
        <input type="file" name="foto1" id="foto1" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="foto2">Foto 2</label>
        <input type="file" name="foto2" id="foto2" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="foto3">Foto 3</label>
        <input type="file" name="foto3" id="foto3" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="foto4">Foto 4</label>
        <input type="file" name="foto4" id="foto4" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script>
    // Mengaktifkan CKEditor untuk textarea dengan id "deskripsi"
    CKEDITOR.replace('deskripsi');
</script>

@include('includes.footer')
@include('includes.scripts')
