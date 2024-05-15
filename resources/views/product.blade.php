<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Solusi CCTV Rumah </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<style>
    .product-card {
        position: relative;
        transition: transform 0.3s ease-in-out;
        margin-bottom: 20px;
        border-radius: 15px;
        overflow: hidden;
        max-width: 300px; /* Batasan lebar maksimum kartu produk */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
        width: 100%;
        height: 200px; /* Tentukan ketinggian tetap untuk gambar */
        object-fit: cover; /* Memastikan gambar diisi dengan benar tanpa merubah aspek rasio */
        border-radius: 15px 15px 0 0;
    }

    .product-description {
        height: auto; /* Mengatur tinggi deskripsi produk agar mencakup semua konten */
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .product-rating {
        color: #ffc107;
        font-size: 14px;
    }

    .btn-group {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        transition: opacity 0.3s ease;
        opacity: 0;
    }

    .product-card:hover .btn-group {
        opacity: 1;
        bottom: 10px;
    }

    .btn-icon {
        background-color: rgba(0, 0, 0, 0.7);
        border-color: rgba(0, 0, 0, 0.7);
        transition: background-color 0.3s ease;
        margin: 0 5px;
    }

    .btn-icon:hover {
        background-color: rgba(0, 0, 0, 0.9);
    }

    .btn-icon i {
        color: white;
    }

    /* Tambahan untuk menghindari konten deskripsi masuk ke dalam footer */
    .card-body {
        overflow: hidden;
    }
    .star i.fas.fa-star {
                                        color: gold;
                                    }
</style>
</head>

<body>

       <!-- Spinner Start -->
       <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar Start -->
    @foreach($informasis as $informasi)
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary">{{ $informasi->namapt }}</h2>
        </a>
        @endforeach
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('products.index') }}" class="nav-item nav-link active">Produk</a>
                <a href="{{ route('keranjang') }}" class="nav-item nav-link"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
        
    </nav>
    <!-- Navbar End -->

  <!-- Product Showcase Section -->
  <section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-5 g-4 justify-content-center">
            @if ($products->count() > 0)
                @foreach ($products as $key => $product)
                <!-- Product Item -->
                <div class="col">
                    <div class="card product-card shadow">
                        @if ($product->foto)
                            <img src="{{ asset('storage/foto_produk/'.$product->foto) }}" class="card-img-top" alt="Product Image">
                        @else
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Default Product Image">
                        @endif
                        <div class="product-description card-body">
                            <h5 class="card-title">{{ $product->nama_product }}</h5>
                            <p class="card-text">{!! $product->deskripsi !!}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <span class="star"><i class="fas fa-star"></i></span>
                                        @else
                                            <span class="star"><i class="far fa-star"></i></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="btn-group">
                            <!-- Form untuk menambahkan produk ke keranjang -->
                            <form id="addToCartForm{{ $key }}" action="{{ route('keranjang.tambah', ['productId' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="button" onclick="addToCart({{ $key }})" class="btn btn-sm btn-outline-secondary btn-icon btn-animate" data-product-id="{{ $product->id }}" data-is-logged-in="{{ Auth::check() ? 'true' : 'false' }}">
                                    <i class="bi bi-cart-plus-fill"></i>
                                </button>
                            </form>
                            <!-- End Form -->
                                <button type="button" class="btn btn-sm btn-view-details btn-icon btn-animate" data-bs-toggle="modal" data-bs-target="#productModal{{ $key }}"><i class="bi bi-eye-fill"></i></button>
                            </div>
                            <small class="text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</small>
                        </div>
                    </div>
                </div>
                <!-- End Product Item -->
                @endforeach
            @else
                <p>Tidak ada produk yang tersedia saat ini.</p>
            @endif
        </div>
    </div>
</section>
<!-- End Product Showcase Section -->

<!-- Pagination -->
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
<!-- End Pagination -->

<!-- Product Modals -->
@if ($products && count($products) > 0)
@foreach ($products as $key => $product)
<div class="modal fade" id="productModal{{ $key }}" tabindex="-1" aria-labelledby="productModalLabel{{ $key }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel{{ $key }}">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControls{{ $key }}" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if ($product->foto1 || $product->foto2 || $product->foto3 || $product->foto4)
                            @if ($product->foto1)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/foto_produk/' . $product->foto1) }}" class="d-block w-100" alt="Product Image 1">
                            </div>
                            @endif
                            @if ($product->foto2)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/foto_produk/' . $product->foto2) }}" class="d-block w-100" alt="Product Image 2">
                            </div>
                            @endif
                            @if ($product->foto3)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/foto_produk/' . $product->foto3) }}" class="d-block w-100" alt="Product Image 3">
                            </div>
                            @endif
                            @if ($product->foto4)
                            <div class="carousel-item">
                                <img src="{{ asset('storage/foto_produk/' . $product->foto4) }}" class="d-block w-100" alt="Product Image 4">
                            </div>
                            @endif
                        @else
                            <!-- Jika produk tidak memiliki foto, gunakan foto default -->
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="Default Product Image">
                            </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{ $key }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{ $key }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif



<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function addToCart(key) {
        // Submit form untuk menambahkan produk ke keranjang
        document.getElementById("addToCartForm" + key).submit();
        // Tampilkan SweetAlert2 ketika berhasil menambahkan ke keranjang
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Produk berhasil ditambahkan ke keranjang.'
        });
    }

    // Tambahkan event listener untuk tombol tambah ke keranjang
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.btn-animate');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = button.getAttribute('data-product-id');
                const isLoggedIn = button.getAttribute('data-is-logged-in');

                if (isLoggedIn === 'false') {
                    // Jika pengguna belum masuk, tampilkan SweetAlert2 untuk login terlebih dahulu
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.'
                    });
                } else {
                    // Jika pengguna sudah masuk, tambahkan produk ke keranjang
                    addToCart(productId);
                }
            });
        });
    });
</script>




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
</body>

</html>
