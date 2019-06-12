function average(data){
    var sum = data.reduce(function(sum, value){
        return sum + value;
    }, 0);

    var avg = sum / data.length;
    return avg.toFixed(2);
}
$().ready(function () {
    $.ajax({
        url: "http://localhost/metriks",
        type: "GET",
        success: function (data) {
            var datas = {
                labelPemda : [],
                vaccss : [],
                vdiscov : [],
                vcont : [],
                vrig : [],
                vpres : [],
                vdate : [],
                vaccsurl : [],
                vconturl : [],
                vdformat : [],
                vlicense : [],
                vfilefor : [],
                vcontEmail : [],
                vopenfor : [],
                vmachineread: [],
                vopenlicense : []
            };
            var len = data.length;
            for (var i = 0;i<len;i++){
                // console.log(data[i].nama_pemda)
                datas.labelPemda.push(data[i].nama_pemda)
                datas.vaccss.push(parseFloat(data[i].access))
                datas.vdiscov.push(parseFloat(data[i].discovery))
                datas.vcont.push(parseFloat(data[i].contact))
                datas.vrig.push(parseFloat(data[i].right))
                datas.vpres.push(parseFloat(data[i].preservation))
                datas.vdate.push(parseFloat(data[i].date))
                datas.vaccsurl.push(parseFloat(data[i].accessurl))
                datas.vconturl.push(parseFloat(data[i].contacturl))
                datas.vdformat.push(parseFloat(data[i].dateformat))
                datas.vlicense.push(parseFloat(data[i].license))
                datas.vfilefor.push(parseFloat(data[i].fileformat))
                datas.vcontEmail.push(parseFloat(data[i].contactemail))
                datas.vopenfor.push(parseFloat(data[i].openformat))
                datas.vmachineread.push(parseFloat(data[i].machineread))
                datas.vopenlicense.push(parseFloat(data[i].openlicense))
            }
            // console.log(datas.vaccss);
            var ctx = $("#polarchart");

            var avacc = average(datas.vaccss);
            var avdis = average(datas.vdiscov);
            var avcont = average(datas.vcont);
            var avrig = average(datas.vrig);
            var avpres = average(datas.vpres);
            var avdate = average(datas.vdate);
            var avaccurl = average(datas.vaccsurl);
            var avconturl = average(datas.vconturl);
            var avdfor = average(datas.vdformat);
            var avlicen = average(datas.vlicense);
            var avfilefor = average(datas.vfilefor);
            var avcontem = average(datas.vcontEmail);
            var avopenfor = average(datas.vopenfor);
            var avmachine = average(datas.vmachineread);
            var avopenlic = average(datas.vopenlicense);



            var d = [avacc,avdis,avcont,
                avrig,avpres,avdate,
                avaccurl, avconturl, avdfor,
                avlicen, avfilefor, avcontem,
                avopenfor, avmachine, avopenlic];
            var l  = ["Access", "Discovery", "Contact", "Rigth",
                 "Preservation", "Date", "Access URL", "Contact URL", "Date Format",
                     "License", "File Format","Contact Email", "Open Format",
                    "Machine Read", "Open License"]
            console.log(l + " " + d);
            var assessData = {
                labels: l,
                datasets: [{
                    data: d ,
                    backgroundColor: [
                        "rgba(255, 0, 0, 0.5)",
                        "rgba(100, 255, 0, 0.5)",
                        "rgba(200, 50, 255, 0.5)",
                        "rgba(0, 100, 255, 0.5)",
                        "rgba(72,3,255,0.5)",
                        "rgba(255,126,34,0.5)",
                        "rgba(118,8,132,0.5)",
                        "rgba(0,196,178,0.5)",
                        "rgba(23,196,100,0.5)",
                        "rgba(232,0,71,0.74)",
                        "rgba(6,27,232,0.58)",
                        "rgba(242,90,255,0.62)",
                        "rgba(81,255,32,0.68)",
                        "rgba(48,255,236,0.79)",
                        "rgba(132,26,45,0.65)"
                    ]
                }]
            };
            var polarAreaChart = new Chart(ctx, {
                type: 'polarArea',
                data: assessData,
                options: {
                    title: {
                        display: true,
                        text: 'Perbandingan Nilai Setiap Sub dimensi',
                        fontSize: 20
                    },
                    legend: {
                        display: false
                    }
                }
            });
        },
        error: function (data) {
            console.log("error");
        }

    })
})


















