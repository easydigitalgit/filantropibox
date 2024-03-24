var nama_module = 'daftar_box';
var label_module = 'Daftar Box';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;
var table = $('#table_' + nama_module);

var form_element = {};

form_element['input'] = ['#id', '#id_box', '#mitra_id'];
form_element['select'] = [];
form_element['textarea'] = [];
form_element['imageInput'] = ['#foto_box'];
form_element['imagePreview'] = ['.preview_box'];

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
                $(form_element['input'][1]).val(res.data.id_box);
                $(form_element['input'][2]).val(res.data.mitra_id);

                //images
                if (res.data.gambar) {
                    $(form_element['imagePreview'][0]).attr('src', base_url + 'images/daftar_box/' + res.data.gambar);
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