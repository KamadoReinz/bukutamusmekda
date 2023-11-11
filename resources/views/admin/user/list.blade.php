@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Management</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                        Tambah User
                    </button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        {{-- <th>Dibuat Tanggal</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $key => $value)
                                        <tr style="text-align: center;">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td> --}}
                                            <td>
                                                <a href="#edit{{ $value->id }}" data-toggle="modal"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-delete"
                                                    onclick="deleteUser('{{ route('user.delete', $value->id) }}')"
                                                    id="delete"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('admin.user.modal')
@endsection
@push('js')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
    <script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

    <script>
        function deleteUser(action) {
            Swal.fire({
                title: "Hapus User?",
                text: "Apakah Anda Yakin Akan Menghapus User Ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=action
                    Swal.fire({
                        title: "Berhasil!",
                        text: "User Berhasil Dihapus.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
@endpush
