$(document).ready(function() {

    $('#check').click(function() {

        // swal({
        //     // title: 'Gagal!',
        //     text: 'NIK Sudah Terdaftar',
        //     type: 'warning'
        // });
        if ($('#nik_check').val().length == 16) {

            valid($('#nik_check').val());
        }
        // var settings = {
        //     "url": "http://localhost/2020-sangdata/api/personal_data/api_personal_data/validNik/"+$('#nik_check').val(),
        //     "method": "GET",
        //     "timeout": 0,
        //   };

        //   $.ajax(settings).done(function (response) {
        //     var res = response;
        //     if(res != null){
        //         swal("Sorry", "NIK sudah terdaftar", "error");
        //       }else{
        //         if($('#nik_check').val().length == 16){
        //             valid($('#nik_check').val());
        //         }
        //       }
        //   });



    });



    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('nik', $('#nik').val());
            formInput.append('no_kk', $('#no_kk').val());
            formInput.append('npwp', $('#npwp').val());
            formInput.append('nama_lengkap', $('#nama_lengkap').val());
            formInput.append('jenis_kelamin', $('#jenis_kelamin').val());
            formInput.append('no_telp', $('#no_tlp').val());
            formInput.append('agama', $('#agama').val());
            formInput.append('tempat_lahir', $('#tmp_lahir').val());
            formInput.append('tanggal_lahir', $('#tgl_lahir').val());
            formInput.append('status_kawin', $('#status_kawin').val());
            formInput.append('gol_darah', $('#gol_darah').val());
            formInput.append('pekerjaan', $('#pekerjaan').val());
            formInput.append('pendidikan', $('#pendidikan').val());
            formInput.append('prov_nama', $('#provinsi').val());
            formInput.append('no_prov', $('#no_provinsi').val());
            formInput.append('kab_nama', $('#kab').val());
            formInput.append('no_kab', $('#no_kab').val());
            formInput.append('kec_nama', $('#kec').val());
            formInput.append('no_kec', $('#no_kec').val());
            formInput.append('kel_nama', $('#kelurahan').val());
            formInput.append('no_kel', $('#no_kelurahan').val());
            formInput.append('no_rw', $('#rt').val());
            formInput.append('no_rt', $('#rw').val());
            formInput.append('alamat', $('#alamat').val());

            $.ajax({
                url: site_url + "api/personal_data/Api_personal_data/add",
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
                        window.location.href = site_url + "personal_data/personal_data";
                    }, 500)
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


function valid(nik) {
    $('select[name=nik_asal]').empty();
    $('select[name=nik_asal]').select2({
        ajax: {
            url: site_url + 'api/personal_data/api_personal_data/checkNik/' + nik,
            dataType: 'json',
            data: function(param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
            },
            processResults: function(data) {
                return {
                    results: _.map(data.response || data, function(obj) {
                        $('#no_kk').val(obj.NO_KK);
                        $('#nik').val(obj.NIK);
                        $('#nama_lengkap').val(obj.NAMA_LGKP);
                        $('#agama').val(obj.AGAMA);
                        $('#pekerjaan').val(obj.JENIS_PKRJN);
                        $('#pendidikan').val(obj.PDDK_AKH);
                        $('#tmp_lahir').val(obj.TMPT_LHR);
                        $('#status_kawin').val(obj.STATUS_KAWIN);
                        $('#gol_darah').val(obj.GOL_DARAH);
                        $('#jenis_kelamin').val(obj.JENIS_KLMIN);
                        $('#kab').val(obj.KAB_NAME);
                        $('#rt').val(obj.NO_RW);
                        $('#rw').val(obj.NO_RT);
                        $('#kec').val(obj.KEC_NAME);
                        $('#no_kec').val(obj.NO_KEC);
                        $('#provinsi').val(obj.PROP_NAME);
                        $('#tgl_lahir').val(obj.TGL_LHR);
                        $('#kelurahan').val(obj.KEL_NAME);
                        $('#alamat').val(obj.ALAMAT);
                        $('#no_provinsi').val(obj.NO_PROP);
                        $('#no_kab').val(obj.NO_KAB);
                        $('#no_kelurahan').val(obj.NO_KEL);

                        $("#nik_asal").append($("<option />")
                            .attr("value", obj.NIK)
                            .html(obj.NIK)
                        ).val(obj.NIK).trigger("change").select2("close");

                        return data;

                    })
                }
            },
            cache: true,
            minimumInputLength: 3,

        },
    });

}