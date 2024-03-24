var nama_module = 'data_mitra_box';
var table = '#table_' + nama_module;

$(document).ready(function () {
    GetTable($(table));
});

function GetTable(table) {
    url = currentClass + 'table_' + nama_module;

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