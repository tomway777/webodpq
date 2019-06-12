//
// function median(numbers) {
//     // median of [3, 5, 4, 4, 1, 1, 2, 3] = 3
//     var median = 0, numsLen = numbers.length;
//     numbers.sort();
//
//     if (
//         numsLen % 2 === 0 // is even
//     ) {
//         // average of two middle numbers
//         median = (numbers[numsLen / 2 - 1] + numbers[numsLen / 2]) / 2;
//     } else { // is odd
//         // middle number only
//         median = numbers[(numsLen - 1) / 2];
//     }
//
//     return median;
// }

function standardDeviation(values){
    var avg = average(values);

    var squareDiffs = values.map(function(value){
        var diff = value - avg;
        var sqrDiff = diff * diff;
        return sqrDiff;
    });

    var avgSquareDiff = average(squareDiffs);

    var stdDev = Math.sqrt(avgSquareDiff);
    return stdDev;
}

function average(data){
    var sum = data.reduce(function(sum, value){
        return sum + value;
    }, 0);

    var avg = sum / data.length;
    return avg;
}
$().ready(function () {
    $.ajax(
        {
            url : "http://localhost/penilaian",
            type : "GET",
            success : function (data) {
                var len = data.length;
                var datas = {
                    labelpemda :[],
                    vexistence : [],
                    vconformance : [],
                    vopendata : [],
                    vtotal : []
                };
                for(var i=0; i<len; i++){
                    datas.labelpemda.push(data[i].nama_pemda)
                    datas.vexistence.push(data[i].existence)
                    datas.vconformance.push(data[i].conformance)
                    datas.vopendata.push(data[i].opendata)
                    datas.vtotal.push(data[i].total)
                };


                var sum = 0;
                var sumE = 0;
                var sumC = 0;
                var sumO = 0;
                for(var i=0;   i<len; i++){
                    sum += datas.vtotal[i]
                    sumE += datas.vexistence[i]
                    sumC +=datas.vconformance[i]
                    sumO += datas.vopendata[i]
                }
                // Rata rata
                var avgtotal = sum/len;
                var avgE = sumE/len;
                var avgC = sumC/len;
                var avgO = sumO/len;

                // Standard Deviasi

                var stdex = standardDeviation(datas.vexistence);
                var stdcon = standardDeviation(datas.vconformance);
                var stdop = standardDeviation(datas.vopendata);
                var stdtot = standardDeviation(datas.vtotal);


                // // Median
                // var mdex = median(datas.vexistence);
                // var mdcon = median(datas.vconformance);
                // var mdop = median(datas.vopendata);
                // var mdtot = median(datas.vtotal);
                //
                // console.log("medcon " + mdcon.toFixed(2));
                // console.log(stdper);
                // console.log("Data Existence ", datas.vexistence);
                // console.log(avgE,avgC,avgO);
                var ctx = $("#penilaianbarChart");

                var exsistData = {
                    label: 'Existence',
                    data: datas.vexistence,
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderColor: 'rgba(0, 99, 132, 1)',
                    yAxisID: "y-axis-existence"
                };

                var conformData = {
                    label: 'Conformane',
                    data: datas.vconformance,
                    backgroundColor: 'rgba(99, 132, 0, 0.6)',
                    borderColor: 'rgba(99, 132, 0, 1)',
                    yAxisID: "y-axis-conformance"
                };

                var opdData = {
                    label: 'Open Data',
                    data: datas.vopendata,
                    backgroundColor: 'rgba(132,47,39,0.6)',
                    borderColor: 'rgb(132,26,45)',
                    yAxisID: "y-axis-opendata"
                };
                var totalData = {
                    label: 'Total',
                    data: datas.vtotal,
                    backgroundColor: 'rgba(111,31,132,0.6)',
                    borderColor: 'rgb(118,8,132)',
                    yAxisID: "y-axis-total"
                };


                var odpqData = {
                    labels: datas.labelpemda,
                    datasets: [exsistData,conformData,opdData,totalData]
                };
                var chartOptions = {
                    scales: {
                        xAxes: [{
                            barPercentage: 1,
                            categoryPercentage: 0.6
                        }],
                        yAxes: [{
                            id: "y-axis-existence"
                        }, {
                            id: "y-axis-conformance"
                        },{
                            id: "y-axis-opendata"
                        },{
                            id: "y-axis-total"
                        }
                        ]
                    },
                    title: {
                        display: true,
                        text: 'Nilai Sub dimensi dan Total Setiap Open Data',
                        fontSize: 30
                    }
                };

                var penilaianbar = new Chart(ctx,{
                    type: 'bar',
                    data: odpqData,
                    options: chartOptions,
                });

                //
                var cty = $("#existenceChart");
                var ctv = $("#conformanceChart");
                var ctb = $("#opendataChart");
                var ctn = $("#totalChart");

                var existenceData = {
                    label: 'Nilai Existence',
                    data: datas.vexistence,
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderColor: 'rgba(0, 99, 132, 1)',
                };

                var conformData = {
                    label: 'Nilai Conformance',
                    data: datas.vconformance,
                    backgroundColor: 'rgba(99, 132, 0, 0.6)',
                    borderColor: 'rgba(99, 132, 0, 1)',
                };

                var opendaData = {
                    label: 'Nilai Open Data',
                    data: datas.vopendata,
                    backgroundColor: 'rgba(132,47,39,0.6)',
                    borderColor: 'rgb(132,26,45)',
                };

                var totalData = {
                    label: 'Nilai Total',
                    data: datas.vtotal,
                    backgroundColor: 'rgba(111,31,132,0.6)',
                    borderColor: 'rgb(118,8,132)',
                };

                ///--------------------------------------------------------------------///


                var barChart = new Chart(cty, {
                    type: 'bar',
                    data: {
                        labels: datas.labelpemda,
                        datasets: [existenceData]
                    },
                    options:{
                        annotation: {
                            annotations: [{
                                type: 'line',
                                id: 'hLine',
                                mode: 'horizontal',
                                scaleID: 'y-axis-0',
                                value: avgE,  // data-value at which the line is drawn
                                borderWidth: 2,
                                borderColor: 'blue',
                                label: {
                                    enabled: true,
                                    position: "center",
                                    // labelString: "Rata - Rata ",
                                    content: "avg " + avgE.toFixed(2)
                                }
                            },
                                {
                                    type: 'line',
                                    id: 'hLine1',
                                    mode: 'horizontal',
                                    scaleID: 'y-axis-0',
                                    value: stdex,  // data-value at which the line is drawn
                                    borderWidth: 2,
                                    borderColor: 'red',
                                    label: {
                                        enabled: true,
                                        position: "center",
                                        // labelString: "Rata - Rata ",
                                        content: "Std " + stdex.toFixed(2)
                                    }
                                }
                            ]
                        }
                    }
                });

                var barCharta = new Chart(ctv, {
                    type: 'bar',
                    data: {
                        labels: datas.labelpemda,
                        datasets: [conformData]
                    },
                    options:{
                        annotation: {
                            annotations: [{
                                type: 'line',
                                id: 'hLine',
                                mode: 'horizontal',
                                scaleID: 'y-axis-0',
                                value: avgC,  // data-value at which the line is drawn
                                borderWidth: 2,
                                borderColor: 'blue',
                                label: {
                                    enabled: true,
                                    position: "center",
                                    // labelString: "Rata - Rata ",
                                    content: "avg " + avgC.toFixed(2)
                                }
                            },
                                {
                                    type: 'line',
                                    id: 'hLine1',
                                    mode: 'horizontal',
                                    scaleID: 'y-axis-0',
                                    value: stdcon,  // data-value at which the line is drawn
                                    borderWidth: 2,
                                    borderColor: 'red',
                                    label: {
                                        enabled: true,
                                        position: "center",
                                        // labelString: "Rata - Rata ",
                                        content: "Std " + stdcon.toFixed(2)
                                    }
                                }
                            ]
                        }
                    }
                });

                var barChartb = new Chart(ctb, {
                    type: 'bar',
                    data: {
                        labels: datas.labelpemda,
                        datasets: [opendaData]
                    },
                    options:{
                        annotation: {
                            annotations: [{
                                type: 'line',
                                id: 'hLine',
                                mode: 'horizontal',
                                scaleID: 'y-axis-0',
                                value: avgO,  // data-value at which the line is drawn
                                borderWidth: 2,
                                borderColor: 'blue',
                                label: {
                                    enabled: true,
                                    position: "center",
                                    // labelString: "Rata - Rata ",
                                    content: "avg " + avgO.toFixed(2)
                                }
                            },
                                {
                                    type: 'line',
                                    id: 'hLine1',
                                    mode: 'horizontal',
                                    scaleID: 'y-axis-0',
                                    value: stdop,  // data-value at which the line is drawn
                                    borderWidth: 2,
                                    borderColor: 'red',
                                    label: {
                                        enabled: true,
                                        position: "center",
                                        // labelString: "Rata - Rata ",
                                        content: "Std " + stdop.toFixed(2)
                                    }
                                }
                            ]
                        }
                    }
                });

                var barChartc = new Chart(ctn, {
                    type: 'bar',
                    data: {
                        labels: datas.labelpemda,
                        datasets: [totalData]
                    },
                    options:{
                        annotation: {
                            annotations: [{
                                type: 'line',
                                id: 'hLine',
                                mode: 'horizontal',
                                scaleID: 'y-axis-0',
                                value: avgtotal,  // data-value at which the line is drawn
                                borderWidth: 2,
                                borderColor: 'blue',
                                label: {
                                    enabled: true,
                                    position: "center",
                                    // labelString: "Rata - Rata ",
                                    content: "avg " + avgtotal.toFixed(2)
                                }
                            },
                                {
                                    type: 'line',
                                    id: 'hLine1',
                                    mode: 'horizontal',
                                    scaleID: 'y-axis-0',
                                    value: stdtot,  // data-value at which the line is drawn
                                    borderWidth: 2,
                                    borderColor: 'red',
                                    label: {
                                        enabled: true,
                                        position: "center",
                                        // labelString: "Rata - Rata ",
                                        content: "Std " + stdtot.toFixed(2)
                                    }
                                }
                            ]
                        }
                    }
                });
            },
            error : function (data) {
                console.log('err')
            }
        }
    )
})