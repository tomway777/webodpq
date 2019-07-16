$(document).ready(function(){
    $.ajax({
        url : "http://localhost/nilaiahp",
        type : "GET",
        success : function (data){
            // console.log(data.data[0].nama_pemda);
            var datas = {
                labelPemda : [],
                vtotalahp : [],
                numResources : []
            };
            var len = data.length;
            for (var i =0;i < len; i++){
                datas.labelPemda.push(data[i].nama)
                datas.vtotalahp .push(data[i].totalAHP)
            };
            console.log(datas)

            var chart = Highcharts.chart('ahpchart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Skor penilaian kualitas berdasarkan AHP'
                },
                subtitle: {
                    text: 'Portal Open Data'
                },
                xAxis: {
                    categories: datas.labelPemda,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Skor)'
                    },
                    plotLines: [{
                        value: 0.78,
                        color: 'green',
                        dashStyle: 'shortdash',
                        width: 2,
                        label: {
                            text: 'Rata-Rata = 0.78',
                            align: 'right'
                        }
                    }]
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        dataLabels: {
                            enabled : true
                        }
                    },
                    series: {
                        zones:[{
                            value:0,
                            color:'#002db3'
                        },{
                            value:2.325,
                        },{
                            value:2.5,
                            color:'#002db3'
                        },{
                            value:3,
                            color:'#00ff55'
                        }]
                    }
                },
                series: [{
                    showInLegend: false,
                    name: 'Total',
                    data: datas.vtotalahp,


                },

                ]
            });


        },
        error: function (err){
            console.log('eerr')
        }
    });
})