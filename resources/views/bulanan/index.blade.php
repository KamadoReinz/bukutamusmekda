@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Data Tamu Bulanan</h1>
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
                                        <th>Bulan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($bulananTamu as $item)
                                <tr style="text-align: center;">
                                    <td>{{ \Carbon\Carbon::parse('01-'.$item->new_date)->isoFormat('MMMM Y') }}</td>
                                    <td>
                                        <a href="{{ route('bulanan.show', $item->new_date) }}" class="btn btn-warning" style="font-weight: bold; color: rgb(0, 0, 0)">Detail</a>
                                        <a href="{{ route('bulanan.cetak', $item->new_date) }}" class="btn btn-success" style="font-weight: bold; color: rgb(0, 0, 0)"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center fs-5">Belum ada Data</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
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
