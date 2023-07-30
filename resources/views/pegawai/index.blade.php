@extends('layouts.pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="container">
            <h2 class="text-center">Data Pegawai</h2>
            <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        <table class="table table-striped">
                            </tbody>
                            @if ($pegawai->count() > 0)
                                @foreach ($pegawai as $hasil)
                                    <tr>
                                        <div
                                            class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                            <div class="card bg-light d-flex flex-fill">
                                                <div class="card-header text-muted border-bottom-0">
                                                    {{ $hasil->propesi }}
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2 class="lead"><b>{{ $hasil->nama }}</b></h2>
                                                            <ul class="ml-4 mb-4 fa-ul text-muted">
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-lg fa-building"></i></span>
                                                                    Alamat:
                                                                    {{ $hasil->alamat }}</li>
                                                                <li class="small"><span class="fa-li"><i
                                                                            class="fas fa-lg fa-phone"></i></span>
                                                                    Telepon :
                                                                    {{ $hasil->telepon }}
                                                                </li>
                                                            </ul>
                                                            <p class="text-muted text-sm"><b>Hari Kerja: </b>
                                                                {{ $hasil->hari }} <br> <b>Jam Kerja: </b>
                                                                {{ $hasil->jam }}</p>
                                                        </div>
                                                        <div class="col-5 text-center">
                                                            <img src="{{ asset( $hasil->foto )}}"
                                                                 alt="user-avatar"
                                                                 class="img-circle img-fluid" height="100px">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="card-footer">
                                                    <div class="text-right">
                                                        <a href="#" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-user"></i> View Profile
                                                        </a>
                                                    </div>
                                                </div> --}}
                                            </div>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada Data!</td>
                                </tr>
                        @endif
                    </div>
                    </tbody>
                    </table>
                </div>
                <div style="margin: 25px;
                        width: 350px;">
                    {{ $pegawai->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        </div>
        <!-- /.card -->
@endsection
