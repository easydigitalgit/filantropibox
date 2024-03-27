let nama_module = 'ubah_password';

let form_id = '#form_' + nama_module;

current_password = $("#current_password");
new_password = $("#new_password");
confirm_password = $("#confirm_password");

confirmed = false;

$(document).ready(function () {
    
});

$(document).on('click', '.ubahBtn', function () {
    url = currentClass + 'ubah_password';
    let formData = new FormData($(form_id)[0]);

    if (current_password.val() == "") {
        current_password.addClass("is-invalid");
    }
    else if (current_password.val() != "" && confirmed) {
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
                }).then(() => {
                    window.location.href = site_url + '/mobile/profil';
                });
            } else {
                Swal.fire({
                    title: "Gagal!",
                    text: res.msg,
                    icon: "warning"
                }).then(() => {
                    if (res.wrong) {
                        current_password.addClass("is-invalid");
                    };
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
    }
});

$(document).on('input', '#confirm_password', function () {
    if (new_password.val() !== confirm_password.val() || $(this).val() == "") {
        $('.unmatched').removeClass('d-none')
        $('.matched').addClass('d-none')
        $(this).addClass("border-danger");
        confirmed = false;
    }
    if (new_password.val() === confirm_password.val()) {
        $('.unmatched').addClass('d-none')
        $('.matched').removeClass('d-none')
        $(this).removeClass("border-danger");
        confirmed = true;
    }
});