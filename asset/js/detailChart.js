var re = window.location.pathname;
var ur = re.substring(re.lastIndexOf('/')+1);
console.log(ur);


$().ready(function () {
    $.ajax({
        url : "http://localhost/detchart/"+ur,
        type : "GET",
        success : function (data) {
            // console.log(data[0]);
            // File Format
            var filefor =  JSON.parse(data[0]['fileformattp']);

            var ordered = {};
            Object.keys(filefor).sort().forEach(function(key) {
                ordered[key] = filefor[key];
            });
            var catFil = Object.keys(ordered);
            var valFil = Object.values(ordered);
            var series = [];
            for(var i=0;i<catFil.length;i++){
                series.push({
                    name: catFil[i],
                    y: valFil[i],
                })
            }

            // License
            var lice = JSON.parse(data[0]['licensetp']);
            var katLi = Object.keys(lice);
            var valLi = Object.values(lice);


            // Email
            var em = JSON.parse(data[0]['emailtype']);
            var katEm = Object.keys(em);
            var valEm = Object.values(em);
            var sers = [];
            for(var i=0;i<katEm.length;i++){
                sers.push([katEm[i],valEm[i]])
            }


            //Kategori
            var kat = JSON.parse(data[0]['kategori']);

            var katkt = Object.keys(kat);

            for(var i =0;i< katkt.length;i++){
                kat[i]["name"] = kat[i]["_id"];
                kat[i]["weight"] = kat[i]["count"];
                delete kat[i][ "_id" ];
                delete kat[i]["count"];
            }


            var nechart = Highcharts.chart('chartFile', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },

                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Format',
                    colorByPoint: true,
                    data: series
                }]
            });

            var lichart = new Highcharts.chart('licen', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: katLi,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }

                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series:
                    [{
                    name: 'License',
                    colorByPoint: true,
                    data: valLi
                }]

            });

            var emchart = Highcharts.chart('emtype', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Jenis<br>Email<br>2019',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 40
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%'],
                        size: '110%'
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'prosentase',
                    innerSize: '50%',
                    data: sers
                }]
            });


            var wordchart = new Highcharts.chart('wordcl', {
                series: [{
                    type: 'wordcloud',
                    data: kat,
                    name: 'Occurrences'
                }],
                title: {
                    text: null
                }
            });
        },
        error : function (data) {
            console.log('err');
        }
    })
})