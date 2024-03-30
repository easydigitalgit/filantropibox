let nama_module = 'dashboard';
let label_module = 'Dashboard';

let modal_form = $('#modal_' + nama_module);
let table = $('#table_capaian_mitra');

let card_jumlah = ['#capaian', '#canvaser', '#jumlah_box', '#program'];

let dashboard_title = $('.dash-title');
dashboard_title.html(label_module);

$(document).ready(function () {
    chartCapaianMitra = new Chart(document.getElementById("chart"), { 
        type: 'bar',
        // height: 350,
        data: {
            // labels: ["17-25", "26-35", "36-45", "46-55", "56-65",">65"],
            label : [],
            datasets: [{
                label: "Capaian Mitra",
                 //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c45870"],
                 //data: [50,35,60,25,35,30],
                data: [],
                borderColor:  'rgb(54, 162, 235)',
                backgroundColor: 'rgba(54, 162, 235,0.1)',
                borderWidth: 2,
                borderRadius: 2
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Jumlah Capaian per Mitra'
            },
            indexAxis: 'y',
            plugins:{
                datalabels:{
                    anchor:'end',
                    align:'end',
                    labels:{
                        value:{
                            color:'white'
                        }
                    }
                }
            }
        }
    })

    ajax_chartCapaianMitra(chartCapaianMitra);
    loadTableCapaianMitra();
    LoadDataDashboard();
});

function ajax_chartCapaianMitra(chart) {
    let url = currentClass + 'chart_capaian_mitra';
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                chart.data.labels = res.labels;
                chart.data.datasets[0].data = res.data.capaian;
                chart.update();
            }
        }
    });
}

function loadTableCapaianMitra() {
    url = currentClass + 'table_capaian_mitra';

    table.DataTable().destroy();

    table.DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "sDom": 't',

        "ajax": {
            "url": url,
            "type": "POST"
        },
    });
}

function LoadDataDashboard() {
    url = currentClass + 'get_dashboard_data';

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                $(card_jumlah[0]).html(response.capaian);
                $(card_jumlah[1]).html(response.canvaser);
                $(card_jumlah[2]).html(response.jumlah_box);
                $(card_jumlah[3]).html(response.program);
            }
        }
    });
}

