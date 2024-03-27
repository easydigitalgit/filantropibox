$(document).ready(function () {
    GetProgram();
});

function GetProgram() {
    url = currentClass + '/get_program';

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                list_program = '';
                for (i in response.data) {
                    list_program += '<div class="emPage__blog"><a class="item__card layer-lg" style="width: 100%;">'
                    + '<div class="cover_img"><img src="' + base_url + 'images/program/' + response.data[i].gambar +'" alt=""></div>'
                    + '<div class="card__body">'
                    + '<span id="tanggal">'+ response.data[i].mulai + ' - ' + response.data[i].berakhir + '</span>'
                    + '<h2 id="title" class="card_title">' + response.data[i].nama_program + '</h2>'
                    + '<p id="description" style="text-align: justify;">' + response.data[i].keterangan_program + '</p>'
                    + '</div></a></div>';
                }
                $("#program_section").append(list_program);
            }
        }
    });
}