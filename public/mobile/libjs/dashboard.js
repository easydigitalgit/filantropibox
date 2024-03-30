
$(document).ready(function () {
    GetFotoProgram();
    GetDashboardData();
});

$(document).on('click', '#history_btn', function () {
    console.log("History");
    LoadHistoryList();
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

function GetFotoProgram() {
    url = currentClass + 'get_program';
    
    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            let insert_foto = '';
            if (response.status) {
                for (i in response.data) {
                    insert_foto += '<div class="swiper-slide" style="background:transparent; opacity: 0.9;"><img src="' + base_url + 'images/program/' + response.data[i].gambar + '" width="100%" height="200px" alt=""></div>';
                }

                $(".swiper-wrapper").append(insert_foto);

                const swiper = new Swiper(".swiper", {
                    loop: true,
                    speed: 600,
                    parallax: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    // pagination: {
                    //     el: '.program-swiper-pagination',
                    //     clickable: true,
                    // },
                });
            }
        }
    });
}

function LoadHistoryList() {
    url = currentClass + 'get_history';

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                let tanggal = '';
                let history_list = '';
                for (i in response.data) {
                    if (response.data[i].tanggal != tanggal) {
                        tanggal = response.data[i].tanggal;
                        history_list += '<span class="color-text border-snow" style="padding: 15px 20px;display: inline-flex; border-bottom: 1px solid;width:100%;">'+ response.data[i].tanggal +'</span>';
                    }

                    history_list += '<li><a class="item-link"><div class="group"><span class="path__name">'
                    + response.data[i].nama + '</span></div><div class="group"><span class="color-green text-end" style="white-space: nowrap;">+ Rp '
                    + response.data[i].jumlah + '</span></div></a></li>';
                }
                $(".history-list").append(history_list);
            }
        }
    });
}