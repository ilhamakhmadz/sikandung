$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('nik',  $('#nik').val());
            formInput.append('no_kk',  $('#no_kk').val());
            formInput.append('npwp',  $('#npwp').val());
            formInput.append('nama_lengkap',  $('#nama_lengkap').val());
            formInput.append('jenis_kelamin',  $('#jenis_kelamin').val());
            formInput.append('no_telp',  $('#no_tlp').val());
            formInput.append('agama',  $('#agama').val());
            formInput.append('tempat_lahir',  $('#tmp_lahir').val());
            formInput.append('tanggal_lahir',  $('#tgl_lahir').val());
            formInput.append('status_kawin',  $('#status_kawin').val());
            formInput.append('gol_darah',  $('#gol_darah').val());
            formInput.append('pekerjaan',  $('#pekerjaan').val());
            formInput.append('pendidikan',  $('#pendidikan').val());
            formInput.append('prov_nama',  $('#provinsi').val());
            formInput.append('no_prov',  $('#no_provinsi').val());
            formInput.append('kab_nama',  $('#kab').val());
            formInput.append('no_kab',  $('#no_kab').val());
            formInput.append('kec_nama',  $('#kec').val());
            formInput.append('no_kec',  $('#no_kec').val());
            formInput.append('kel_nama',  $('#kelurahan').val());
            formInput.append('no_kel',  $('#no_kelurahan').val());
            formInput.append('no_rw',  $('#rt').val());
            formInput.append('no_rt',  $('#rw').val());
            formInput.append('alamat',  $('#alamat').val());

            $.ajax({
                url: site_url + "api/personal_data/Api_personal_data/edit/" + $('#id_personal_data').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function(){
                        swal({
                            title: 'Sukses!',
                            text: 'Berhasil Menyimpan',
                            type: 'success'
                        });
                        setTimeout(function(){
                            window.location.href = site_url + "personal_data/personal_data";
                        }, 2000)
                },
                error: function(err){
                    swal({
                        title: 'Gagal!',
                        text: 'Tidak Dapat Menyimpan',
                        type: 'warning'
                    });
                    console.log('error',err);
                },
            });
        }
    });
});