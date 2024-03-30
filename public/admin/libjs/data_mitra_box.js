var nama_module = 'data_mitra_box';
var label_module = 'Data Mitra Box';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;
var table = $('#table_' + nama_module);

var form_element = {};

form_element['input'] = ['#id', '#nama_usaha', '#nama_penanggung_jawab', '#no_wa', '#latlong_lokasi', '#jenis_usaha', '#keterangan'];
form_element['select'] = [];
form_element['textarea'] = ['#alamat'];
form_element['imageInput'] = ['#foto_usaha', '#foto_penanggung_jawab'];
form_element['imagePreview'] = ['.preview_usaha', '.preview_penanggung_jawab'];

var modal_label = $('#ModalLabel_' + nama_module);
var dashboard_title = $('.dash-title');
modal_label.html('Form ' + label_module);
dashboard_title.html(label_module);

$(document).ready(function () {
    loadTableDataMitraBox(table);

    $(form_element['imageInput'][0]).on('change', function(e){
        var file = e.target.files[0];
        var reader = new FileReader();
    
        reader.onload = function(e){
            $(form_element['imagePreview'][0]).attr('src', e.target.result);
        }
    
        reader.readAsDataURL(file);
    });

    $(form_element['imageInput'][1]).on('change', function(e){
        var file = e.target.files[0];
        var reader = new FileReader();
    
        reader.onload = function(e){
            $(form_element['imagePreview'][1]).attr('src', e.target.result);
        }
    
        reader.readAsDataURL(file);
    });
});

function loadTableDataMitraBox(table) {
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
            if (res.status) {
                $('.saveBtn').html('Tambah');
                modal_form.modal('show');
            }
        }
    });
})

$(document).on('click', '.editBtn', function (e) {
    e.preventDefault();
    console.log('editbtn di klik');
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
                //input
                $(form_element['input'][0]).val(res.data.id);
                $(form_element['input'][1]).val(res.data.nama_usaha);
                $(form_element['input'][2]).val(res.data.nama_penanggung_jawab);
                $(form_element['input'][3]).val(res.data.no_wa);
                $(form_element['input'][4]).val(res.data.latlong_lokasi);
                $(form_element['input'][5]).val(res.data.jenis_usaha);
                $(form_element['input'][6]).val(res.data.keterangan);

                $(form_element['textarea'][0]).val(res.data.alamat);

                if (res.data.foto_usaha) {
                    $(form_element['imagePreview'][0]).attr('src', base_url + 'images/mitra_box/' + res.data.foto_usaha);
                }
                if (res.data.foto_penanggung_jawab) {
                    $(form_element['imagePreview'][1]).attr('src', base_url + 'images/mitra_box/' + res.data.foto_penanggung_jawab);
                }

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
                        loadTableDataMitraBox(table);
                    }, 1000);
                }
            });
        }
    });
});