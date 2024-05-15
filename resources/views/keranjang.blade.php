<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Solusi CCTV Rumah </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">


</head>
<style>
body{
	background: #ddb5b5;
}
.cart{
	margin: 20px 0;
	background-color: #F6F5FA;;
	padding: 60px 0;
}
.total-price{
	padding-bottom: 15px;
}
.cart-item{
	background-color: #fff;
	border-radius: 10px;
	padding: 15px 20px;
	margin-bottom: 20px;
}
.center-item{
    display: flex;
    align-items: center;
    justify-content: flex-start;
}
.cart-item img{
	width: 115px;
}
.cart-item h5{
    padding: 0 45px;
}
.cart-item .remove-item{
	width: 25px!important;
}
.btn-default{
	background-color: #fff;
}
.cart-item .form-control{
	background-color: #F6F5FA;
	border: none;
    width: 65px;
    border-radius: 10px!important;
    font-weight: 700;
    font-size: 20px;
}
.input-group{
	width: unset;
	flex-wrap: nowrap;
}
.status{
	text-align: right;
}
.check-out{
    float: right;
    padding: 10px 30px;
	font-size: 19px;
	background-color: #2FBE70;
	border: none;
}
</style>
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

    
    <section>
        <div class="container">
            <h2 class="px-5 p-2">Keranjang Belanja</h2>
            <div class="cart">
                <div class="col-md-12 col-lg-10 mx-auto">
                    @if ($keranjang->isEmpty())
                        <div class="text-center">
                            <p class="text-muted">Keranjang Anda kosong.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Mulai Belanja Sekarang</a>
                        </div>
                    @else
                        @foreach ($keranjang as $item)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-7 center-item">
                                        <img src="{{ $item->product->foto ? asset('storage/foto_produk/'.$item->product->foto) : 'https://via.placeholder.com/150' }}" alt="{{ $item->product->nama_product }}">
                                        <h5>{{ $item->product->nama_product }} ( Rp {{ number_format($item->product->harga, 0, ',', '.') }} )</h5>
                                    </div>
    
                                    <div class="col-md-5 center-item">
                                        <form action="{{ route('keranjang.update', ['id' => $item->id]) }}" method="POST" class="form-inline">
                                            @csrf
                                            @method('PUT')
                                            <input id="phone-number" type="number" name="quantity" min="0" class="form-control text-center" value="{{ $item->quantity }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-primary">Perbarui</button>
                                            </div>
                                        </form>
                                        <h5>Rp <span id="phone-total">{{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</span> </h5>
                                        <button class="remove-item-btn btn btn-outline-danger" data-id="{{ $item->id }}">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
    
                        <div class="cart-item">
                            <div class="row g-2">
                                <div class="col-6">
                                    <h5>Subtotal: </h5>
                                    <h5>Tax:</h5>
                                    <h5>Total:</h5>
                                </div>
                                <div class="col-6 status">
                                    <h5>Rp <span id="sub-total">{{ number_format($totalHarga, 0, ',', '.') }}</span></h5>
                                    <h5>Rp <span id="tax-amount">0</span></h5>
                                    <h5>Rp <span id="total-price">{{ number_format($totalHarga, 0, ',', '.') }}</span></h5>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-12 pt-4 pb-4">
                            <button type="button" class="btn btn-success check-out">Pembayaran Sekarang</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Tambahkan event listener untuk setiap tombol hapus
        const removeButtons = document.querySelectorAll('.remove-item-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengkonfirmasi penghapusan, kirimkan form penghapusan
                        const form = document.createElement('form');
                        form.setAttribute('method', 'POST');
                        form.setAttribute('action', '{{ route("keranjang.hapus", ["id" => ":id"]) }}'.replace(':id', itemId));
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        form.innerHTML = `<input type="hidden" name="_token" value="${csrfToken}"> <input type="hidden" name="_method" value="DELETE">`;
                        document.body.appendChild(form);
                        form.submit();
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
