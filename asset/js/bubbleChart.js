$().ready(function () {
    $.ajax({
        url : "http://localhost/main/getDataPemda",
        type : "GET",
        success : function (data) {
            //console.log(data.data)
            var len = data.data.length;

            var datas = {
                labelPemda : [],
                numDatasets : [],
                numResources: [],
                sizebubble : []
            };

            for (var i =0;i < len; i++){
                datas.labelPemda.push(data.data[i].nama_pemda)
                datas.numDatasets.push(data.data[i].numDataset)
                datas.numResources.push(data.data[i].numResource)
            };
            console.log(data)
            console.log(datas.labelPemda)
            console.log(datas.numResources)
            datas.sizebubble = datas.numDatasets.map(x => Math.ceil(x/100));


            var ctx = $("#bubblechart");
            var chart1 = new Chart(ctx, {
                type: 'bubble',
                data: {
                    labels: "Bubble",
                    datasets: [
                        {
                            label: datas.labelPemda,
                            backgroundColor: ["#3e95cd", "#8e5ea2", "#8947a2",
                                "#3cba9f","#28ba89", "#34ba52",
                                "#e8c3b9","#c45850", "#c42c2a",
                                "#e8e2e8","#c49556", "#bbc45f",
                                "#00c4b2", "#17c464"],
                            data: [{
                                x: datas.numDatasets,
                                y: datas.numResources,
                                r: datas.sizebubble
                            }]
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Predicted world population (millions) in 2050'
                    }, scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: "Happiness"
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: "GDP (PPP)"
                            }
                        }]
                    }
                }
            });


        },
        error : function (data) {
            console.log("error")
        }
    })
})