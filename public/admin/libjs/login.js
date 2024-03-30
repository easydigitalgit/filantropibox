$(document).ready(function () {
    $('#btnLogin').on('click', function (e) {
        e.preventDefault();
        var url = currentClass + '/do_login';
        var formData = new FormData($('#form_login')[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,

        })
        .done(function(res) {
            if(res.status == false) {
                $('#login-validasi').addClass('alert alert-danger');
                $('#login-validasi').html(res.msg);
            } else {
                $('#login-validasi').removeClass('alert-warning alert-danger');

                $('#login-validasi').html('Login Berhasil!');
                $('#login-validasi').addClass('alert alert-success');
                
                window.location.href = site_url + '/admin/dashboard';
            }
        })
        .fail(function () {
            console.log('error');
            $('#login-validasi').html('Terjadi kesalahan dalam proses login!');
            $('#login-validasi').addClass('alert alert-warning');
        })
        .always(function() {
            console.log("complete");
        })
    });
});