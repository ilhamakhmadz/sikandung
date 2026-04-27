var tableAlat;
var nameFile;
var dataAlat = [];
var dataBahanUtama = [];
var dataBahanLain = [];
var dataProduksi = [];
var dataPerijinan = [];



$(document).ready(function() {

    $('#nik').keyup(function() {
        if ($('#nik').val().length == 16) {
            valid($('#nik').val());
        }
    });
    $('#jenis_produk_bahan').select2();
    $('#jenis_nilai_produksi').select2();

    // Fungsi Menambahkan data satuan
    $('select[name=kecamatan]').select2();
    $('select[name=kecamatan]').on('change', function() {
        $('select[name=desa]').empty();
        $('select[name=desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kecamatan]').val(),
                dataType: 'json',
                data: function(param) {
                    return {
                        delay: 0.3,
                        q: param.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data.items || data, function(obj) {
                            return {
                                id: obj.Kd_Desa,
                                text: obj.text,
                            }
                        })
                    }
                },
                cache: false,
                minimumInputLength: 3,

            }
        });
    });

    $('#jenis_satuan').select2();
    $('#tahun_perolehan').select2();
    $('#jenis_pemodalan').select2();
    $('#sumber_pelatihan').select2();


    $('#tahun_perolehan_bantuan').select2();
    $('#jenis_bantuan').select2();

    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            // BahanUtama
            var namaBahanUtama = _.map($('.namaBahanUtama'), function(el) {
                return $(el).val();
            });
            var nilaiBahanUtama = _.map($('.nilaiBahanUtama'), function(el) {
                return $(el).val();
            });
            var asalBahanUtama = _.map($('.asalBahanUtama'), function(el) {
                return $(el).val();
            });
            var valumeBahanUtama = _.map($('.valumeBahanUtama'), function(el) {
                return $(el).val();
            });
            var hargaBahanUtama = _.map($('.hargaBahanUtama'), function(el) {
                return $(el).val();
            });

            // BahanLain
            var namaBahanLain = _.map($('.namaBahanLain'), function(el) {
                return $(el).val();
            });
            var nilaiBahanLain = _.map($('.nilaiBahanLain'), function(el) {
                return $(el).val();
            });
            var valumeBahanLain = _.map($('.valumeBahanLain'), function(el) {
                return $(el).val();
            });
            var hargaBahanLain = _.map($('.hargaBahanLain'), function(el) {
                return $(el).val();
            });


            // Alat
            var namaProdukAlat = _.map($('.namaProdukAlat'), function(el) {
                return $(el).val();
            });
            var volumeProdukAlat = _.map($('.volumeProdukAlat'), function(el) {
                return $(el).val();
            });
            var hargaProdukAlat = _.map($('.hargaProdukAlat'), function(el) {
                return $(el).val();
            });
            var nilaiProdukAlat = _.map($('.nilaiProdukAlat'), function(el) {
                return $(el).val();
            });


            // Bahan
            var namaProduksi = _.map($('.namaProduksi'), function(el) {
                return $(el).val();
            });
            var lokasiPemasaran = _.map($('.lokasiPemasaran'), function(el) {
                return $(el).val();
            });
            var volumeProduksi = _.map($('.volumeProduksi'), function(el) {
                return $(el).val();
            });
            var hargaProduksi = _.map($('.hargaProduksi'), function(el) {
                return $(el).val();
            });
            var nilaiProduksi = _.map($('.nilaiProduksi'), function(el) {
                return $(el).val();
            });

            // PERIJINAN
            var jenisPerijinan = _.map($('.jenisPerijinan'), function(el) {
                return $(el).val();
            });

            var noPerijinan = _.map($('.noPerijinan'), function(el) {
                return $(el).val();
            });

            var tglPerijinan = _.map($('.tglPerijinan'), function(el) {
                return $(el).val();
            });


            dataAlat = _.map(dataAlat, function(o, i) {
                o.namaProdukAlat = namaProdukAlat[i];
                o.volumeProdukAlat = volumeProdukAlat[i];
                o.hargaProdukAlat = hargaProdukAlat[i];
                o.nilaiProdukAlat = nilaiProdukAlat[i];
                return o;
            });

            dataProduksi = _.map(dataProduksi, function(o, i) {
                o.namaProduksi = namaProduksi[i];
                o.lokasiPemasaran = lokasiPemasaran[i];
                o.volumeProduksi = volumeProduksi[i];
                o.hargaProduksi = hargaProduksi[i];
                o.nilaiProduksi = nilaiProduksi[i];
                return o;
            });

            dataBahanLain = _.map(dataBahanLain, function(o, i) {
                o.namaBahanLain = namaBahanLain[i];
                o.nilaiBahanLain = nilaiBahanLain[i];
                o.valumeBahanLain = valumeBahanLain[i];
                o.hargaBahanLain = hargaBahanLain[i];
                return o;
            });

            dataBahanUtama = _.map(dataBahanUtama, function(o, i) {
                o.namaBahanUtama = namaBahanUtama[i];
                o.nilaiBahanUtama = nilaiBahanUtama[i];
                o.asalBahanUtama = asalBahanUtama[i];
                o.valumeBahanUtama = valumeBahanUtama[i];
                o.hargaBahanUtama = hargaBahanUtama[i];
                return o;
            });

            dataPerijinan = _.map(dataPerijinan, function(o, i) {
                o.jenisPerijinan = jenisPerijinan[i];
                o.noPerijinan = noPerijinan[i];
                o.tglPerijinan = tglPerijinan[i];
                return o;
            });
            // FORM INPUT PERSONAL DATA
            formInput.append('user_id', $('#user_id').val());
            formInput.append('tanggal_kuesioner', $('#tanggal_kuesioner').val());
            formInput.append('nama_responden', $('#nama_responden').val());
            formInput.append('petugas_enumelator', $('#petugas_enumelator').val());
            formInput.append('kelompok', $('#kelompok').val());
            formInput.append('pendidikan', $('#pendidikan').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('nik', $('#nik').val());
            formInput.append('jabatan', $('#jabatan').val());
            formInput.append('umur', $('#umur').val());
            formInput.append('telepon', $('#telepon').val());
            formInput.append('email', $('#email').val());
            formInput.append('kd_kabupaten', $('#kd_kabupaten').val());
            formInput.append('kecamatan', $('#kecamatan').val());
            formInput.append('desa', $('#desa').val());
            formInput.append('rt', $('#rt').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('alamat', $('#alamat').val());

            formInput.append('jenis_perusahaan', $('input[name=jenis_perusahaan]:checked').val() || "");
            formInput.append('kegiatan_usaha', $('input[name=kegiatan_usaha]:checked').val() || "");
            formInput.append('jenis_olahan', $('input[name=jenis_olahan]:checked').val() || "");
            formInput.append('tahun_berdiri', $('#tahun_berdiri').val());
            formInput.append('frekuensi_produksi_peminggu', $('#frekuensi_produksi_peminggu').val());
            formInput.append('luas_bangunan_keseluruhan', $('#luas_bangunan_keseluruhan').val());
            formInput.append('luas_bangunan_produksi', $('#luas_bangunan_produksi').val());
            formInput.append('permodalan', $('input[name=permodalan]:checked').val() || "");
            formInput.append('perijinan_usaha', $('input[name=perijinan_usaha]:checked').val() || "");

            // Form perijinan
            formInput.append('perijinan', JSON.stringify(dataPerijinan));

            // Form Alat
            formInput.append('alat', JSON.stringify(dataAlat));

            // Form Bahan Utama
            formInput.append('bahanUtama', JSON.stringify(dataBahanUtama));

            // Form Bahan Lain
            formInput.append('bahanLain', JSON.stringify(dataBahanLain));

            // Form Nilai Produksi
            formInput.append('nilaiProduksi', JSON.stringify(dataProduksi));

            $.ajax({
                url: site_url + "api/pendataan/Api_pengolahan/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    swal({
                        title: 'Sukses!',
                        text: 'Berhasil Menyimpan',
                        type: 'success'
                    });
                    setTimeout(function() {
                        window.location.href = site_url + "pendataan/pengolahan";
                    }, 2000)
                },
                error: function(err) {
                    swal({
                        title: 'Gagal!',
                        text: 'Tidak Dapat Menyimpan',
                        type: 'warning'
                    });
                    console.log('error', err);
                },
            });
        }
    });
});



