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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Tamu</h3>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                
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
@endsection
