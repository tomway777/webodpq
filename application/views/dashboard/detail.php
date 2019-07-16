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
        .boxshow{
            background-color: #F7F7F9;
        }

        .redmark{
            background-color: rgba(255,0,0,0.4) ;
            color: #4e4a4a;
        }

    </style>


    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/highcharts-more.js"></script>
      <script src="https://code.highcharts.com/modules/wordcloud.js">
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <link href="https://cdn.bootcss.com/font-awesome/5.8.2/css/all.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary justify-content-center">
        <a class="navbar-brand" href="<?php base_url()?>">Open Data Portal Quality</a>
    </nav>
<!--    Grafik history nilai-->
<!--    --><?php
////        var_dump($detailch[0]["fileformattp"]);
//        $new = json_decode($detailch[0]["fileformattp"], true);
//        var_dump($new)
//    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="histnilai"></div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Skor Setiap Subdimensi</h3>
                <table id="datatable" class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                    <tr>
                        <th scope="col">Id Pemda</th>
                        <th scope="col">Pemda</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Access</th>
                        <th scope="col">Discovery</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Right</th>
                        <th scope="col">Preservation</th>
                        <th scope="col">Date</th>
                        <th scope="col">AccessURL</th>
                        <th scope="col">ContactURL</th>
                        <th scope="col">Date Format</th>
                        <th scope="col">License</th>
                        <th scope="col">File Format</th>
                        <th scope="col">Contact Email</th>
                        <th scope="col">Open Format</th>
                        <th scope="col">Machine Readable</th>
                        <th scope="col">Open License</th>
                    </thead>
                    <tbody>
                    <?php foreach($data as $d){?>
                        <tr>
                            <td scope="row" class="id"><?php echo $d['id_pemda']?></td>
                            <td scope="row" class="pemda"><?php echo $d['nama_pemda']?></td>
                            <td scope="row" class="waktu"><?php echo $d['created_at']?></td>
                            <td scope="row" class="acc"><?php echo $d['access']?></td>
                            <td scope="row" class="dis"><?php echo $d['discovery']?></td>
                            <td scope="row" class="con"><?php echo $d['contact']?></td>
                            <td scope="row" class="rig"><?php echo $d['right']?></td>
                            <td scope="row" class="pre"><?php echo $d['preservation']?></td>
                            <td scope="row" class="dat"><?php echo $d['date']?></td>
                            <td scope="row" class="acu"><?php echo $d['accessurl']?></td>
                            <td scope="row" class="cot"><?php echo $d['contacturl']?></td>
                            <td scope="row" class="daf"><?php echo $d['dateformat']?></td>
                            <td scope="row" class="lic"><?php echo $d['license']?></td>
                            <td scope="row" class="fil"><?php echo $d['fileformat']?></td>
                            <td scope="row" class="coe"><?php echo $d['contactemail']?></td>
                            <td scope="row" class="ope"><?php echo $d['openformat']?></td>
                            <td scope="row" class="mac"><?php echo $d['machineread']?></td>
                            <td scope="row" class="opl"><?php echo $d['openlicense']?></td>
                        </tr>
                    <?php };?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Format File</h3>
                <hr>
                <div id="chartFile"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 shadow">
                <h4 class="text-center">Lisensi</h4>
                <div id="licen"></div>
            </div>
            <div class="col-md-6 shadow">
                <h4 class="text-center">Tipe Email</h4>
                <div id="emtype"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Kategori Dataset</h4>
                <div id="wordcl"></div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var arr  = [];
        $('#datatable tr').each(function() {
            var id = $(this).find(".id").html();
            var pemda = $(this).find(".pemda").html();
            var waktu = $(this).find(".waktu").html();
            var acc = $(this).find(".acc").html();
            var dis = $(this).find(".dis").html();
            var con = $(this).find(".con").html();
            var rig = $(this).find(".rig").html();
            var pre = $(this).find(".pre").html();
            var dat = $(this).find(".dat").html();
            var acu = $(this).find(".acu").html();
            var cot = $(this).find(".cot").html();
            var daf = $(this).find(".daf").html();
            var lic = $(this).find(".lic").html();
            var fil = $(this).find(".fil").html();
            var coe = $(this).find(".coe").html();
            var ope = $(this).find(".ope").html();
            var mac = $(this).find(".mac").html();
            var opl = $(this).find(".opl").html();
            if(pemda != undefined){
                // arr.push({Id : id,Pemda : pemda, Waktu: waktu, Access:parseFloat(acc), Discovery: parseFloat(dis), Contact:parseFloat(con), Rigth : parseFloat(rig),
                // Preservation: parseFloat(pre), Date: parseFloat(dat), AccessURL:parseFloat(acu), ContactURL: parseFloat(cot), DateFormat:parseFloat(daf), License:parseFloat(lic),
                // FileFormat:parseFloat(fil),ContactEmail:parseFloat(coe), OpenFormat:parseFloat(ope),MachineRead:parseFloat(mac),OpenLicense:parseFloat(opl)})
                arr.push({Id : id,Pemda : pemda, Waktu: waktu, Total: ((parseFloat(acc)+parseFloat(dis)+parseFloat(con)+parseFloat(rig)+parseFloat(pre)+parseFloat(dat))/6+
                        (parseFloat(acu)+parseFloat(cot)+parseFloat(daf)+parseFloat(lic)
                        +parseFloat(fil)+parseFloat(coe))/6+(parseFloat(ope)+parseFloat(mac)+parseFloat(opl))/3).toFixed(2)})
            }
            if(acc <= 0.5){$(this).find(".acc").addClass("redmark");
            }
            if(dis <= 0.5){$(this).find(".dis").addClass("redmark");
            }
            if(con <= 0.5){$(this).find(".con").addClass("redmark");
            }
            if(rig <=0.5) $(this).find(".rig").addClass("redmark");
            if(pre <=0.5) $(this).find(".pre").addClass("redmark");
            if(dat <=0.5) $(this).find(".dat").addClass("redmark");
            if(acu <=0.5) $(this).find(".acu").addClass("redmark");
            if(cot <=0.5) $(this).find(".cot").addClass("redmark");
            if(daf <=0.5) $(this).find(".daf").addClass("redmark");
            if(lic <=0.5) $(this).find(".lic").addClass("redmark");
            if(fil <=0.5) $(this).find(".fil").addClass("redmark");
            if(coe <=0.5) $(this).find(".coe").addClass("redmark");
            if(ope <=0.5) $(this).find(".ope").addClass("redmark");
            if(mac <=0.5) $(this).find(".mac").addClass("redmark");
            if(opl <=0.5) $(this).find(".opl").addClass("redmark");

        });
        // console.log(arr);
        var datas = {
            labelpemda : [],
            vnilai : [],
            vdate : []
        };
        var len = arr.length;
        for (var i =0; i < len;i++){
            datas.labelpemda.push(arr[i].Pemda)
            datas.vnilai.push(parseFloat(arr[i].Total))
            datas.vdate.push(arr[i].Waktu)
        }
        console.log(datas);
        var linec = Highcharts.chart('histnilai', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Riwayat Pertumbuhan Nilai'
            },
            subtitle: {
                text: 'Portal Open Data'
            },
            xAxis: {
                categories: datas.vdate
            },
            yAxis: {
                title: {
                    text: 'Nilai'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true,
                        borderRadius: 5,
                        backgroundColor: 'rgba(252, 255, 197, 0.7)',
                        borderWidth: 1,
                        borderColor: '#AAA'
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                data: datas.vnilai
            }]
        });

    </script>
    <script src="<?php echo base_url().'asset/js/detailChart.js';?>"></script>
  </body>
</html>



