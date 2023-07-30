@extends('layouts.pages')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Data Pasien</a></li>
                        <li class="breadcrumb-item active">Edit Data Pasien</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="container">
            <h4 class="text-center">Form Edit Data Pasien</h4>
            <a href="{{ route('klinik.index') }}" class="btn btn-primary mb-3">Data Pasien</a>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('klinik.update', $klinik->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama"
                                   value="{{ $klinik->nama }}" id="nama">
                        </div>
                        <div>
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik"
                                   value="{{ $klinik->nik }}" id="nik">
                        </div>
                        <div>
                            <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tgllahir"
                                   value="{{ $klinik->tgllahir }}" id="tgllahir">
                        </div>
                        <div>
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon"
                                   value="{{ $klinik->telepon }}" id="Keluhan">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
