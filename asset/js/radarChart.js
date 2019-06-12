$().ready(function () {
    $.ajax({
        url : "http://localhost/penilaian",
        type : "GET",
        success : function (data) {
            // console.log(data);
            var len = data.length;
            // console.log(len);
            var datas = {
                labelpemda :[],
                vexistence : [],
                vconformance : [],
                vopendata : [],
                colorlist : [
                    "rgb(0,0,128,0.3)","rgb(0,0,255,0.3)","rgb(0,128,0,0.3)","rgb(0,128,128,0.3)",
                    "rgb(0,255,255,0.3)","rgb(128,0,0,0.3)","rgb(128,0,128,0.3)","rgb(128,128,0,0.3)",
                    "rgb(128,128,128,0.3)","rgb(255,0,0,0.3)","rgb(255,0,255,0.3)","rgb(255,255,0,0.3)",
                    "rgb(0,0,0,0.3)","rgb(255,126,34,0.3)"
                ]
            }
            // console.log(data[0].id_pemda)
            for(var i= 0; i<len;i++){
                datas.labelpemda.push(data[i].nama_pemda)
                datas.vexistence.push(data[i].existence)
                datas.vconformance.push(data[i].conformance)
                datas.vopendata.push(data[i].opendata)
            }
            console.log(datas.vopendata[0]);
            var ctx = $("#radarchart");


            var marksData = {
                labels: ["Existence", "Conformance", "Open Data"],
                datasets: [{
                    label: datas.labelpemda[0],
                    backgroundColor: datas.colorlist[0],
                    data: [datas.vexistence[0], datas.vconformance[0], datas.vopendata[0]]
                },
                    {
                        label: datas.labelpemda[1],
                        backgroundColor: datas.colorlist[1],
                        radius: 6,
                        data: [datas.vexistence[1], datas.vconformance[1], datas.vopendata[1]]
                    },

                    {
                        label: datas.labelpemda[2],
                        backgroundColor: datas.colorlist[2],
                        radius: 6,
                        data: [datas.vexistence[2], datas.vconformance[2], datas.vopendata[2]]
                    },
                    {
                        label: datas.labelpemda[3],
                        backgroundColor: datas.colorlist[3],
                        radius: 6,
                        data: [datas.vexistence[3], datas.vconformance[3], datas.vopendata[3]]
                    },
                    {
                        label: datas.labelpemda[4],
                        backgroundColor: datas.colorlist[4],
                        radius: 6,
                        data: [datas.vexistence[4], datas.vconformance[4], datas.vopendata[4]]
                    },
                    {
                        label: datas.labelpemda[5],
                        backgroundColor: datas.colorlist[5],
                        radius: 6,
                        data: [datas.vexistence[5], datas.vconformance[5], datas.vopendata[5]]
                    },
                    {
                        label: datas.labelpemda[6],
                        backgroundColor: datas.colorlist[6],
                        radius: 6,
                        data: [datas.vexistence[6], datas.vconformance[6], datas.vopendata[6]]
                    },
                    {
                        label: datas.labelpemda[7],
                        backgroundColor: datas.colorlist[7],
                        radius: 6,
                        data: [datas.vexistence[7], datas.vconformance[7], datas.vopendata[7]]
                    },
                    {
                        label: datas.labelpemda[8],
                        backgroundColor: datas.colorlist[8],
                        radius: 6,
                        data: [datas.vexistence[8], datas.vconformance[8], datas.vopendata[8]]
                    },
                    {
                        label: datas.labelpemda[9],
                        backgroundColor: datas.colorlist[9],
                        radius: 6,
                        data: [datas.vexistence[9], datas.vconformance[9], datas.vopendata[9]]
                    },
                    {
                        label: datas.labelpemda[10],
                        backgroundColor: datas.colorlist[10],
                        radius: 6,
                        data: [datas.vexistence[10], datas.vconformance[10], datas.vopendata[10]]
                    },
                    {
                        label: datas.labelpemda[11],
                        backgroundColor: datas.colorlist[11],
                        radius: 6,
                        data: [datas.vexistence[11], datas.vconformance[11], datas.vopendata[11]]
                    },
                    {
                        label: datas.labelpemda[12],
                        backgroundColor: datas.colorlist[12],
                        radius: 6,
                        data: [datas.vexistence[12], datas.vconformance[12], datas.vopendata[12]]
                    },
                    {
                        label: datas.labelpemda[13],
                        backgroundColor: datas.colorlist[13],
                        radius: 6,
                        data: [datas.vexistence[13], datas.vconformance[13], datas.vopendata[13]]
                    },
                ]
            };
            var chartOptions = {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 1,
                        stepSize: 0.05
                    },
                    pointLabels: {
                        fontSize: 16
                    }
                },
                legend: {
                    position: 'left'
                },
                title: {
                    display: true,
                    text: 'Perbandingan Nilai Dimensi Open Data',
                    fontSize: 30
                }
            };
            var radarChart = new Chart(ctx, {
                type: 'radar',
                data: marksData,
                options: chartOptions
            });

        },
        error : function (data) {
            console.log("error")
        }
    })
})