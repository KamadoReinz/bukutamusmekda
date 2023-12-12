@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Tamu</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                        Tambah Tamu
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
                            <div class="d-flex justify-content-between">
                                <div>
                                    <form action="" method="GET">
                                        <div class="d-flex" style="gap: 10px;">
                                            <div>
                                                <input type="date" class="form-control" name="date"
                                                    value="{{ Request::get('date') }}">
                                            </div>
                                            <div>
                                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                                            </div>
                                            <div>
                                                <a href="{{ url('petugas/tamu/list') }}"
                                                    class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tujuan</th>
                                        <th>Dibuat Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $key => $value)
                                        <tr style="text-align: center;">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>{{ $value->alamat }}</td>
                                            <td>{{ $value->tujuan }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="#edit{{ $value->id }}" data-toggle="modal"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-delete"
                                                    onclick="deleteTamu('{{ route('tamu.delete', $value->id) }}')"
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
    @include('petugas.tamu.modal')
@endsection
@push('js')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
    <script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

    <script>
        function deleteTamu(action) {
            Swal.fire({
                title: "Hapus Tamu?",
                text: "Apakah Anda Yakin Akan Menghapus Tamu Ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = action
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Tamu Berhasil Dihapus.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
@endpush
