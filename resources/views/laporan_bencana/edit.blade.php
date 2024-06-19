@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Edit Admin</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            @if ($errors->any())
            <div class=""></div>
            @endif
            <form action="{{ route('laporan_bencana.update', $laporan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="jenis_bencana" class="form-label">Jenis Bencana</label>
                    <select name="jenis_bencana" class="form-control" id="jenis_bencana">
                        <option value="banjir" {{ $laporan->jenis_bencana == 'banjir' ? 'selected' : '' }}>Banjir</option>
                        <option value="longsor" {{ $laporan->jenis_bencana == 'longsor' ? 'selected' : '' }}>Longsor</option>
                        <option value="erupsi" {{ $laporan->jenis_bencana == 'erupsi' ? 'selected' : '' }}>Erupsi</option>
                        <option value="lahar panas" {{ $laporan->jenis_bencana == 'lahar panas' ? 'selected' : '' }}>Lahar Panas</option>
                        <!-- Tambahkan opsi lainnya sesuai dengan jenis bencana yang ada -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{ $laporan->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input name="latitude" type="text" class="form-control" id="latitude" value="{{ $laporan->latitude }}">
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input name="longitude" type="text" class="form-control" id="longitude" value="{{ $laporan->longitude }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="dalam_proses" {{ $laporan->status == 'dalam_proses' ? 'selected' : '' }}>Dalam Proses</option>
                        <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $laporan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
