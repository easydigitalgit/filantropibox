var nama_module = 'biodata_canvaser';
var label_module = 'Biodata Canvaser';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;
var table = $('#table_' + nama_module);

var form_element = {};

form_element['input'] = ['#id', '#id_akun', '#nama', '#kontak', '#email', '#alamat'];
form_element['select'] = [];
form_element['textarea'] = [];
form_element['imageInput'] = [];
form_element['imagePreview'] = [];

var modal_label = $('#ModalLabel_' + nama_module);
var dashboard_title = $('.dash-title');
modal_label.html('Form ' + label_module);
dashboard_title.html(label_module);


$(document).ready(function () {
    loadTableBiodataCanvaser(table);
});

function loadTableBiodataCanvaser(table) {
    url = currentClass + 'table_' + nama_module;

    table.DataTable().destroy();

    table.DataTable({
        "retrieve": true,
        "processing": true,
        "serverSide": true,
        "ordering": false,

        "ajax": {
            "url": url,
            "type": "POST"
        },


        "columnDefs": [
            {
                "targets": [0],
                "orderable": false
            },
            {
                "targets": [-1],
                "orderable": false
            }
        ]
    });
}

$(document).on('click', '.addBtn', function () {
    let url = currentClass + '/tambah_' + nama_module;

    console.log('addbtn di klik');

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });

    $(form_id+' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                $('.saveBtn').html('Tambah');
                modal_form.modal('show');
            }
        }
    });
})

$(document).on('click', '.editBtn', function () {
    
    console.log('editbtn di klik');

    let id = $(this).data('id');
    let url = currentClass + 'edit_' + nama_module + '/' + id;

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });

    $(form_id+' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                //input
                $(form_element['input'][0]).val(res.data.id);
                $(form_element['input'][1]).val(res.data.id_akun);
                $(form_element['input'][2]).val(res.data.nama);
                $(form_element['input'][3]).val(res.data.kontak);
                $(form_element['input'][4]).val(res.data.email);
                $(form_element['input'][5]).val(res.data.alamat);
                $(form_element['input'][6]).val(res.data.id_akun);

                // etc
                console.log(res);
                $('.saveBtn').html('Update');
                modal_form.modal('show');
            } else {

            }
        }
    });
})

$(document).on('click', '.saveBtn', function () {
    let url = currentClass + 'simpan_' + nama_module;
    let formData = new FormData($(form_id)[0]);
    
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
    let url = currentClass + 'hapus_' + nama_module + '/' + id;

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
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: res.msg,
                            icon: "error"
                        });
                    }
                    console.log(res);
                    setTimeout(function() {
                        loadTableBiodataCanvaser(table);
                    }, 1000);
                }
            });
        }
    });
});