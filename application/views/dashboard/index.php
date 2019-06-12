<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ODPQ </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .box{
            padding: 40px;
            margin: 10px; 0px; 10px; 0px;
        }
    </style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary justify-content-center fixed-top">
        <a class="navbar-brand" href="#">Open Data Portal Quality</a>
    </nav>

    <div class="jumbotron">
        <div class="container justify-content-center text-center">
            <hr class="my-2">
            <h2 class="display-4">Selamat datang</h2>
            <p class="lead">Open Data Portal Quality</p>
            <p class="text-muted">Penilaian kualitas portal open data dan perbandingan kualitas
                menggunakan AHP
            </p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="box shadow p-3 mb-5 bg-white">
                    <?php echo $this->table->generate($pemda); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box shadow p-3 mb-5 bg-white">
                    <canvas id="polarchart"></canvas>
                </div>
                <div class="box shadow p-3 mb-5 bg-white">
                    <canvas id="barchart"></canvas>
                </div>
                <div class="box shadow p-3 mb-5 bg-white">
                    <canvas id="barchart2"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box shadow p-3 mb-5 bg-white">
                    <canvas id="radarchart"></canvas>
                </div>
                <div class="box shadow p-3 mb-5 bg-white">
                    <canvas id="penilaianbarChart"></canvas>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box shadow p-3 mb-5 bg-white">
                        <canvas id="existenceChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box shadow p-3 mb-5 bg-white">
                        <canvas id="conformanceChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box shadow p-3 mb-5 bg-white">
                        <canvas id="opendataChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box shadow p-3 mb-5 bg-white">
                        <canvas id="totalChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box shadow p-3 mb-5 bg-white">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@1"></script>
    <script src="<?php echo base_url().'asset/js/barChart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/bubbleChart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/radarChart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/penilaianbarChart.js';?>"></script>
    <script src="<?php echo base_url().'asset/js/polarChart.js';?>"></script>
  </body>
</html>



