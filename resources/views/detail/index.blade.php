@extends('layouts.pages')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route("klinik.index")}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="/klinikdel/public/rekam">Rekam Medis</a></li>
                        <li class="breadcrumb-item active">Pemeriksaan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="container">
            <h2 class="text-center">Pemeriksaan</h2>
            <div class="bg-warning pb-2 pl-2 ps-2 pr-2 col-sm-6 mb-2">
                Subjective : Pernyataan atau keluhan dari pasien <br>
                Objective : Data yang diobservasi oleh perawat atau keluarga <br>
                Analisys : Kesimpulan dari objektif dan subjektif <br>
                Planning : Rencana tindakan yang akan dilakukan berdasarkan analisis
            </div>
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <form action="{{ route('detail.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="klinik_id" value="{{ $klinik_id }}">
                        <div class="mb-3 row">
                            <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-2">
                                <select class="form-select form-control" name="tipe" id="tipe">
                                    <option value="CPPT">CPPT</option>
                                    <option value="Konsul">Konsul</option>
                                    <option value="Jawaban Konsul">Jawaban Konsul</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pemeriksaan</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jam" class="col-sm-2 col-form-label">Jam Pemeriksaan</label>
                            <div class="col-sm-2">
                                <input type="time" class="form-control" name="jam" id="jam">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="subjective" class="col-sm-2 col-form-label">Subjective</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subjective"
                                       id="subjective">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="objective" class="col-sm-2 col-form-label">Objective</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="objective" id="objective">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="assessment" class="col-sm-2 col-form-label">Assessment</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="assessment"
                                       id="assessment">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="planning" class="col-sm-2 col-form-label">Planing</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="planning" id="planning">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="instruksi" class="col-sm-2 col-form-label">Instruksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="instruksi" id="instruksi">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="obat" class="col-sm-2 col-form-label">Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="obat" id="obat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-2">
                                <select class="form-select form-control" name="role" id="role">
                                    <option value="Dokter">Dokter</option>
                                    <option value="Perawat">Perawat</option>
                                    <option value="Bidan">Bidan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mb-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>S</th>
                        <th>O</th>
                        <th>A</th>
                        <th>P</th>
                        <th>I</th>
                        <th>obat</th>
                        <th>Role</th>
                        </thead>
                        <tbody>
                        @if($detail->count() > 0)
                            @foreach($detail as $hasil)
                                <tr>
                                    <td>{{ $hasil->tipe }}</td>
                                    <td>{{ $hasil->tanggal }}</td>
                                    <td>{{ $hasil->jam }}</td>
                                    <td>{{ $hasil->subjective }}</td>
                                    <td>{{ $hasil->objective }}</td>
                                    <td>{{ $hasil->assessment }}</td>
                                    <td>{{ $hasil->planning }}</td>
                                    <td>{{ $hasil->instruksi }}</td>
                                    <td>{{ $hasil->obat }}</td>
                                    <td>{{ $hasil->role }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada Data!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
