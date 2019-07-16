<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ODPQ Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .box{
            padding: 40px;
            margin: 10px; 0px; 10px; 0px;
        }
        .boxshow{
            background-color: #F7F7F9;
        }
        #myFooter {
            background-color: #373a48;
            color:white;
        }

        #myFooter .footer-copyright{
            background-color: #383737;
            padding-top:3px;
            padding-bottom:3px;
            text-align: center;
        }

        #myFooter .footer-copyright p {
            margin: 10px;
            color: #ccc;
        }
        @media screen and (max-width: 767px){
            #myFooter {
                text-align: center;
            }
        }
        .badge-primary{
            background-color: #80bfff !important;
        }
        .badge-secondary{
         background-color: #002db3 !important;
        }
        .badge-success{
            background-color:#00ff55 !important;
        }
    </style>


    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/highcharts-more.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <link href="<?php echo base_url().'asset/vanila/css/datatables.min.css'?>" rel="stylesheet">
<!--      <link href="https://cdn.bootcss.com/font-awesome/5.8.2/css/all.css" rel="stylesheet">-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary justify-content-center">
        <a class="navbar-brand" href="<?php base_url()?>">Open Data Portal Quality</a>
    </nav>

    <div class="container-fluid">
        <div class="row mt-3 mb-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <i class="fa fa-home"></i>
                            Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-ahp-tab" data-toggle="pill" href="#pills-ahp" role="tab" aria-controls="pills-ahp" aria-selected="false">
                            <i class="fa fa-sliders-h"></i>
                            AHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <i class="fa fa-poll"></i>
                            Visualisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <i class="fa fa-database"></i>
                            Data & Prosedur</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="box boxshow">
                            <div class="row mb-1">
                                <div class="col-md-12 col-md-offset-3">
                                    <span class="badge badge-pill badge-primary">+- 1SD</span>
                                    <span class="badge badge-pill badge-secondary">+- 2SD</span>
                                    <span class="badge badge-pill badge-success">+- 3SD</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="pchart" class="shadow"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div id="echart"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="cchart"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="ochart"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Column Chart & Bar Chart
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Membaca Column Chart</h5>
                                            <ul>
                                                <li>Batang pada grafik diurutkan dari yang tertinggi ke terendah</li>
                                                <li>Dibagi pada tiga zona warna, hijau berkualitas baik skor diatas 2,5, biru tua berkualitas sedang skor diantara 2,0 - 2,5, biru muda berkualitas rendah skor diantara 0 - 2,0</li>
                                            </ul>
                                            <hr>
                                            <h5 class="card-title">Membaca Bar Chart</h5>
                                            <ul>
                                                <li>Chart ditampilkan sebanyak dimensi kualitas (existence, conformance, open data)</li>
                                                <li>Ditampilkan semua skor portal open data untuk setiap dimensi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div id></div>-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ahp" role="tabpanel" aria-labelledby="pills-ahp-tab">
                        <div class="box boxshow">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="text-center">Bobot AHP</h3>
                                    <table class="table bg-white">
                                        <thead>
                                        <tr>
                                            <th>Existence</th>
                                            <th>Conformance</th>
                                            <th>Open Data</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td scope="row"><?php echo $ahp[0]['existence']?></td>
                                            <td><?php echo $ahp[0]['conformance']?></td>
                                            <td><?php echo $ahp[0]['opendata']?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div id="ahpchart"></div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Column Chart
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Membaca Chart</h5>
                                            <ul>
                                                <li>Menampilkan peringkat yang diurutkan dari tinggi ke rendah</li>
                                                <li>Peringkat dihasilkan dengan mengkalikan skor setiap dimensi dengan bobot ahp yang dihasilkan</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="box boxshow">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="radarchart"style="width: auto; height: 600px" ></div>
                                    </div>
                                </div>
                                <div class ="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Radar Chart
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Membaca Chart</h5>
                                                <p class="card-text">
                                                    Metode grafis menampilkan data multivariat dalam bentuk grafik dua dimensi dari
                                                    tiga atau lebih variabel
                                                    kuantitatif diwakili sumbu mulai dari titik yang sama
                                                 </p>
                                                <ul>
                                                    <li>Setiap sumbu merepresentasikan dimensi penilaian kualitas</li>
                                                    <li>Setiap skor portal akan ditampilkan sesuai nilai setiap dimensinya</li>
                                                    <li>Titik tengah segitiga adalah 0. Semakin besar area segitiga yang dihasilkan maka semakin baik skor kualitas portal</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div id="bubblechart"></div>
                                    </div>
                                </div>
                                <div class ="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Bubble Chart
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Membaca Chart</h5>
                                                <p class="card-text">
                                                    Bubble Chart biasanya digunakan untuk membandingkan dan menunjukkan hubungan antara label
                                                    atau lingkaran yang dikategorikan, dengan menggunakan posisi dan proporsi.
                                                    Gambaran keseluruhan dari bubble chart dapat digunakan untuk menganalisa pola atau korelasi.
                                                </p>
                                                <ul>
                                                    <li>Besar gelembung/bubble menunjukan jumlah dari dataset</li>
                                                    <li>Sumbu y menunjukan jumlah dataset portal sedangkan sumbu x menunjukan skor penilaian kualitas portal</li>
                                                    <li>Chart ini menampilkan korelasi antara jumlah dataset portal dengan skor penilaian kualitas portal</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div id="polarchart" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <div class="bg-white">
                                            <h6 class="text-primary">Keterangan Bubble Chart</h6>
                                            <table class="table table-striped table-sm ">
                                                <thead class="thead-inverse">
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Pemda</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td scope="row">BA</td>
                                                    <td>Kota Banda Aceh</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">SR</td>
                                                    <td>Kota Semarang</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">MK</td>
                                                    <td>Kota Makassar</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">JI</td>
                                                    <td>Kota Jambi</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">BG</td>
                                                    <td>Kota Bogor</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">BR</td>
                                                    <td>Kabupater Brebes</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">JK</td>
                                                    <td>Provinsi DKI Jakarta</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">KD</td>
                                                    <td>Kota Kendal</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">SO</td>
                                                    <td>Kota Surakarta</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">JT</td>
                                                    <td>Provinsi Jawa Tengah</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">BD</td>
                                                    <td>Kota Bandung</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">SA</td>
                                                    <td>Kota Salatiga</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">PA</td>
                                                    <td>Provinsi Aceh</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">MG</td>
                                                    <td>Kota Magelang</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Polar Chart
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Membaca Chart</h5>
                                                <p class="card-text">
                                                    Polar Chart/ Windrose adalah sebuah grafik yang memberikan gambaran tentang bagaimana
                                                    arah dan skor peniliaian kualitas terdistribusikan di sebuah subdimensi
                                                </p>
                                                <ul>
                                                    <li>Sumbu pusat grafik bernilai 0 sedangkan ujung bernilai 1</li>
                                                    <li>Jika batang semakin mendekati ujung grafik maka skor dari subdimensi semakin bagus</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div id="colchart"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Column Chart
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Membaca Chart</h5>
                                                <ul>
                                                    <li>Menampilkan rata rata skor subdimensi yang diurutkan dari tinggi ke rendah</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="box boxshow">
                            <div class="container-flow">
                                <div class="col-md-6 bg-white" id="tabeldata">
                                    <table class="table table-responsive table-sm">
                                        <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th>Pemda</th>
                                            <th>Link</th>
                                            <th>Dataset</th>
                                            <th>Waktu Akuisisi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<!--                                        --><?php //var_dump($datapemda)?>
                                            <?php foreach ($datapemda as $p){?>
                                            <tr>
                                                <th><?php echo $p['nama_pemda']?></th>
                                                <th><?php echo $p['link']?></th>
                                                <th><?php echo $p['numDataset']?></th>
                                                <th><?php echo $p['tanggal']?></th>
                                            </tr>
                                        <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6" id="chartdata"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table id="pemdatb" class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id Pemda</th>
                        <th scope="col">Nama Pemda</th>
                        <th scope="col">Tautan</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pemda as $p){?>
                    <tr>
                        <th scope="row"><?php echo $p['id_pemda']?></th>
                        <td><?php echo $p['nama_pemda']?></td>
                        <td><?php echo $p['link']?></td>
                        <td><a class="btn btn-dark" href="<?php echo base_url('detail/').$p['id_pemda'];?>" role="button">Detail</a></td>
                    </tr>
                    <?php };?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="myFooter">
        <div class="footer-copyright">
            <p>© 2019 Copyright ADDI</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="<?php echo base_url().'asset/vanila/js/datatables.min.js'?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@1"></script>

    <script>
        $(document).ready(function () {
           $('#pills-contact-tab').click(function () {
               $('#pemdatb').hide();
               $('#pemdatb_length').hide();
               $('#pemdatb_filter').hide();
               $('#pemdatb_info').hide();
               $('#pemdatb_paginate').hide();

            })
            $('#pills-home-tab').click(function () {
                $('#pemdatb').show();
                $('#pemdatb_length').show();
                $('#pemdatb_filter').show();
                $('#pemdatb_info').show();
                $('#pemdatb_paginate').show();
            })
            $('#pills-ahp-tab').click(function () {
                $('#pemdatb').show();
                $('#pemdatb_length').show();
                $('#pemdatb_filter').show();
                $('#pemdatb_info').show();
                $('#pemdatb_paginate').show();
            })
            $('#pills-profile-tab').click(function () {
                $('#pemdatb').show();
                $('#pemdatb_length').show();
                $('#pemdatb_filter').show();
                $('#pemdatb_info').show();
                $('#pemdatb_paginate').show();
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#pemdatb').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

    <script src="<?php echo base_url().'asset/js/datachart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/newBar.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/barChart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/polarChart.js';?>"></script>
  </body>
</html>



