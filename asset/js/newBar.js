$().ready(function () {
    $.ajax({
        url : "http://localhost/nilaimetrik",
        type : "GET",
        success : function (data) {
            var datas = {
                labelpemda :[],
                vexistence : [],
                vconformance : [],
                vopendata : [],
                vtotal : [],
                vdataset : [],
                vukuran:[]

            };
            var len = data.length;

            for (var i =0;i<len;i++){
                datas.labelpemda.push(data[i].nama)
                datas.vexistence.push(data[i].Existence)
                datas.vconformance.push(data[i].Conformance)
                datas.vopendata.push(data[i].OpenData)
                datas.vtotal.push(data[i].Total)
                datas.vdataset.push(data[i].numdataset)
                datas.vukuran.push(data[i].ukuran)
            }
            // var cahp = datas.vtotalAHP.sort(function(a, b){return b-a});
            // console.log()

            var chart = Highcharts.chart('pchart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Skor penilaian kualitas'
                },
                subtitle: {
                    text: 'Portal Open Data'
                },
                xAxis: {
                    categories: datas.labelpemda,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Skor)'
                    },
                    plotLines: [{
                        value: 2.1370,
                        color: 'green',
                        dashStyle: 'shortdash',
                        width: 2,
                        label: {
                            text: 'Rata-Rata = 2.1370',
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
                            value:2.0,
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
                    data: datas.vtotal,


                },

                 ]
            });


            var echart = Highcharts.chart('echart',{
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Existence'
                },
                xAxis: {
                    categories: datas.labelpemda,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Skor',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'Existence',
                    showInLegend: false,
                    data: datas.vexistence
                }]

            });
            var echart = Highcharts.chart('cchart',{
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Conformance'
                },
                xAxis: {
                    categories: datas.labelpemda,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Skor',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'Conformance',
                    showInLegend: false,
                    data: datas.vconformance
                }]

            });
            var echart = Highcharts.chart('ochart',{
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Open Data'
                },
                xAxis: {
                    categories: datas.labelpemda,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Skor',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: 'Opendata',
                    showInLegend: false,
                    data: datas.vopendata
                }]

            });

            var series = [];
            for(var i=0;i<datas.labelpemda.length;i++){
                series.push({
                    name: datas.labelpemda[i],
                    data:[datas.vexistence[i], datas.vconformance[i], datas.vopendata[i]],
                    pointPlacement: 'on',
                    dashStyle: 'longdash',
                    lineWidth: 1,
                })
            }
            // console.log(series);

            var radar = Highcharts.chart('radarchart', {

                chart: {
                    polar: true,
                    type: 'line'
                },

                title: {
                    text: 'Perbandingan nilai Portal Open Data',
                    x: -100
                },

                pane: {
                    size: '80%'
                },

                xAxis: {
                    categories: ['Existence', 'Conformance', 'Open Data'],
                    tickmarkPlacement: 'on',
                    lineWidth: 0
                },

                yAxis: {
                    gridLineInterpolation: 'polygon',
                    lineWidth: 0,
                    min: 0,
                    max: 1,
                    tickInterval: 0.05,

                },

                tooltip: {
                    shared: true,
                    pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
                },

                legend: {
                    layout: 'vertical',
                    floating: true,
                    align: 'left',
                    verticalAlign: 'top',

                },

                series: series,

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom'
                            },
                            pane: {
                                size: '70%'
                            }
                        }
                    }]
                }

            });
            //------------------------------bubble-----------------------------------------//
            // { x: 95, y: 95, z: 13.8, name: 'BE', country: 'Belgium' }
            var sers = [];
            var colors = ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5',
                '#64E572', '#86e5a3', '#a5e5a8',
                '#FF9655', '#FFF263', '#fff910', '#ff3ba5',
                '#6AF9C4','#5d22f9']
            var nick = ["MG", "PA", "SA","BD", "JT",
                "SO", "KD", "BR", "JK", "BG",
                "JI", "MK", "SR", "BA"]
            for(var i=0;i<datas.labelpemda.length;i++){
                sers.push({
                    x : datas.vtotal[i],
                    y : datas.vdataset[i],
                    z : datas.vukuran[i],
                    name: datas.labelpemda[i],
                    color: colors[i],
                    nick : nick[i]
                })
            }

            console.log(sers);
            var bubble = Highcharts.chart('bubblechart', {
                chart: {
                    type: 'bubble',
                    plotBorderWidth: 1,
                    zoomType: 'xy'
                },

                legend: {
                    enabled: false,

                },

                title: {
                    text: 'Perbandingan Nilai dan Dataset'
                },

                subtitle: {
                    text: 'Setiap Portal Open Data'
                },

                xAxis: {
                    gridLineWidth: 1,
                    title: {
                        text: 'Skor Portal Open Data'
                    },
                    // labels: {
                    //     format: '{value} gr'
                    // },
                    // plotLines: [{
                    //     color: 'black',
                    //     dashStyle: 'dot',
                    //     width: 2,
                    //     value: 65,
                    //     label: {
                    //         rotation: 0,
                    //         y: 15,
                    //         style: {
                    //             fontStyle: 'italic'
                    //         },
                    //         text: 'Safe fat intake 65g/day'
                    //     },
                    //     zIndex: 3
                    // }]
                },

                yAxis: {
                    startOnTick: false,
                    endOnTick: false,
                    title: {
                        text: 'Jumlah Dataset'
                    },
                    maxPadding: 0.2,

                },

                tooltip: {
                    useHTML: true,
                    headerFormat: '<table>',
                    pointFormat: '<tr><th colspan="2"><h6>{point.name}</h6></th></tr>' +
                        '<tr><th>Nilai:</th><td>{point.x}</td></tr>' +
                        '<tr><th>Jumlah Dataset:</th><td>{point.y}</td></tr>',
                    footerFormat: '</table>',
                    followPointer: true
                },

                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            format: '{point.nick}'
                        }
                    }
                },

                series: [{
                    data: sers
                }]

            });
        },
        error : function (data) {
            console.log("err")
        }
    })
})