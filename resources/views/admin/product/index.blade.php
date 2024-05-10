@include('includes.header')
@include('includes.navbar')

<h1>Daftar Produk</h1>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahProdukModal">
    <i class="fas fa-plus"></i> Tambah Produk
</button>


<form action="{{ route('admin.products.index') }}" method="GET" class="mb-2">
    <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4">
        <div class="form-row align-items-center">
            <div class="col-md-4 mb-2 mb-md-0">
                <input type="text" name="search" class="form-control" placeholder="Cari nama produk" value="{{ request('search') }}">
            </div>
            <div class="col-md-4 mb-2 mb-md-0">
                <select name="rating" class="form-control">
                    <option value="">Pilih Rating</option>
                    <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>1 Bintang</option>
                    <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>2 Bintang</option>
                    <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 Bintang</option>
                    <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 Bintang</option>
                    <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 Bintang</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
            </div>
            <div class="col-md-2">
                @if(request()->filled('search') || request()->filled('rating'))
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="fas fa-sync-alt"></i> Reset Filter</a>
                @endif
            </div>
        </div>
    </form>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle">#</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">Deskripsi</th>
                    <th class="align-middle">Harga</th>
                    <th class="align-middle">Rating</th>
                    <th class="align-middle">Foto Utama</th>
                    <th class="align-middle">Foto Tambahan</th>
                    <th class="align-middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 + ($products->perPage() * ($products->currentPage() - 1)) }}</td>
                    <td class="product-name">{{ $product->nama_product }}</td>
                    <td>{!! Str::limit($product->deskripsi, 50) !!}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>
                        <div class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->rating)
                                    <span class="star"><i class="fas fa-star"></i></span>
                                @else
                                    <span class="star"><i class="far fa-star"></i></span>
                                @endif
                            @endfor
                        </div>
                    </td>
                    <td>
                        @if ($product->foto)
                            <img src="{{ asset('storage/foto_produk/'.$product->foto) }}" alt="Foto Utama" class="img-thumbnail" width="60" height="60">
                        @else
                            <p class="text-muted">Tidak ada foto utama</p>
                        @endif
                    </td>
                    <td>
                        <div class="additional-photos">
                            @if ($product->foto1)
                                <img src="{{ asset('storage/foto_produk/'.$product->foto1) }}" alt="Foto 1" class="img-thumbnail" width="40" height="40">
                            @endif
                            @if ($product->foto2)
                                <img src="{{ asset('storage/foto_produk/'.$product->foto2) }}" alt="Foto 2" class="img-thumbnail" width="40" height="40">
                            @endif
                            @if ($product->foto3)
                                <img src="{{ asset('storage/foto_produk/'.$product->foto3) }}" alt="Foto 3" class="img-thumbnail" width="40" height="40">
                            @endif
                            @if ($product->foto4)
                                <img src="{{ asset('storage/foto_produk/'.$product->foto4) }}" alt="Foto 4" class="img-thumbnail" width="40" height="40">
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            @if ($products->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
                <li class="page-item"><a href="{{ $products->previousPageUrl() }}" class="page-link">Previous</a></li>
            @endif

            @if ($products->hasMorePages())
                <li class="page-item"><a href="{{ $products->nextPageUrl() }}" class="page-link">Next</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif
        </ul>
    </nav>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah produk -->
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="tambahProdukForm">
                    @csrf
                    <div class="form-group">
                        <label for="nama_product">Nama Produk</label>
                        <input type="text" name="nama_product" id="nama_product" class="form-control" required>
                        <small id="namaHelpBlock" class="form-text text-muted">Masukkan nama produk dengan jelas dan singkat.</small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required></textarea>
                        <small id="deskripsiHelpBlock" class="form-text text-muted">Deskripsikan produk secara mendetail.</small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" name="harga" id="harga" class="form-control" min="0" required>
                            </div>
                            <small id="hargaHelpBlock" class="form-text text-muted">Harga dalam Rupiah.jangan gunakan tanda apapun(hanya menggunakan angka)</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" id="rating" class="form-control" min="0" max="5" value="0" required>
                            <small id="ratingHelpBlock" class="form-text text-muted">Rating produk (0-5).</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Utama</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">
                        <small id="fotoHelpBlock" class="form-text text-muted">Unggah foto utama produk.</small>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" form="tambahProdukForm" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>




<style>/* CSS tambahan */
    .modal-content {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary:hover {
        background-color: #007bff;
    }
    </style>


<script>
    // Mengaktifkan CKEditor untuk textarea dengan id "deskripsi"
    CKEDITOR.replace('deskripsi');
</script>


<!-- Pastikan jQuery dimuat sebelum skrip -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Pastikan CKEditor diinisialisasi sebelum skrip yang menggunakannya -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    // Event listener untuk modal edit yang akan menginisialisasi CKEditor setelah modal ditampilkan
    $('#editModal').on('shown.bs.modal', function () {
        CKEDITOR.replace('deskripsi', {
            removePlugins: 'toolbar,elementspath'
        });
    });
</script>



@include('includes.footer')
@include('includes.scripts')
