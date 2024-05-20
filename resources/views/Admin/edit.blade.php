@extends('layouts.master')

@section('content')
<div class="col-12">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>edit Admin</h6>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
            @if ($errors->any())
            <div class=""></div>

            @endif
            `<form action="/Admin/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Jangan lupa nama juga diisi</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Jangan lupa nama juga diisi</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input name="password" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Jangan lupa nama juga diisi</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <input name="alamat" type="text" class="form-control" id="Alamat" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Jangan lupa nama juga diisi.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telepon</label>
                    <input name="telepon" type="text" class="form-control" id="telepon" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Jangan lupa nama juga diisi</div> -->
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection