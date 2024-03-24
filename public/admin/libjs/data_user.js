var nama_module = 'data_user';
var label_module = 'Data User';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;
var table = $('#table_' + nama_module);
var form_input_all = $(form_id + ' input');
var form_image_all = $(form_id + ' img');

var form_element = {};

form_element['input'] = ['#id', '#nik', '#username', '#password'];
form_element['select'] = ['#level_user'];
form_element['textarea'] = [];
form_element['imageInput'] = ['#profil'];
form_element['imagePreview'] = ['.preview_foto'];

var modal_label = $('#ModalLabel_' + nama_module);
var dashboard_title = $('.dash-title');
modal_label.html('Form ' + label_module);
dashboard_title.html(label_module);

var tipe_akun = ['admin', 'canvaser'];

$(document).ready(function () {
    loadTableDataUser(table);
});

function loadTableDataUser(table) {
    url = currentClass + 'table_' + nama_module;

    table.DataTable().destroy();

    table.DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": url,
            "type": "POST"
        },


        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
}

$(document).on('click', '.addBtn', function (e) {
    e.preventDefault();
    console.log('addbtn di klik');
    let url = currentClass + '/tambah_' + nama_module;

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });
    $(form_id + ' img').attr('src', base_url + 'images/none.png');
    $(form_id + ' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            tipe_akun = ['admin', 'canvaser'];
            if (res.status) {
                for (let i in tipe_akun) {
                    $(form_element['select'][0]).append('<option value="'+tipe_akun[i]+'">'+tipe_akun[i]+'</option>')
                }
                $('.saveBtn').html('Tambah');
                modal_form.modal('show');
            }
        }
    });
})

$(document).on('click', '.editBtn', function () {
    console.log('btn edit');
    let id = $(this).data('id');
    let url = currentClass + 'edit_' + nama_module + '/' + id;

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });
    $(form_id + ' img').attr('src', base_url + 'images/none.png');
    $(form_id + ' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                $(form_element['input'][0]).val(res.data.id);
                $(form_element['input'][1]).val(res.data.nik);
                $(form_element['input'][2]).val(res.data.username);
                $(form_element['input'][3]).val(res.data.password);

                for (let i in tipe_akun) {
                    $(form_element['select'][0]).prepend('<option value="'+tipe_akun[i]+'">'+tipe_akun[i]+'</option>')
                }

                $(form_element['select'][0]).val(res.data.tipe_akun);
                $('.saveBtn').html('Update');
                modal_form.modal('show');
            } else {

            }
        }
    });
});

$(document).on('click', '.saveBtn', function () {
    let url = currentClass + '/simpan_user_akun';
    let formData = new FormData($('#form_AkunPengguna')[0]);

    var isEmpty = false;
    
    $(form_id + " :input:not(#id, .opsional)").each(function() {
        if($(this).val() == "") {
            $(this).addClass("border-danger");
            console.log("Input ada yang kosong");
            isEmpty = true;
        } else {
            $(this).removeClass("border-danger");
            if (!isEmpty) {
                isEmpty = false;
            }
        }
    })
    
    if (!isEmpty) {
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
                modal_form.modal('hide');
                loadTableDataProgram(table);
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
    }
});

$(document).on('click', '.deleteBtn', function () {
    let id = $(this).data('id');
    let url = currentClass + '/hapus_user_akun/' + id;

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Batal",
        confirmButtonText: "Ya, hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url,
                data: "",
                dataType: "JSON",
                success: function (res) {
                    if (res.status) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: res.msg,
                            icon: "success"
                        });
                        loadTableDataUser(table);
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
});