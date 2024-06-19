@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Laporan Bencana</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Bencana</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Latitude</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longitude</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-secondary opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan_bencana as $laporan)
                            <tr>
                                <td>{{ $laporan->id }}</td>
                                <td>{{ $laporan->jenis_bencana }}</td>
                                <td>{{ $laporan->deskripsi }}</td>
                                <td>{{ $laporan->latitude }}</td>
                                <td>{{ $laporan->longitude }}</td>
                                <td>{{ $laporan->status }}</td>
                                <td>
                                    <a href="{{ route('laporan_bencana.edit', $laporan->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('laporan_bencana.destroy', $laporan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $laporan->id }}">Hapus</button>
                                    </form>
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
@endsection