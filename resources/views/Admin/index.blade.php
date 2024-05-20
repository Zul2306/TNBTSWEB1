@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel Admin</h6>
                <a href="/Admin/create" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                                <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password
                                </th> -->
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Telepon</th>
                                <th class="text-secondary opacity-7">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)

                            <tr>
                                <td>{{ $admin->name}} </td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->alamat}}</td>
                                <td>{{$admin->telepon}}</td>
                                <td>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-primary btn-edit-admin" data-id="{{ $admin->id }}" data-name="{{ $admin->name }}" data-email="{{ $admin->email }}" data-alamat="{{ $admin->alamat }}" data-telepon="{{ $admin->telepon }}" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                    Edit
                                                </button>
                                                <form action="{{ route('admin.delete', $admin->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-delete-admin d-inline" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- tombol hapus -->
                                    <form action="{{ route('admin.delete', $admin->id) }}" method="POST">
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



                                    <!-- <a href="#" class="btn btn-danger">Delete</a> -->
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <!-- form tambah -->
                    <form action="/Admin" method="POST">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

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
                                            <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- akhir form tambah -->
                    <!-- form edit -->
                    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text" class="form-control" id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="text" class="form-control" id="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" id="alamat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input name="telepon" type="text" class="form-control" id="telepon">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- <form action="{{ route('admin.update', $admin->id) }}" method="POST">

                        @method('put')
                        @csrf
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text" class="form-control" id="name" value="{{ $admin->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="text" class="form-control" id="email" value="{{ $admin->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" value="{{ $admin->password }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" id="alamat" value="{{ $admin->alamat }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input name="telepon" type="text" class="form-control" id="telepon" value="{{ $admin->telepon }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> -->

                    <!-- akhir form edit -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.btn-edit-admin');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var adminId = button.getAttribute('data-id');
                var adminName = button.getAttribute('data-name');
                var adminEmail = button.getAttribute('data-email');
                var adminAlamat = button.getAttribute('data-alamat');
                var adminTelepon = button.getAttribute('data-telepon');

                var modal = document.getElementById('exampleModalEdit');
                modal.querySelector('#name').value = adminName;
                modal.querySelector('#email').value = adminEmail;
                modal.querySelector('#password').value = ''; // Kosongkan password untuk keamanan
                modal.querySelector('#alamat').value = adminAlamat;
                modal.querySelector('#telepon').value = adminTelepon;

                modal.querySelector('form').action = `/admin/update/${adminId}`;
            });
        });
    });
</script>
<!-- js tombol hapus -->
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.btn-delete-admin');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                var modal = document.getElementById('deleteConfirmationModal');
                var form = button.closest('form');

                modal.querySelector('.btn-danger').addEventListener('click', function() {
                    form.submit();
                });

                var modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
            });
        });
    });
</script>
@endsection