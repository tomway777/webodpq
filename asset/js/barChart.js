$(document).ready(function(){
    $.ajax({
        url : "http://localhost/main/getDataPemda",
        type : "GET",
        success : function (data){
            // console.log(data.data[0].nama_pemda);
            var datas = {
                labelPemda : [],
                numDatasets : [],
                numResources : []
            };
            var len = data.data.length;
            for (var i =0;i < len; i++){
                datas.labelPemda.push(data.data[i].nama_pemda)
                datas.numDatasets.push(data.data[i].numDataset)
                datas.numResources.push(data.data[i].numResource)
            };
            // console.log(datas);
            // console.log(datas.numDatasets)

            var ctx = $("#barchart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: datas.labelPemda,
                    datasets: [{
                        label: 'jumlah dataset',
                        data: datas.numDatasets,
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#8947a2",
                            "#3cba9f","#28ba89", "#34ba52",
                            "#e8c3b9","#c45850", "#c42c2a",
                            "#e8e2e8","#c49556", "#bbc45f",
                            "#00c4b2", "#17c464"],
                        borderColor: [
                            'rgb(104,41,255)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx1 = $("#barchart2");
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: datas.labelPemda,
                    datasets: [{
                        label: 'jumlah Resources',
                        data: datas.numResources,
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#8947a2",
                            "#3cba9f","#28ba89", "#34ba52",
                            "#e8c3b9","#c45850", "#c42c2a",
                            "#e8e2e8","#c49556", "#bbc45f",
                            "#00c4b2", "#17c464"],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        },
        error: function (err){
            console.log('eerr')
        }
    });
})