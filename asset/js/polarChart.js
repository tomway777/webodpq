$().ready(function () {
    $.ajax({
        // "http://localhost/windrose"
        url: "http://localhost/windrose",
        type: "GET",
        async : false,
            dataType : 'json',
        success : function (data) {

            Highcharts.chart('polarchart',{

                chart: {
                    polar: true,
                    type: 'column'
                },

                title: {
                    text: 'Perbandingan nilai sub dimensi'
                },

                subtitle: {
                    text: 'Nilai rata - rata setiap sub dimensi'
                },

                pane: {
                    size: '90%'
                },

                legend: {
                    reversed: true,
                    align: 'right',
                    verticalAlign: 'top',
                    y: 100,
                    layout: 'vertical'
                },

                xAxis: {
                    type: "category",
                    tickmarkPlacement: 'between',
                },

                yAxis: {
                    min: 0,
                    angle: 285,
                    lineColor: "#330000",
                    lineWidth: 0.5,
                    endOnTick: false,
                    showLastLabel: true,
                    title: {
                        text: 'Nilai'
                    },
                    labels: {
                        formatter: function () {
                            return this.value ;
                        }
                    }
                },

                tooltip: {

                    followPointer: true
                },

                plotOptions: {

                    series: {
                        shadow: false,
                        groupPadding: 1,
                        pointPlacement: 'on',
                        zones:[{
                            value:0,
                            color:'#002db3'
                        },{
                            value:0.5,
                            color:'#546bb3'
                        },{
                            value:0.87,
                            color:'#39b3af'
                        },{
                            value:1,
                            color:'#00ff55'
                        }]
                    }
                },

                series: [{
                    "showInLegend": false,
                    "name" : "nilai",
                    "data" : data,
                }]
            });

            var narr = data.sort(function(a, b) {
                return b[1] - a[1];
            });
            var cat = [];
            var dat = [];
            for (var i=0; i < narr.length;i++){
                cat.push(narr[i][0]);
                dat.push(narr[i][1])

            }


            var col = Highcharts.chart('colchart',{
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Nilai Rata - Rata Sub dimensi'
                },
                subtitle: {
                    text: 'portal Open Data'
                },
                xAxis: {
                    categories: cat,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'skor'
                    }
                },
                // tooltip: {
                //     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                //     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                //         '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                //     footerFormat: '</table>',
                //     shared: true,
                //     useHTML: true
                // },
                plotOptions: {
                    column: {
                        dataLabels :{
                            enabled : true
                        },
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    showInLegend: false,
                    name: 'Total',
                    data: dat,


                }]

            })
        },
        error : function (data) {
            console.log("err")
        }
    }

    )
})