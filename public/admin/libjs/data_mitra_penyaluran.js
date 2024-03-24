var nama_module = 'data_mitra_penyaluran';
var label_module = 'Data Mitra Penyaluran';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;
var table = $('#table_' + nama_module);

var form_element = {};

form_element['input'] = ['#id', '#nama_mitra', '#alamat', '#latlong_lokasi', '#no_wa', '#nama_penanggung_jawab'];
form_element['select'] = ['#jenis_mitra'];
form_element['textarea'] = ['#keterangan'];
form_element['imageInput'] = ['#foto_mitra', '#foto_lokasi'];
form_element['imagePreview'] = ['.preview_mitra', '.preview_lokasi'];

var modal_label = $('#ModalLabel_' + nama_module);
var dashboard_title = $('.dash-title');
modal_label.html('Form ' + label_module);
dashboard_title.html(label_module);

//Select Value
var jenis_mitra = ['Organisasi', 'Orang'];


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

    $(form_element['select'][0]).on('change', function () {
        if ($(form_element['select'][0]).val() === 'Organisasi') {
            $('.organisasi').removeClass('d-none');
        } else {
            $('.organisasi').addClass('d-none');
        }
    });
});

function loadTableDataMitraBox(table) {
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

$(document).on('click', '.addBtn', function (e) {
    e.preventDefault();
    console.log('addbtn di klik');

    let url = currentClass + '/tambah_' + nama_module;

    $(form_id + ' :input').each(function() {
        $(this).val('');
    });

    $(form_id + ' img').attr('src', base_url + 'images/none.png');

    $(form_id+' option:not([value=""])').remove();

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (res) {
            if (res.status) {
                for (let i in jenis_mitra) {
                    $(form_element['select'][0]).append('<option value="'+jenis_mitra[i]+'">'+jenis_mitra[i]+'</option>');
                };
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
                $(form_element['input'][1]).val(res.data.nama_mitra);
                $(form_element['input'][2]).val(res.data.alamat_mitra);
                $(form_element['input'][3]).val(res.data.latlong_lokasi);
                $(form_element['input'][4]).val(res.data.no_wa);
                $(form_element['input'][5]).val(res.data.nama_penanggung_jawab);

                //select
                for (let i in jenis_mitra) {
                    $(form_element['select'][0]).append('<option value="'+jenis_mitra[i]+'">'+jenis_mitra[i]+'</option>');
                };
                $(form_element['select'][0]).val(res.data.jenis_mitra);

                if (res.data.jenis_mitra === 'Organisasi') {
                    $('.organisasi').removeClass('d-none');
                } else {
                    $('.organisasi').addClass('d-none');
                }

                //textarea
                $(form_element['textarea'][0]).val(res.data.keterangan);

                //images
                if (res.data.foto_mitra) {
                    $(form_element['imagePreview'][0]).attr('src', base_url + 'images/mitra_penyaluran/' + res.data.foto_mitra);
                }
                if (res.data.foto_lokasi) {
                    $(form_element['imagePreview'][1]).attr('src', base_url + 'images/mitra_penyaluran/' + res.data.foto_lokasi);
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