@include('includes.header')
@include('includes.navbar')

<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Tentang Kami</h2>
    <div class="d-flex justify-content-center mb-3">
        @if ($tentang_kami->count() < 1)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Tentang Kami
        </button>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th>Pelanggan</th>
                    <th>Project</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through your data and display each item -->
                @foreach ($tentang_kami as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        @if ($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="img-fluid" style="max-width: 100px;">
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $item->pelanggan }}</td>
                    <td>{{ $item->project }}</td>
                    <td>
                        <!-- Button trigger edit modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{$item->id}}">
                            Edit
                        </button>
                        @if ($tentang_kami->count() < 1)
                        <!-- Delete form -->
                        <form action="{{ route('tentangkami.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tentang Kami Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tentangkami.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="pelanggan">Pelanggan:</label>
                        <input type="text" class="form-control" id="pelanggan" name="pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="project">Project:</label>
                        <input type="text" class="form-control" id="project" name="project">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($tentang_kami as $item)
<div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$item->id}}">Edit Tentang Kami</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tentangkami.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $item->judul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $item->keterangan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="pelanggan">Pelanggan:</label>
                        <input type="text" class="form-control" id="pelanggan" name="pelanggan" value="{{ $item->pelanggan }}">
                    </div>
                    <div class="form-group">
                        <label for="project">Project:</label>
                        <input type="text" class="form-control" id="project" name="project" value="{{ $item->project }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@include('includes.footer')
@include('includes.scripts')
