var the_table;
var kelompok;
var kecamatan;
$(document).ready(function() {
    datatable(kelompok, kecamatan);
    $('select[name=nama_kecamatan]').select2();
    $('select[name=desa]').select2();
    $('select[name=nama_kelompok]').select2();
});

$("#btnCari").click(function() {
    if ($('#nama_kelompok').val()) {
        kelompok = $('#nama_kelompok').val();
    } else {
        kelompok = 0;
    }

    if ($('#nama_kecamatan').val()) {
        kecamatan = $('#nama_kecamatan').val();
    } else {
        kecamatan = 0;

    }

    $("#dataTable_Desa").DataTable().destroy();
    datatable(kelompok, kecamatan);
});


$("#btnPdf").click(function() {
    if ($('#nama_kelompok').val()) {
        kelompok = $('#nama_kelompok').val();
    } else {
        kelompok = 0;
    }

    if ($('#nama_kecamatan').val()) {
        kecamatan = $('#nama_kecamatan').val();
    } else {
        kecamatan = 0;

    }
    window.open(site_url + 'report/report_pengolahan/pdf/' + kelompok + "/" + kecamatan, '_blank');
});

$("#btnExcel").click(function() {
    if ($('#nama_kelompok').val()) {
        kelompok = $('#nama_kelompok').val();
    } else {
        kelompok = 0;
    }

    if ($('#nama_kecamatan').val()) {
        kecamatan = $('#nama_kecamatan').val();
    } else {
        kecamatan = 0;

    }
    window.open(site_url + 'report/report_pengolahan/excel/' + kelompok + "/" + kecamatan, '_blank');
});

function datatable(a = "0", b = "0") {

    $("#dataTable_Desa").DataTable({
        "processing": true,
        "serverSide": false,
        "stateSave": true,
        "searching": true,
        "pageLength": 50,
        "responsive": true,
        "stateDuration": 0,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        "ajax": {
            "url": site_url + 'api/report/Api_pengolahan/pengolahan/' + a + '/' + b,
            "type": "POST"
        },
        "columns": [{
                "data": "pengolahan_id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "nik" },
            { "data": "nama" },
            { "data": "nama_kelompok" },
            { "data": "Nama_Kecamatan" },
            { "data": "Nama_Desa" },
            {
                "data": "luas_bangunan_produksi",
                render: function(data, type, row, meta) {
                    return 'Bangunan Keseluruhan : ' + row.luas_bangunan_keseluruhan +
                        '<br> Bangunan Produksi : ' + data;
                }
            },
            { "data": "pengolahan_nilai_lokasi_pemasaran" },
            {
                "data": "harga_produksi",
                "render": function(data, type, row, meta) {
                    return 'Rp. ' + numeral(data).format('0,0');
                }
            },
            {
                "data": "volume_produksi",
                "render": function(data, type, row, meta) {
                    return numeral(data).format('0,0');
                }
            },
            {
                "data": "nilai_produksi",
                "render": function(data, type, row, meta) {
                    return 'Rp. ' + numeral(data).format('0,0');
                }
            },
        ]
    });
}