var tambahBahanLain = tambahBahanLain;

function tambahBahanLain() {

    var row =
        "<tr class='row_harga'>" +
        "<td><input type='text' disabled class='namaBahanLainText form-control' name='namaBahanLainText[]' value='" + $("#nama_bahan_lain option:selected").text() + "'> </td>" +
        "<input type='hidden' class='namaBahanLain form-control' name='namaBahanLain[]' value='" + $('#nama_bahan_lain').val() + "'> " +
        "<td><input type='text' class='valumeBahanLain form-control' name='valumeBahanLain[]' value='" + $('#volume_bahan_lain').val() + "'><br /> </td>" +
        "<td><input type='text' class='hargaBahanLain form-control' name='hargaBahanLain[]' value='" + $('#harga_bahan_lain').val() + "'><br /> </td>" +
        "<td><input type='text' class='nilaiBahanLain form-control' name='nilaiBahanLain[]' value='" + $('#harga_bahan_lain').val() * $('#volume_bahan_lain').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteBahanLain($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-bahan-lain > tbody');
    dataBahanLain.push({
        namaBahanLain: $('.namaBahanLain').val(),
        nilaiBahanLain: $('.nilaiBahanLain').val(),
        valumeBahanLain: $('.valumeBahanLain').val(),
        hargaBahanLain: $('.hargaBahanLain').val()
    });
}

var tambahBahanUtama = tambahBahanUtama;

function tambahBahanUtama() {
    var row =
        "<tr class='row_harga'>" +
        "<td><input type='text' disabled class='namaBahanUtamaText form-control' name='namaBahanUtamaText[]' value='" + $("#nama_bahan_utama option:selected").text() + "'> </td>" +
        "<input type='hidden' class='namaBahanUtama form-control' name='namaBahanUtama[]' value='" + $('#nama_bahan_utama').val() + "'> " +
        "<td><input type='text' class='asalBahanUtama form-control' name='asalBahanUtama[]' value='" + $('#asal_bahan_utama').val() + "'><br /> </td>" +
        "<td><input type='text' class='valumeBahanUtama form-control' name='valumeBahanUtama[]' value='" + $('#volume_bahan_utama').val() + "'><br /> </td>" +
        "<td><input type='text' class='hargaBahanUtama form-control' name='hargaBahanUtama[]' value='" + $('#harga_bahan_utama').val() + "'><br /> </td>" +
        "<td><input type='text' class='nilaiBahanUtama form-control' name='nilaiBahanUtama[]' value='" + $('#harga_bahan_utama').val() * $('#volume_bahan_utama').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteBahanUtama($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-bahan-utama > tbody');
    dataBahanUtama.push({
        namaBahanUtama: $('.namaBahanUtama').val(),
        asalBahanUtama: $('.asalBahanUtama').val(),
        nilaiBahanUtama: $('.nilaiBahanUtama').val(),
        valumeBahanUtama: $('.valumeBahanUtama').val(),
        hargaBahanUtama: $('.hargaBahanUtama').val()
    });
}


// DIGUNAKAN

var tambahAlat = tambahAlat;

function tambahAlat() {
    var row =
        "<tr class='row_harga'>" +
        "<td><input type='text' disabled class='namaProdukAlatteText form-control' name='namaProdukAlatteText[]' value='" + $("#nama_produk_alat option:selected").text() + "'> </td>" +
        "<input type='hidden' class='namaProdukAlat form-control' name='namaProdukAlat[]' value='" + $('#nama_produk_alat').val() + "'> " +
        "<td><input type='text' class='volumeProdukAlat form-control' name='volumeProdukAlat[]' value='" + $('#volume_produk_alat').val() + "'><br /> </td>" +
        "<td><input type='text' class='hargaProdukAlat form-control' name='hargaProdukAlat[]' value='" + $('#harga_produk_alat').val() + "'><br /> </td>" +
        "<td><input type='text' class='nilaiProdukAlat form-control' name='nilaiProdukAlat[]' value='" + $('#harga_produk_alat').val() * $('#volume_produk_alat').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteAlat($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-alat > tbody');
    dataAlat.push({
        namaProdukAlat: $('.namaProdukAlat').val(),
        volumeProdukAlat: $('.volumeProdukAlat').val(),
        hargaProdukAlat: $('.hargaProdukAlat').val(),
        nilaiProdukAlat: $('.nilaiProdukAlat').val()
    });
}



// DIGUNAKAN

var tambahProduksi = tambahProduksi;

function tambahProduksi() {
    var row =
        "<tr class='row_harga'>" +
        "<td><input type='text' disabled class='namaProduksiteText form-control' name='namaProduksiteText[]' value='" + $("#nama_nilai_produksi option:selected").text() + "'> </td>" +
        "<input type='hidden' class='namaProduksi form-control' name='namaProduksi[]' value='" + $('#nama_nilai_produksi').val() + "'> " +
        "<td><input type='text' class='lokasiPemasaran form-control' name='lokasiPemasaran[]' value='" + $('#lokasi_pemasaran').val() + "'><br /> </td>" +
        "<td><input type='text' class='volumeProduksi form-control' name='volumeProduksi[]' value='" + $('#volume_nilai_produksi').val() + "'><br /> </td>" +
        "<td><input type='text' class='hargaProduksi form-control' name='hargaProduksi[]' value='" + $('#harga_nilai_produksi').val() + "'><br /> </td>" +
        "<td><input type='text' class='nilaiProduksi form-control' name='nilaiProduksi[]' value='" + $('#harga_nilai_produksi').val() * $('#volume_nilai_produksi').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deleteProduksi($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-produksi > tbody');
    dataProduksi.push({
        namaProduksi: $('.namaProduksi').val(),
        lokasiPemasaran: $('.lokasiPemasaran').val(),
        bahanProduk: $('.bahanProduk').val(),
        volumeProduksi: $('.volumeProduksi').val(),
        hargaProduksi: $('.hargaProduksi').val(),
        nilaiProduksi: $('.nilaiProduksi').val()
    });
}
var tambahPerijinan = tambahPerijinan;

function tambahPerijinan() {

    var row =
        "<tr class='row_harga'>" +
        "<td>" + $("#jenis_perijinan option:selected").text() + "<input type='hidden' class='jenisPerijinan form-control' name='jenisPerijinan[]' value='" + $('#jenis_perijinan').val() + "'> </td>" +
        "<td><input type='text' class='noPerijinan form-control' name='noPerijinan[]' value='" + $('#no_perijinan').val() + "'><br /> </td>" +
        "<td><input type='text' class='tglPerijinan form-control' name='tglPerijinan[]' value='" + $('#tgl_perijinan').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-danger btn-sm" onclick="deletePerijinan($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-perijinan > tbody');
    dataPerijinan.push({
        jenisPerijinan: $('.jenisPerijinan').val(),
        noPerijinan: $('.noPerijinan').val(),
        tglPerijinan: $('.tglPerijinan').val()
    });
}


function deleteBahanLain(row) {

    row.closest('tr').remove();
}

function deleteBahanUtama(row) {

    row.closest('tr').remove();
}

function deleteProduksi(row) {

    row.closest('tr').remove();
}

function deleteAlat(row) {

    row.closest('tr').remove();
}

function deletePerijinan(row) {

    row.closest('tr').remove();
}




function valid(nik) {

    $.ajax({
        url: site_url + "api/personal_data/Api_identitas_pengolahan/validNik/" + nik,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(param) {
            if (param == null) {
                swal("NIK Sesuai", "Silahkan Lanjutkan Registrasi", "success");
            } else {
                swal({
                        title: "Duplikat Data?",
                        text: "Pilih YA untuk melanjutkan mengubah data atas nama " + param.nama,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Terimakasih", {
                                icon: "success",
                            });
                            window.location = site_url + "pendataan/pengolahan/detail/" + param.pengolahan_id;
                        } else {
                            swal("Mengisi kembali kuesioner");
                        }
                    });
            }
        },
        error: function(err) {
            console.log('error', err);
        },
    });
}