@include('includes.header')
@include('includes.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Judul</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <style>
        body {
            background-color: #fff;
            color: #222;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #222;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .card-header {
            background-color: #e9ecef;
            border-color: #ced4da;
            color: #222;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        img:hover {
            transform: scale(1.1);
        }

        .modal-dialog {
            max-width: 600px;
        }

        .modal-dialog-centered {
            margin: auto;
        }

        .modal-content {
            background-color: #f8f9fa;
            color: #222;
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-title {
            color: #222;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-body form .form-group {
            margin-bottom: 1.5rem;
        }

        .modal-body form .form-group img {
            margin-top: 0.5rem;
            display: block;
        }

        .modal-body input,
        .modal-body textarea {
            background-color: #f8f9fa;
            color: #222;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .modal-body input:focus,
        .modal-body textarea:focus {
            outline: none;
            border-color: #888;
        }

        .table {
            background-color: #f8f9fa;
            color: #222;
            border-radius: 15px;
        }

        .table th,
        .table td {
            border-color: #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
        }

        .modal-footer .btn-primary {
            width: 100%;
            background-color: #007bff;
        }
    </style>


</head>

<body>
    <div class="container py-5">
        <div class="card">
            <h1 class="card-header text-center">Daftar Judul</h1>
            <div class="card-body">
                @if ($juduls->count() < 3)
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahJudulModal">Tambah Judul Baru</button>
                @endif
                <div class="table-responsive">
                    <table class="table table-light table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($juduls as $judul)
                            <tr>
                                <td>{{ $judul->judul }}</td>
                                <td>{{ $judul->keterangan }}</td>
                                <td>
                                    <img src="{{ asset(str_replace('public', 'storage', $judul->foto)) }}" alt="{{ $judul->judul }}" width="100">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailJudulModal">
                                        Lihat
                                    </button>
                                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editJudulModal{{$judul->id}}">Edit</button>
                                    @if($juduls->count() > 1)
                                    <form id="deleteForm" action="{{ route('admin.judul.destroy', $judul->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Hapus</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal for Edit Judul -->
                            <div class="modal fade" id="editJudulModal{{$judul->id}}" tabindex="-1" aria-labelledby="editJudulModalLabel{{$judul->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editJudulModalLabel{{$judul->id}}">Edit Judul</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Edit form content -->
                                            <form action="{{ route('admin.judul.update', $judul->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="judul{{$judul->id}}">Judul:</label>
                                                    <input type="text" class="form-control" id="judul{{$judul->id}}" name="judul" value="{{ $judul->judul }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan{{$judul->id}}">Keterangan:</label>
                                                    <textarea class="form-control" id="keterangan{{$judul->id}}" name="keterangan">{{ $judul->keterangan }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto{{$judul->id}}">Foto:</label>
                                                    <input type="file" class="form-control-file" id="foto{{$judul->id}}" name="foto">
                                                    <img src="{{ asset(str_replace('public', 'storage', $judul->foto)) }}" alt="{{ $judul->judul }}" width="100">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Tambah Judul Baru -->
    <div class="modal fade" id="tambahJudulModal" tabindex="-1" aria-labelledby="tambahJudulModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJudulModalLabel">Tambah Judul Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form content for adding a new title -->
                    <form action="{{ route('admin.judul.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan:</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  lihat -->
    <div class="modal fade" id="detailJudulModal" tabindex="-1" aria-labelledby="detailJudulModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-light text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailJudulModalLabel">Detail Judul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Judul: {{ $judul->judul }}</p>
                    <p>Keterangan: {{ $judul->keterangan }}</p>
                    <p>Foto:</p>
                    <img src="{{ asset(str_replace('public', 'storage', $judul->foto)) }}" alt="{{ $judul->judul }}" class="img-fluid" style="max-width: 200px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Include SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

    @include('includes.footer')
    @include('includes.scripts')
    
