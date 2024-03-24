var nama_module = 'profil';

var form_id = '#form_' + nama_module;

var form_element = {};

form_element['input'] = ['#nama', '#email', '#kontak', '#alamat'];
form_element['select'] = [''];
form_element['textarea'] = [''];
form_element['imageInput'] = ['#profil'];
form_element['imagePreview'] = ['#preview_profil'];

$(document).ready(function () {
    GetProfil();
    $(form_element['imageInput'][0]).on('change', function(e){
        var file = e.target.files[0];
        var reader = new FileReader();
    
        reader.onload = function(e){
            $(form_element['imagePreview'][0]).attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    });
});

function GetProfil() {
    let url = currentClass + 'get_' + nama_module;

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });
    $(form_element['imagePreview'][0]).attr('src', base_url + 'images/user.png');

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                $(form_element['input'][0]).val(response.data[0].nama);
                $(form_element['input'][1]).val(response.data[0].email);
                $(form_element['input'][2]).val(response.data[0].kontak);
                $(form_element['input'][3]).val(response.data[0].alamat);

                if (response.data[0].profil) {
                    $(form_element['imagePreview'][0]).attr('src', base_url + 'images/user/' + response.data[0].profil);
                    $('._imgUser').attr('src', base_url + 'images/user/' + response.data[0].profil);
                }
            }
        }
    });
}

$(document).on('click', '.profile', function () {
    $(form_element['imageInput'][0]).click();
});

$(document).on('click', '.simpanBtn', function () {
    let url = currentClass + 'simpan_' + nama_module;
    let formData = new FormData($(form_id)[0]);
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",

    })
    .done(function (res) {
        if (res.status) {
            Swal.fire({
                title: "Berhasil!",
                text: res.msg,
                icon: "success"
            });
            GetProfil();
        } else {
            Swal.fire({
                title: "Gagal!",
                text: res.msg,
                icon: "warning"
            });
        }
    })
    .fail(function () { 
        Swal.fire({
            title: "Gagal!",
            text: 'Terjadi kesalahan dalam sistem!',
            icon: "error"
        });
    })
});