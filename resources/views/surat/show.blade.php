<!DOCTYPE html>

<head>
    <title>Surat Keterangan Sakit</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

        .kepala {
            text-align: center;

        }

        img {
            height: 100px;

        }

        .kop {
            text-align: center;
        }

        .tabel {
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row align-items-start">
              
              <table>
                <tr>
                  <td class="text-end"><img src="{{ asset('template/') }}/dist/img/itdel.png" height="100px"></td>
                  <td class="text-center">
                    <h2>KLINIK DEL</h2>
                    <p>Jalan Sisingamangaraja, Sitoluama, Laguboti 22381 <br>
                        Toba-Samosir, SUMUT, Indonesia <br>
                        Telp: +628xxxxxxxxxx , Email: mahasiswa@gmail.com
                    </p>
                  </td>
                  <td class="text-start"><img src="{{ asset('template/') }}/dist/img/del.png" alt=""></td>
                </tr>
              </table>
              
              <p class="text-center">_________________________________________________________________________________________________________________________________________________</p>
              <br>
              <div class="kop">
                <h4>Surat Keterangan Sakit</h4>
              </div>
              
              <p>Yang bertanda tangan dibawah ini Dokter Klinik IT Del menerangkan bahwa:</p>
              <table>
                
                
                <tr >
                    <td style="width: 30%;padding-left:50px">Nama</td>
                    <td style="width: 5%;"class="ms-5">:</td>
                    <td style="width: 65%;"class="ms-5"> {{ $surat->nama }} </td>
                </tr>
                <tr>
                  <td style="width: 30%;padding-left:50px">Tempat, tanggal lahir</td>
                  <td style="width: 5%;">:</td>
                  <td style="width: 65%;">{{ $surat->tempatlahir }}, {{ date('j F Y', strtotime($surat->tgllahir)) }}</td>
                </tr>
                <tr>
                  <td style="width: 30%;padding-left:50px">Jenis Kelamin</td>
                  <td style="width: 5%;">:</td>
                  <td style="width: 65%;">{{ $surat->jenis }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;padding-left:50px">Agama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $surat->agama }}</td>
                </tr>
                <tr>
                  <td style="width: 30%;padding-left:50px">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $surat->pekerjaan }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;padding-left:50px">Alamat</td>
                    <td style="width: 5%;;">:</td>
                    <td style="width: 65%;">{{ $surat->alamat }}</td>
                </tr>
              </table>
                
                
                <p style="padding-top:20px">Benar sakit pada tanggal {{ date('j F Y', strtotime($surat->tanggal)) }} dengan diagnosa <span style="text-decoration-line:underline"><b>{{ $surat->diagnosa }}</b></span>. Mengingat kesehatannya, diajurkan istirahat
                  terhitung mulai tanggal {{ date('j F Y', strtotime($surat->mulai)) }} sampai dengan tanggal {{ date('j F Y', strtotime($surat->akhir)) }} .</p>
                  
                  <p>Demikian Surat Keterangan Sakit ini diperbuat untuk dapat dipergunakan seperlunya.</p>
                  
                  <div style="width: 90%; text-align: right; float: left;">Sitoluama, {{ date('j F Y', strtotime($surat->tanggalsurat)) }}</div><br>
                  <div style="width: 89%; text-align: right; float: left;">Dokter yang memeriksa</div><br><br><br><br><br>
                  <div style="width: 88%; text-align: right; float: left;">{{ Auth::user()->name }}</div>
                  

                  
                </div>
              <div>
                <button class="btn btn-info btn-sm" onclick="myFunction()">Print</button>

                

                <script>
                function myFunction() {
                  window.print();
                }
                </script>
              </div>
                
</body>

</html>
