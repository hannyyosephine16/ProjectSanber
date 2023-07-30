@extends('layouts.pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container">
            <h2 class="text-center">Pendaftaran Pasien</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('klinik.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label ml-5">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-2 col-form-label ml-5">NIK</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nik" id="nik">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgllahir" class="col-sm-2 col-form-label ml-5">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="tgllahir" id="tgllahir">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telepon" class="col-sm-2 col-form-label ml-5">Telepon</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="telepon" id="telepon">
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
                                           placeholder="Cari Nama atau NIK" autofocus="true" value={{ $cari }}>
                                </label>
                            </div>
                        </form>
                        <thead>
                        <th>Nomor</th>
                        <th>@sortablelink('nama', 'Nama')</th>
                        <th>NIK</th>
                        <th>@sortablelink('tgllahir', 'Tanggal Lahir')</th>
                        <th>Telepon</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @php
                            $nomor = 1 + (($klinik->currentPage()-1)* $klinik->perPage());
                        @endphp
                        @if ($klinik->count() > 0)
                            @foreach ($klinik as $hasil)
                                <tr>
                                    <th>{{ $nomor++ }}</th>
                                    <td>{{ $hasil->nama }}</td>
                                    <td>{{ $hasil->nik }}</td>
                                    <td>{{ date('j F Y', strtotime($hasil->tgllahir)) }}</td>
                                    <td>{{ $hasil->telepon }}</td>
                                    <td>
                                        <form action="{{ route('klinik.destroy', $hasil->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('klinik.edit', $hasil->id) }}"
                                               class="btn btn-success btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
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
                <div style="margin: 25px;
                        width: 350px;">
                    {{-- {{ $klinik->links() }} --}}
                    {!! $klinik->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
