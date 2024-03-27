let nama_module = 'box';

let modal_setor = $('#modal_setor_' + nama_module);
let modal_tambah = $('#modal_tambah_' + nama_module);
let form_setor = '#form_setor_' + nama_module;
let form_tambah = '#form_tambah_' + nama_module;

let form_setor_element = {};

form_setor_element['input'] = ['#no_box', '#nominal'];
form_setor_element['select'] = [];
form_setor_element['textarea'] = ['#keterangan'];
form_setor_element['imageInput'] = [];
form_setor_element['imagePreview'] = [];

let form_tambah_element = {};

form_tambah_element['input'] = ['#nama_mitra', '#box_1'];
form_tambah_element['select'] = [];
form_tambah_element['textarea'] = [];
form_tambah_element['imageInput'] = ['#foto_box_1'];
form_tambah_element['imagePreview'] = ['#upload_foto_box_1'];

let map_mitra_container = ".map_mitra_container";
let map_mitra = "map_mitra";
let my_position = null;

let currentLocation = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

let mitraLocation = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

$(document).ready(function(){
    TambahPilihanMitra();
    BuildMap(map_mitra_container, map_mitra);

    $("#tambah_input_box").on('click', function () {
        var box_input = '<div class="form-group with_icon" id="box' + $("#jumlah_box").val() + '"><label>Box '+ $("#jumlah_box").val() +'</label><div class="input_group"><input type="text" id="box_' + $("#jumlah_box").val() + '" name="box_' + $("#jumlah_box").val() + '" class="form-control" placeholder="Masukkan Nomor dari Box" required><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg></div></div><div class="invalid-feedback box' + $("#jumlah_box").val() +'-error"></div></div>';
        var foto_box_input = '<div id="foto_box' + $("#jumlah_box").val() + '"><label>Foto Box ' + $("#jumlah_box").val() + '</label><div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto" id="upload_foto_box_' + $("#jumlah_box").val() + '" style="border: 5px dashed; border-color: rgba(65, 189, 131, 0.3);">Masukkan Foto</div><div class="input-group"><input type="file" class="border-none foto_box" id="foto_box_' + $("#jumlah_box").val() + '" name="foto_box_' + $("#jumlah_box").val() + '" style="display:none;"></div><div class="invalid-feedback d-block d-none">Foto Box tidak boleh kosong</div></div>';
        $(".input_nomor_box").append(box_input);
        $(".input_foto_box").append(foto_box_input);
    });

    $("#kurang_input_box").on('click', function () {
        var input_box = Number($("#jumlah_box").val()) + 1;
        $("#box" + input_box).remove();
        $("#foto_box" + input_box).remove();
    });
});

function TambahPilihanMitra() {
    var list_mitra = $('#list-mitra');

    $('#nama_mitra').on('input', function () {
        var input = $('#nama_mitra').val();

        var whitelist = /^[a-z0-9%.:_@]+$/i;

        list_mitra.empty();

        if (whitelist.test(input)) {
            var url = currentClass + "/tambah_pilihan_mitra/" + input;

            $.ajax({
                type: "POST",
                url: url,
                data: "",
                dataType: "JSON",
                success: function (response) {
                    if (response.status) {
                        list_mitra.append(response.data);
                        list_mitra.css('display', 'block');
                    } else {
                        list_mitra.hide();
                    }
                }
            });
        } else {
            list_mitra.hide();
        }
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('#nama_mitra').length) {
            list_mitra.hide();
        }
    });
}

function BuildMap(map_container ,map_id) {
    $(map_container).html("<div id='"+ map_id +"'></div>")
    var map = new L.map(map_id);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    MapGetCurrentPosition(map);
    MapGetMitraLocation(map);
}

function MapGetCurrentPosition(map) {
    navigator.geolocation.getCurrentPosition(success, error);

    function success(pos){
        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;

        if (my_position !== null) {
            map.removeLayer(my_position);
        }

        my_position = L.marker([lat, lng], {icon: currentLocation}).addTo(map);
        my_position.bindPopup("Anda").openPopup();

        map.setView([lat, lng], 15);

        console.log("Map Loaded");
    }

    function error(err){
        if (err.code === 1){
            alert("Mohon aktifkan lokasi anda");
        } else {
            alert("Tidak bisa mendapatkan lokasi anda");
        }
    }
}

