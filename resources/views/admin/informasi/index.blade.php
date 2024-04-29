@include('includes.header')
@include('includes.navbar')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Informasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya khusus untuk responsivitas tabel */
        @media (max-width: 767px) {
            /* Atur tabel menjadi blok */
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            /* Atur tata letak untuk data spesifik */
            td[data-label] {
                padding-left: 40%; /* Sesuaikan jarak kiri agar sesuai dengan label */
                position: relative;
                margin-bottom: 10px; /* Tambahkan jarak vertikal antara baris */
            }

            td[data-label]:before {
                position: absolute;
                left: 5px; /* Sesuaikan jarak kiri */
                top: 0;
                content: attr(data-label);
                font-weight: bold;
            }

            /* Sembunyikan label di header */
            th {
                display: none;
            }
        }

        /* Gaya khusus untuk modal */
        .modal-content {
            background-color: #f8f9fa; /* Warna latar belakang modal mode terang */
            color: black; /* Warna teks modal mode terang */
        }

        .modal-header {
            border-bottom: none; /* Hilangkan border bawah pada header modal */
        }

        .modal-body {
            border-bottom: none; /* Hilangkan border bawah pada body modal */
        }

        .modal-footer {
            border-top: none; /* Hilangkan border atas pada footer modal */
        }

        /* Gaya khusus untuk form */
        .dark-mode .form-control {
            background-color: #343a40; /* Warna latar belakang form mode gelap */
            color: white; /* Warna teks form mode gelap */
            border: 1px solid #6c757d; /* Warna border form mode gelap */
        }

        .light-mode .form-control {
            background-color: white; /* Warna latar belakang form mode terang */
            color: black; /* Warna teks form mode terang */
            border: 1px solid black; /* Warna border form mode terang */
        }
    </style>
</head>

<body class="bg-light text-dark">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="container">
                        <h1 class="mb-4 text-center">Daftar Informasi</h1>
                        @if ($informasis->count() < 1)
                        <button type="button" class="btn btn-primary mb-3 d-block mx-auto text-center" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Informasi</button>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-light table-striped">
                                <thead style="display:none;">
                                    <tr>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telepon</th>
                                        <th scope="col">Waktu Kerja</th>
                                        <th scope="col">Nama PT</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($informasis as $informasi)
                                    <tr>
                                        <td data-label="Lokasi">{{ $informasi->lokasi }}</td>
                                        <td data-label="Email">{{ $informasi->email }}</td>
                                        <td data-label="Telepon">{{ $informasi->telepon }}</td>
                                        <td data-label="Waktu Kerja">{{ $informasi->waktukerja }}</td>
                                        <td data-label="Nama PT">{{ $informasi->namapt }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $informasi->id }}">Edit</button>
                                                @if ($informasis->count() < 1)
                                                <form action="{{ route('admin.informasi.destroy', $informasi->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Informasi -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Keterangan -->
                        <p>Masukkan informasi baru di bawah ini:</p>
                        <!-- Form untuk menambahkan informasi -->
                        <form id="infoForm" action="{{ route('admin.informasi.store') }}" method="POST" class="light-mode">
                            @csrf
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}">
                            </div>
                            <div class="form-group">
                                <label for="waktukerja">Waktu Kerja</label>
                                <input type="text" class="form-control" id="waktukerja" name="waktukerja" value="{{ old('waktukerja') }}">
                            </div>
                            <div class="form-group">
                                <label for="namapt">Nama PT</label>
                                <input type="text" class="form-control" id="namapt" name="namapt" value="{{ old('namapt') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Informasi -->
        @foreach($informasis as $informasi)
        <div class="modal fade" id="editModal{{ $informasi->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $informasi->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $informasi->id }}">Edit Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control light-mode" id="lokasi" name="lokasi" value="{{ old('lokasi', $informasi->lokasi) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control light-mode" id="email" name="email" value="{{ old('email', $informasi->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control light-mode" id="telepon" name="telepon" value="{{ old('telepon', $informasi->telepon) }}">
                            </div>
                            <div class="form-group">
                                <label for="waktukerja">Waktu Kerja</label>
                                <input type="text" class="form-control light-mode" id="waktukerja" name="waktukerja" value="{{ old('waktukerja', $informasi->waktukerja) }}">
                            </div>
                            <div class="form-group">
                                <label for="namapt">Nama PT</label>
                                <input type="text" class="form-control light-mode" id="namapt" name="namapt" value="{{ old('namapt', $informasi->namapt) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mendeteksi peristiwa klik pada form
        document.querySelectorAll(".form-control").forEach(function(elem) {
            elem.addEventListener("focus", function() {
                // Mendapatkan elemen form
                var forms = document.querySelectorAll(".form-control");
                // Iterasi semua elemen form
                forms.forEach(function(form) {
                    // Toggle kelas CSS antara dark-mode dan light-mode
                    form.classList.remove("dark-mode");
                    form.classList.add("light-mode");
                });
                // Toggle kelas CSS antara dark-mode dan light-mode
                this.classList.remove("light-mode");
                this.classList.add("dark-mode");
            });
        });
    </script>
</body>

</html>
@include('includes.footer')
@include('includes.scripts')
