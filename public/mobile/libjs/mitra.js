var nama_module = 'mitra';

var modal_form = $('#modal_' + nama_module);
var form_id = '#form_' + nama_module;

var form_element = {};

form_element['input'] = ['#nama_usaha', '#nama_penanggung_jawab', '#no_wa', '#jenis_usaha', '#latlong_lokasi'];
form_element['select'] = ['#kategori'];
form_element['textarea'] = ['#alamat', '#keterangan'];
form_element['imageInput'] = ['#foto_usaha', '#foto_penanggung_jawab'];
form_element['imagePreview'] = ['#preview_foto_usaha', '#preview_foto_penanggung_jawab', '#preview_foto_box_1'];

var map_lokasi_container = ".map_lokasi_container";
var map_mitra_container = ".map_mitra_container";
var map_lokasi = "map_lokasi";
var map_mitra = "map_mitra";
var my_position = null;

var currentLocation = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

var mitraLocation = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

$(document).ready(function () {
    BuildMap(map_mitra_container ,map_mitra);

    $("#tambah_input_box").on('click', function () {
        var box_input = '<div class="form-group with_icon" id="box' + $("#jumlah_box").val() + '"><label>Box '+ $("#jumlah_box").val() +'</label><div class="input_group"><input type="text" id="box_' + $("#jumlah_box").val() + '" name="box_' + $("#jumlah_box").val() + '" class="form-control" placeholder="Masukkan Nomor dari Box" required><div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg></div></div><div class="invalid-feedback d-block d-none">Nomor Box tidak boleh kosong</div></div>';
        var foto_box_input = '<div id="foto_box' + $("#jumlah_box").val() + '"><label>Foto Box ' + $("#jumlah_box").val() + '</label><div class="d-flex justify-content-center bg-white py-2 mb-3 upload_foto" id="upload_foto_box_' + $("#jumlah_box").val() + '" style="border: 5px dashed; border-color: rgba(65, 189, 131, 0.3);">Masukkan Foto Box</div><div class="input-group"><input type="file" class="border-none foto_box" id="foto_box_' + $("#jumlah_box").val() + '" name="foto_box_' + $("#jumlah_box").val() + '" style="display:none;"></div><div class="invalid-feedback d-block d-none">Foto Box tidak boleh kosong</div></div>';
        $(".input_nomor_box").append(box_input);
        $(".input_foto_box").append(foto_box_input);
    });
    $("#kurang_input_box").on('click', function () {
        var input_box = Number($("#jumlah_box").val()) + 1;
        $("#box" + input_box).remove();
        $("#foto_box" + input_box).remove();
    });
});

function BuildMap(map_container ,map_id) {
    $(map_container).html("<div id='"+ map_id +"'></div>")
    var map = new L.map(map_id);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    if (map_id == "map_lokasi") {
        map.locate({setView: true, maxZoom: 10});
        $("#get_location").on('click', function () {
            MapGetCurrentPosition(map, map_id);
        });
        map.on('click', function(e) {
            if (my_position !== null) {
                map.removeLayer(my_position);
            }
            my_position = L.marker([e.latlng.lat, e.latlng.lng], {icon: currentLocation}).addTo(map);
            my_position.bindPopup("Anda").openPopup();

            var latlng = my_position.getLatLng();
            $(form_element['input'][4]).val(latlng.lat + ", " + latlng.lng);
        })
    } else {
        MapGetCurrentPosition(map);
        MapGetMitraLocation(map);
    }
}

function MapGetCurrentPosition(map, map_id) {
    navigator.geolocation.getCurrentPosition(success, error);

    function success(pos){
        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;
        // const accuracy = pos.coords.accuracy;

        if (my_position !== null) {
            map.removeLayer(my_position);
        }

        my_position = L.marker([lat, lng], {icon: currentLocation}).addTo(map);
        my_position.bindPopup("Anda").openPopup();

        if (map_id == "map_lokasi") {
            $(form_element['input'][4]).val(lat + ", " + lng);
        }

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
    let url = currentClass + '/lokasi_' + nama_module;

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

$(document).on('click', '.tambah_btn', function () {
    BuildMap(map_lokasi_container, map_lokasi);
    var input_box = Number($("#jumlah_box").val());

    if (input_box > 1) {
        for (let i = 2; i <= input_box; i++) {
            $("#box" + i).remove();
            $("#foto_box" + i).remove();
        }
    }

    $(form_id + " :input").each(function() {
        $(this).val("");
    })

    $(form_element['imagePreview'][0]).text("Masukkan Foto Usaha");
    $(form_element['imagePreview'][1]).text("Masukkan Foto Penanggung Jawab");
    $(form_element['imagePreview'][2]).text("Masukkan Foto Box");
    $("#jumlah_box").val("1");
});

$(document).on('click', '.upload_foto', function () {
    $(this).siblings(".input-group").find("input").click();
});

$(document).on('change', '.foto_box', function () {
    var fileName = $(this).prop('files')[0].name;
    $(this).parent().siblings(".upload_foto").text(fileName);
});

$(document).on('click', '.simpanBtn', function () {
    let url = currentClass + '/tambah_' + nama_module;
    let formData = new FormData($(form_id)[0]);

    console.log("Simpan Mitra");

    var isEmpty = false;

    $(form_id + " :input:not(.opsional)").each(function() {
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
        simpanBox(formData, url);
    }
});

function simpanBox(formData, url) {
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