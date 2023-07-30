@extends('layouts.pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                        <li class="breadcrumb-item active">Rekam Medis</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-body mt-3">
                    <form method="GET">
                        <div class="form-group row">
                            <label class="col-sm-12">
                                <input type="text" name="cari" class="from-control col-sm-12" style="background-color:#D1E0E0;"
                                       placeholder="Cari Nama atau NIK" autofocus="true" value={{ $cari }}>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
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
                                        <form action="{{ route('viewDetail') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $hasil->id }}">
                                            <button class="btn btn-info btn-sm" type="submit">View</button>
                                        </form>
                                        {{-- <a href="{{ route('detail.index' , $hasil->id) }}" title="Detail">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}
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
