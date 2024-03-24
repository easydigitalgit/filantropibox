$(document).ready(function () {
    GetDashboardData();
});

function GetDashboardData() {
    url = currentClass + 'get_dashboard_data';

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                $('#capaian').html(response.capaian);
                $('#canvaser').html(response.canvaser);
                $('#jumlah_box').html(response.jumlah_box);
                $('#program').html(response.program);
            } else {
                console.log("empty");
            }
        }
    });
}