function MapGetMitraLocation(map) {
    let url = currentClass + '/lokasi_mitra';

    $.ajax({
        type: "POST",
        url: url,
        data: "",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                for (i in response.data) {
                    let latlng = response.data[i].latlong_lokasi.split(", ");
                    L.marker([latlng[0], latlng[1]], {icon: mitraLocation}).addTo(map);
                    // console.log(latlng[0] + ", " + latlng[1]);
                }
            }
        }
    });
}

function ValidateInput(input, error_container, error_msg)
{
    var response = false;
    for (let i = 0; i < input.length; i++) {
        if ($(input[i]).val() == ""){
            $(input[i]).addClass("is-invalid");
            $(error_container[i]).html(error_msg[i]);
            response = true;
        } else {
            $(input[i]).removeClass("is-invalid");
            $(error_container[i]).html("");
            if (response != true) {
                response = false;
            }
        }
    }
    return response;
}

$(document).on('click', '.upload_foto', function () {
    $(this).siblings(".input-group").find("input").click();
});

$(document).on('change', '.foto_box', function () {
    var fileName = $(this).prop('files')[0].name;
    $(this).parent().siblings(".upload_foto").text(fileName);
});

$(document).on('click', '.list-item', function () {
    var selected = $(this).find('p').text();
    var id = $(this).find('div').text();

    $("#id").val(id);
    $('#nama_mitra').val(selected);
});

$(document).on('click', '.tambah_btn', function () {
    var input_box = Number($("#jumlah_box").val());

    if (input_box > 1) {
        for (let i = 2; i <= input_box; i++) {
            $("#box" + i).remove();
            $("#foto_box" + i).remove();
        }
    }

    $(form_tambah_element['input'][0]).val("");
    $(form_tambah_element['input'][1]).val("");
    $(form_tambah_element['imageInput'][0]).val("");
    $(form_tambah_element['imagePreview'][0]).text("Masukkan Foto Box");
    $("#jumlah_box").val("1");
});

$(document).on('click', '.setor_btn', function () {
    $(form_setor_element['input'][0]).val("");
    $(form_setor_element['input'][1]).val("");
    $(form_setor_element['textarea'][0]).val("");
});

$(document).on('change', '#nama_mitra', function () {
    $('#id').val("");
});

// button action

$(document).on('click', '.setorBox', function () {
    let url = currentClass + '/setor_' + nama_module;
    let formData = new FormData($(form_setor)[0]);

    console.log("Setor Box");

    var isEmpty = false;

    $(form_setor + " :input:not(.opsional)").each(function() {
        if($(this).val() == "") {
            $(this).parent().siblings('.invalid-feedback').removeClass("d-none");
            $(this).addClass("is-invalid");
            console.log("Input ada yang kosong");
            isEmpty = true;
        } else {
            $(this).parent().siblings('.invalid-feedback').addClass("d-none");
            $(this).removeClass("is-invalid");
            if (!isEmpty) {
                isEmpty = false;
            }
        }
    })

    if (!isEmpty) {
        simpanBox(formData, url, modal_setor);
    }
});

$(document).on('click', '.simpanBox', function () {
    let url = currentClass + '/tambah_' + nama_module;
    let formData = new FormData($(form_tambah)[0]);

    console.log("Simpan Box");

    var isEmpty = false;

    $(form_tambah + " :input:not(.opsional)").each(function() {
        if($(this).val() == "") {
            $(this).parent().siblings('.invalid-feedback').removeClass("d-none");
            $(this).addClass("is-invalid");
            console.log("Input ada yang kosong");
            isEmpty = true;
        } else {
            $(this).parent().siblings('.invalid-feedback').addClass("d-none");
            $(this).removeClass("is-invalid");
            if (!isEmpty) {
                isEmpty = false;
            }
        }
    })

    if (!isEmpty) {
        simpanBox(formData, url, modal_tambah);
    }
});

function simpanBox(formData, url, modal) {
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
            modal.modal('hide');
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