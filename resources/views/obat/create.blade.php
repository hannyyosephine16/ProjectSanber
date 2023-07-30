<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('template/') }}/dist/img/del.png">
    <title>Healthy Del</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/klinikdel/public/klinik" class="brand-link">
                <img src="{{ asset('template/') }}/dist/img/del.png" alt="Healthy Del"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Healthy Del</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/klinikdel/public/klinik" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/klinikdel/public/pegawai" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data Pegawai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/klinikdel/public/rekam" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Rekam Medis
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/klinikdel/public/obat" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Data Obat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/klinikdel/public/surat" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Surat Sakit
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <li class="breadcrumb-item"><a href="/klinikdel/public/klinik">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="container">
                    <h2 class="text-center">Tambah Data Obat</h2>
                    <a href="{{ 'obat.index' }}" class="btn btn-primary mb-3">Data Obat</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('obat.store') }}" method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label ml-5">Nama Obat</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="nama" id="nama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="sediaan" class="col-sm-2 col-form-label ml-5">Sediaan</label>
                                    <div class="col-sm-2">
                                        <select class="form-select form-control" name="sediaan" id="sediaan">
                                            <option value="Tablet">Tablet</option>
                                            <option value="Sirup">Sirup</option>
                                            <option value="Kapsul">Kapsul</option>
                                            <option value="Pil">Pil</option>
                                            <option value="Kaplet">Kaplet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="golongan" class="col-sm-2 col-form-label ml-5">Golongan Obat</label>
                                    <div class="col-sm-2">
                                        <select class="form-select form-control" name="golongan" id="golongan">
                                            <option value="Obat Bebas">Obat Bebas</option>
                                            <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                                            <option value="Obat Keras">Obat Keras</option>
                                            <option value="Obat Golongan Narkotika">Obat Golongan Narkotika</option>
                                            <option value="Obat Fitofarmaka">Obat Fitofarmaka</option>
                                            <option value="Obat Herbal Terstandar (OHT)">Obat Herbal Terstandar (OHT)</option>
                                            <option value="Obat Herbal">Obat Herbal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga" class="col-sm-2 col-form-label ml-5">Harga Satuan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp.">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah" class="col-sm-2 col-form-label ml-5">Stok Obat</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="jumlah" id="jumlah">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mr-5">Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
            <strong>Copyright &copy; 2022 <a href=#>Anton Roycar Nababan</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('template/') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
