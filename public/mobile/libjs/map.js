$(document).ready(function () {
    var map = L.map('map');
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    navigator.geolocation.getCurrentPosition(success, error);

    function success(pos){
        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;

        map.setView([lat, lng], 10);
    }

    function error(err){
        if (err.code === 1){
            alert("Mohon aktifkan lokasi anda");
        } else {
            alert("Tidak bisa mendapatkan lokasi anda");
        }
    }

    $("#get_location").on('click', function () {
        GetCurrentLocation(map);
    });
});

function GetCurrentLocation(map) {

    navigator.geolocation.getCurrentPosition(success, error);


    function success(pos){
        const lat = pos.coords.latitude;
        const lng = pos.coords.longitude;
        // const accuracy = pos.coords.accuracy;

        var currentLocation = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var marker = L.marker([lat, lng], {icon: currentLocation}).addTo(map);
        var mitra = L.marker([0, 0]).addTo(map);

        marker.bindPopup("Anda").openPopup();

        map.setView([lat, lng], 15);
        map.invalidateSize();
    }

    function error(err){
        if (err.code === 1){
            alert("Mohon aktifkan lokasi anda");
        } else {
            alert("Tidak bisa mendapatkan lokasi anda");
        }
    }
}

// $(document).ready(function () {
//     var map = L.map('map');

//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         maxZoom: 19,
//         attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//     }).addTo(map);

//     $('#get_location').on('click', function () {
//         navigator.geolocation.getCurrentPosition(success, error);
//     });

//     let marker, circle;

//     function success(pos){
//         const lat = pos.coords.latitude;
//         const lng = pos.coords.longitude;
//         const accuracy = pos.coords.accuracy;

//         marker = L.marker([lat, lng]).addTo(map);
//         circle = L.circle([lat, lng], {radius: accuracy}).addTo(map);

//         map.fitBounds(circle.getBounds());
//     }

//     function error(err){
//         if (err.code === 1){
//             alert("Mohon aktifkan lokasi anda");
//         } else {
//             alert("Tidak bisa mendapatkan lokasi anda");
//         }
//     }
// });