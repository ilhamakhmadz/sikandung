$(document).ready(function() {

    $('#check').click(function() {
        if ($('#nik').val().length == 16) {
            valid($('#nik').val());
        }
    });
    $('#jenis_produk_bahan').select2();
    // $('#jenis_nilai_produksi').select2();

    $('select[name=kecamatan]').on('change', function() {
        $('select[name=desa]').empty();
        $.ajax({
            url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kecamatan]').val(),
            data: "{}",
            dataType: 'json',
            success: function(data) {
                var s = '<option value="">Pilih Desa</option>';
                for (var i = 0; i < data.length; i++) {
                    s += '<option value="' + data[i].Kd_Desa + '">' + data[i].text + '</option>';
                }
                $("#desa").html(s);
            }

        });
    });

    $("#form_kuesioner").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('budidaya_id', $('#budidaya_id').val());
            formInput.append('tanggal_kuesioner', $('#tanggal_kuesioner').val());
            formInput.append('nama_responden', $('#nama_responden').val());
            formInput.append('petugas_enumerator', $('#petugas_enumerator').val());

            formInput.append('kelompok', $('#kelompok').val());
            formInput.append('pendidikan', $('#pendidikan').val());
            formInput.append('nama', $('#nama').val());
            // formInput.append('nik', $('#nik').val());
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

            formInput.append('jenis_perusahaan', $('input[name="jenis_perusahaan"]:checked').val());
            formInput.append('kegiatan_usaha', $('input[name="kegiatan_usaha"]:checked').val());
            formInput.append('kapasitas_produksi', $('#kapasitas_produksi').val());
            formInput.append('tahun_berdiri', $('#tahun_berdiri').val());
            formInput.append('luas_tempat', $('#luas_tempat').val());
            formInput.append('status_kolam', $('input[name="status_kolam"]:checked').val());
            formInput.append('permodalan', $('input[name="permodalan"]:checked').val());
            formInput.append('perijinan_usaha', $('input[name="perijinan_usaha"]:checked').val());
            $.ajax({
                url: site_url + "api/pendataan/Api_budidaya/edit_kuesioner/" + $('#budidaya_id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    swal({
                        title: 'Sukses!',
                        text: 'Berhasil Mengubah Data',
                        type: 'success'
                    });
                    setTimeout(function() {
                        window.location.reload();
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

// JAVASCRIP NILAI PRODUKSI
$("#form_tambah_biaya_produksi").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_id', $('#budidaya_id').val());
        formInput.append('nama_produk_bahan_master', $('#nama_produk_bahan_master').val());
        formInput.append('jenis_produk_bahan_master', $('#jenis_produk_bahan_master').val());
        formInput.append('volume_produk_bahan_master', $('#volume_produk_bahan_master').val());
        formInput.append('harga_produk_bahan_master', $('#harga_produk_bahan_master').val());


        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/tambah_biaya_produksi/" + $('#budidaya_id').val(),
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
                    window.location.reload();
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

$("#form_edit_biaya").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_biaya_produksi_id', $('#budidaya_biaya_produksi_id').val());
        formInput.append('nama_produk_bahan_master', $('#nama_produk_bahan_master').val());
        formInput.append('jenis_produk_bahan_master', $('#jenis_produk_bahan_master').val());
        formInput.append('volume_produk_bahan_master', $('#volume_produk_bahan_master').val());
        formInput.append('harga_produk_bahan_master', $('#harga_produk_bahan_master').val());


        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/edit_biaya_produksi/" + $('#budidaya_biaya_produksi_id').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                swal({
                    title: 'Sukses!',
                    text: 'Berhasil Mengubah Data',
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.reload();
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

// JAVASCRIPT BAHAN LAIN
$("#form_tambah_bahan_lain").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_id', $('#budidaya_id').val());
        formInput.append('nama_bahan_lain', $('#nama_bahan_lain').val());
        formInput.append('volume_bahan_lain', $('#volume_bahan_lain').val());
        formInput.append('harga_bahan_lain', $('#harga_bahan_lain').val());

        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/tambah_bahan_lain/" + $('#budidaya_id').val(),
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
                    window.location.reload();
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

// JAVASCRIPT PERIJINAN
$("#form_tambah_perijinan").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_id', $('#budidaya_id').val());
        formInput.append('jenis_perijinan', $('#jenis_perijinan').val());
        formInput.append('no_perijinan', $('#no_perijinan').val());
        formInput.append('tgl_perijinan', $('#tgl_perijinan').val());

        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/tambah_perijinan/" + $('#budidaya_id').val(),
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
                    window.location.reload();
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


$("#form_tambah_nilai_produksi").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_id', $('#budidaya_id').val());
        formInput.append('nama_nilai_produksi', $('#nama_nilai_produksi').val());
        formInput.append('jenis_nilai_produksi', $('#jenis_nilai_produksi').val());
        formInput.append('volume_nilai_produksi', $('#volume_nilai_produksi').val());
        formInput.append('harga_nilai_produksi', $('#harga_nilai_produksi').val());


        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/tambah_nilai_produksi/" + $('#budidaya_id').val(),
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
                    window.location.reload();
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


$("#form_edit_bahan_lain").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('budidaya_bahan_lain_id', $('#budidaya_bahan_lain_id').val());
        formInput.append('nama_bahan_lain', $('#nama_bahan_lain').val());
        formInput.append('volume_bahan_lain', $('#volume_bahan_lain').val());
        formInput.append('harga_bahan_lain', $('#harga_bahan_lain').val());

        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/edit_bahan_lain/" + $('#budidaya_bahan_lain_id').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                swal({
                    title: 'Sukses!',
                    text: 'Berhasil Mengubah Data',
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.reload();
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


$("#form_edit_nilai_produksi").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('nama_nilai_produksi', $('#nama_nilai_produksi').val());
        formInput.append('jenis_nilai_produksi', $('#jenis_nilai_produksi').val());
        formInput.append('volume_nilai_produksi', $('#volume_nilai_produksi').val());
        formInput.append('harga_nilai_produksi', $('#harga_nilai_produksi').val());

        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/edit_nilai_produksi/" + $('#id_nilai_produksi').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                swal({
                    title: 'Sukses!',
                    text: 'Berhasil Mengubah Data',
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.reload();
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

$("#form_edit_perijinan").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('jenis_perijinan', $('#jenis_perijinan').val());
        formInput.append('no_perijinan', $('#no_perijinan').val());
        formInput.append('tgl_perijinan', $('#tgl_perijinan').val());

        $.ajax({
            url: site_url + "api/pendataan/Api_budidaya/edit_perijinan/" + $('#budidaya_perijinan_id').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                swal({
                    title: 'Sukses!',
                    text: 'Berhasil Mengubah Data',
                    type: 'success'
                });
                setTimeout(function() {
                    window.location.reload();
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