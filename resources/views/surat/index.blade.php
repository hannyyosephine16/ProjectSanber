@extends('layouts.pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Surat Sakit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="container">
            <h2 class="text-center">Surat Sakit Pasien</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('surat.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nosurat" class="col-sm-2 col-form-label ml-5">Nomor Surat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nosurat" id="nosurat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label ml-5">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tempatlahir" class="col-sm-2 col-form-label ml-5">Tempat Lahir</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="tempatlahir" id="tempatlahir">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgllahir" class="col-sm-2 col-form-label ml-5">Tanggal Lahir</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tgllahir" id="tgllahir">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-2 col-form-label ml-5">Jenis Kelamin</label>
                            <div class="col-sm-2">
                                <select class="form-select form-control" name="jenis" id="jenis">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="agama" class="col-sm-2 col-form-label ml-5">Agama</label>
                            <div class="col-sm-2">
                                <select class="form-select form-control" name="agama" id="agama">
                                    <option value="Protestan">Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="pekerjaan" class="col-sm-2 col-form-label ml-5">Pekerjaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="pekerjaan"
                                       id="pekerjaan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label ml-5">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="alamat"
                                       id="alamat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-2 col-form-label ml-5">Tanggal</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tanggal"
                                       id="tanggal">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="diagnosa" class="col-sm-2 col-form-label ml-5">Diagnosa</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="diagnosa"
                                       id="diagnosa">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="mulai" class="col-sm-2 col-form-label ml-5">Mulai Istirahat</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="mulai"
                                       id="mulai">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="akhir" class="col-sm-2 col-form-label ml-5">Akhir Istirahat</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="akhir"
                                       id="akhir">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggalsurat" class="col-sm-2 col-form-label ml-5">Tanggal Surat</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tanggalsurat"
                                       id="tanggalsurat">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mr-5">Daftar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <form method="GET">
                            <div class="form-group row text-right ml-5">
                                <label class="col-sm-11 ml-5">
                                    <input type="text" name="cari" class="from-control" style="background-color:#D1E0E0;"
                                           placeholder="Tanggal / Nama / Diagnosa" autofocus="true" value={{ $cari }}>
                                </label>
                            </div>
                        </form>
                        <thead>
                        <th>No</th>
                        <th>@sortablelink('tanggal', 'Tanggal')</th>
                        <th>@sortablelink('nama', 'Nama')</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>@sortablelink('diagnosa', 'Diagnosa')</th>
                        <th>Aksi</th>
                        </thead>
                        <tbody>
                        @php
                            $no = 1 + (($surat->currentPage()-1)* $surat->perPage());
                        @endphp
                        @if ($surat->count() > 0)
                            @foreach ($surat as $hasil)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ date('j F Y', strtotime($hasil->tanggalsurat)) }}</td>
                                    <td>{{ $hasil->nama }}</td>
                                    <td>{{ $hasil->tempatlahir }}</td>
                                    <td>{{ date('j F Y', strtotime($hasil->tgllahir)) }}</td>
                                    <td>{{ $hasil->diagnosa }}</td>
                                    <td>
                                        <a href="{{ route('surat.show' , $hasil->id) }}" title="Detail"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada Data!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
