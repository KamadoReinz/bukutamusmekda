@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Tamu Bulan : {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM ') }}</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal & Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['getRecord'] as $key => $value)
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
                                {!! $data['getRecord']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
