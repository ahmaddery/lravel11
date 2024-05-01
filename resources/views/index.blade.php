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
<!-- Custom CSS for Spinner -->
<style>
    .spinner {
        /* Optional: Add background color or gradient */
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        border-radius: 10px;
        padding: 20px;
    }

    .sk-cube-grid {
        width: 50px;
        height: 50px;
    }

    .sk-cube {
        width: 33%;
        height: 33%;
        background-color: #fff; /* Change the color */
        float: left;
        animation: sk-cube-grid-animation 1.3s infinite ease-in-out; /* Change the animation speed */
    }

    @keyframes sk-cube-grid-animation {
        33% {
            transform: scale(1);
        }
        66% {
            transform: scale(0.5);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
<!-- SpinKit CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.min.css">
    
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>
</div>
<!-- Spinner End -->






    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5">
        <div class="row gx-4 d-none d-lg-flex">
            <div class="col-lg-6 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-map-marker-alt text-white"></small>
                    </div>
                    @foreach($informasis as $informasi)
                    <small>{{ $informasi->lokasi }}</small>
                    
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-envelope-open text-white"></small>
                    </div>
                    <small>{{ $informasi->email }}</small>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="fa fa-phone-alt text-white"></small>
                    </div>
                    <small>{{ $informasi->telepon }}</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <div class="btn-sm-square rounded-circle bg-primary me-2">
                        <small class="far fa-clock text-white"></small>
                    </div>
                    <small>{{ $informasi->waktukerja }}</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
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
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#service" class="nav-item nav-link">Service</a>
                <a href="#project" class="nav-item nav-link">Project</a>
                <!-- <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="feature.html" class="dropdown-item">Feature</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>  -->
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


<!-- Carousel Start -->
<div id="home"class="container-fluid p-0 pb-5">
    <div class="owl-carousel header-carousel position-relative">
        @foreach($juduls as $judul)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset(str_replace('public', 'storage', $judul->foto)) }}" alt="{{ $judul->judul }}">
            <div class="carousel-inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 text-center">
                            <h1 class="display-3 text-white animated slideInDown mb-4">{{ $judul->judul }}</h1>
                            <p class="fs-5 text-white mb-4 pb-2">{{ $judul->keterangan }}</p>
                            @if(auth()->check())
                                @if(auth()->user()->usertype == 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Dashboard</a>
                                    <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Hubungi Kami</a>
                                @endif
                            @else
                                <a href="{{ route('register') }}" class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">Registrasi</a>
                                <a href="{{ route('login') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->



<!-- Fakta Mulai -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="h-100 bg-dark p-4 p-xl-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                            <i class="fas fa-home fa-3x text-white"></i>
                        </div>
                        <h1 class="display-1 mb-0" style="color: #000000;">01</h1>
                    </div>
                    <h5 class="text-white">Keamanan Rumah</h5>
                    <hr class="w-25">
                    <span>Lindungi rumah Anda dengan sistem keamanan CCTV yang canggih dan andal.</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="h-100 bg-dark p-4 p-xl-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                            <i class="fas fa-lock fa-3x text-white"></i>
                        </div>
                        <h1 class="display-1 mb-0" style="color: #000000;">02</h1>
                    </div>
                    <h5 class="text-white">Kontrol Akses</h5>
                    <hr class="w-25">
                    <span>Pantau dan kontrol siapa yang masuk ke area terlarang dengan sistem kontrol akses CCTV kami.</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 bg-dark p-4 p-xl-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="btn-square rounded-circle" style="width: 64px; height: 64px; background: #000000;">
                            <i class="fas fa-headphones fa-3x text-white"></i>
                        </div>
                        <h1 class="display-1 mb-0" style="color: #000000;">03</h1>
                    </div>
                    <h5 class="text-white">Dukungan 24/7</h5>
                    <hr class="w-25">
                    <span>Dapatkan dukungan teknis yang andal 24 jam sehari, 7 hari seminggu untuk sistem CCTV Anda.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fakta Mulai -->




<!-- About Start -->
<div id="about" class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/about.jpg') }}" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-4">Tentang Kami</h1>
                    <p class="mb-4 pb-2">Kami adalah penyedia solusi keamanan CCTV terkemuka dengan layanan berkualitas dan solusi terpercaya. Kami hadir untuk memberikan perlindungan maksimal bagi rumah dan bisnis Anda.</p>
                    <div class="row g-4 mb-4 pb-3">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-users fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="fw-medium text-primary mb-0">Pelanggan Puas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-tasks fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                    <p class="fw-medium text-primary mb-0">Proyek Selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Jelajahi Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->




   <!-- Service Start -->
<div id="service" class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Layanan Kami</h1>
        </div>
        <div class="row g-0 service-row">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="service-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <i class="fas fa-building fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Sistem CCTV Komersial</h4>
                    <p class="mb-4">Memiliki sistem keamanan CCTV yang handal untuk bisnis Anda.</p>
                    <a class="btn" href=""><i class="fas fa-arrow-right text-white me-3"></i>Baca Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="service-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <i class="fas fa-fingerprint fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Akses Sidik Jari</h4>
                    <p class="mb-4">Solusi akses yang aman dengan menggunakan teknologi sidik jari.</p>
                    <a class="btn" href=""><i class="fas fa-arrow-right text-white me-3"></i>Baca Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="service-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <i class="fas fa-fire fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Deteksi Api dan Keamanan</h4>
                    <p class="mb-4">Mendeteksi kebakaran secara dini dan memastikan keamanan di sekitar.</p>
                    <a class="btn" href=""><i class="fas fa-arrow-right text-white me-3"></i>Baca Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="service-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <i class="fas fa-home fa-3x text-primary"></i>
                    </div>
                    <h4 class="mb-3">Keamanan Rumah Cerdas</h4>
                    <p class="mb-4">Sistem keamanan cerdas untuk melindungi rumah dan keluarga Anda.</p>
                    <a class="btn" href=""><i class="fas fa-arrow-right text-white me-3"></i>Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


   <!-- Feature Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 ps-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-5">Mengapa Memilih Kami</h1>
                    <p class="mb-4 pb-2">Kami adalah pilihan utama Anda untuk solusi keamanan CCTV. Berikut adalah alasan mengapa kami menjadi pilihan terbaik:</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-lock fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Terpercaya</p>
                                    <h5 class="mb-0">Keamanan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-clipboard-check fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Kualitas</p>
                                    <h5 class="mb-0">Layanan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-cogs fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Sistem</p>
                                    <h5 class="mb-0">Cerdas</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fas fa-headset fa-3x text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Dukungan</p>
                                    <h5 class="mb-0">24/7</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/feature.jpg') }}" style="object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->



  <!-- Projects Start -->
<div id="project" class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Proyek Kami</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">Semua</li>
                    <li class="mx-2" data-filter=".first">Proyek Selesai</li>
                    <li class="mx-2" data-filter=".second">Proyek Berlangsung</li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-1.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">Keamanan Bisnis</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">Keamanan Bisnis</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-2.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">Deteksi Api</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">Deteksi Api</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-3.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">Kontrol Akses</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">Kontrol Akses</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-4.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">Sistem Alarm</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">Sistem Alarm</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-5.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">CCTV & Video</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">CCTV & Video</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/portfolio-6.jpg') }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2">Rumah Cerdas</p>
                        <h5 class="lh-base mb-0">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2">Rumah Cerdas</p>
                        <h5 class="lh-base mb-3">Sistem Keamanan CCTV Cerdas yang Sesuai dengan Bisnis Anda</h5>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->


<!-- Kutipan Dimulai -->
<div id="contact" class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container quote px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('assets/img/quote.jpg') }}" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 quote-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-5">Kutipan Gratis</h1>
                    <p class="mb-4 pb-2">Sementara itu, berada di tengah-tengah kegelapan, ada seberkas cahaya. Itulah bagaimana kita menemukan jalan kita sendiri. Cahaya tersebut membimbing kita melalui kegelapan dan memberi kita harapan akan masa depan yang lebih baik.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Nama Anda" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Email Anda" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Nomor Telepon Anda" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;">
                                    <option selected>Pilih Layanan</option>
                                    <option value="1">Layanan 1</option>
                                    <option value="2">Layanan 2</option>
                                    <option value="3">Layanan 3</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Catatan Khusus"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Dapatkan Kutipan Gratis</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kutipan Selesai -->


    <!-- Team Start
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="overflow-hidden position-relative">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Full Name</h5>
                            <span class="text-primary">Designation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   Team End -->


    <!-- Testimonial Start
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-5">Testimonial</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-1.jpg' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-2.jpg' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='img/testimonial-3.jpg' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h4>Client Name</h4>
                    <span class="text-primary">Profession</span>
                </div>
            </div>
        </div>
    </div>
Testimonial End -->


   <!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                @foreach($informasis as $informasi)
                <h5 class="text-light mb-4">Alamat</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $informasi->lokasi }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $informasi->telepon }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $informasi->email }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Layanan</h5>
                <a class="btn btn-link" href="">Keamanan Bisnis</a>
                <a class="btn btn-link" href="">Deteksi Kebakaran</a>
                <a class="btn btn-link" href="">Sistem Alarm</a>
                <a class="btn btn-link" href="">CCTV & Video</a>
                <a class="btn btn-link" href="">Rumah Pintar</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Tautan Cepat</h5>
                <a class="btn btn-link" href="">Tentang Kami</a>
                <a class="btn btn-link" href="">Hubungi Kami</a>
                <a class="btn btn-link" href="">Layanan Kami</a>
                <a class="btn btn-link" href="">Syarat & Ketentuan</a>
                <a class="btn btn-link" href="">Dukungan</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Berita</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Email Anda">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Daftar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->



    <!-- Copyright Start -->
    <div class="container-fluid py-4" style="background: #000000;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    @foreach($informasis as $informasi)
                    &copy; <a class="border-bottom" href="#">{{ $informasi->namapt }}</a>, All Right Reserved.
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Copyright End -->


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