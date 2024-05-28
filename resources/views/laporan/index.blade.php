@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id. Laporan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id Pengguna</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">jenis bencana</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deskripsi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">lokasi_lat</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">lokasi_lng</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                                <th class="text-secondary opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_bencana as $laporans)
                            <tr>
                                <td>{{ $laporans->id }}</td>
                                <td>{{ $laporans->id_pengguna }}</td>
                                <td>{{ $laporans->jenis_bencana }}</td>
                                <td>{{ $laporans->deskripsi }}</td>
                                <td>{{ $laporans->lokasi_lat }}</td>
                                <td>{{ $laporans->lokasi_lng }}</td>
                                <td>{{ $laporans->status }}</td>
                                <!-- <td>
                                    <form action="{{ route('pengguna.destroy', $penggunas->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">Hapus</button>
                                    </form>
                                    <form action="{{ route('pengguna.destroy', $penggunas->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td> -->
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <!-- modal edit data -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
