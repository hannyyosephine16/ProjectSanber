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
            <h2 class="text-center">Obat</h2>
            <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">Tambah Data Obat</a>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <form method="GET">
                                    <div class="form-group row text-right ml-6">
                                        <label class="col-sm-11 ml-5">
                                            <input type="text" name="cari" class="from-control" style="background-color:#D1E0E0;"
                                                placeholder="Cari Data..." autofocus="true" value={{ $cari }}>
                                        </label>
                                    </div>
                                </form>
                                <thead>
                                    <th>No.</th>
                                    <th>@sortablelink('nama', 'Nama')</th>
                                    <th>Sediaan</th>
                                    <th>@sortablelink('golongan', 'Golongan Obat')</th>
                                    <th>Harga Satuan (Rp)</th>
                                    <th>Stok Obat</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor = 1 + (($obat->currentPage()-1)* $obat->perPage());
                                    @endphp
                                    @if ($obat->count() > 0)
                                        @foreach ($obat as $nomor => $hasil)
                                            <tr>
                                                <th>{{ $nomor+1 }}</th>
                                                <td>{{ $hasil->nama }}</td>
                                                <td>{{ $hasil->sediaan }}</td>
                                                <td>{{ $hasil->golongan }}</td>
                                                <td>{{ $hasil->harga }}</td>
                                                <td>{{ $hasil->jumlah }}</td>
                                                <td>
                                                    <form action="{{ route('obat.destroy', $hasil->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('obat.edit', $hasil->id) }}"
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
                            {!! $obat->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
        </div>


    </section>
    <!-- /.content -->
@endsection
