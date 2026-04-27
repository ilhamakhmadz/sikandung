$(document).ready(function() {
    $('#kec_id').change(function() {
        $('#kd_kecamatan').val($('#kec_id').val());
	});
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('Kd_Kec',  $('#kd_kecamatan').val());
            formInput.append('Kd_Desa',  $('#kd_kecamatan').val());
            formInput.append('Nama_Desa',  $('#nama_desa').val());
            formInput.append('id',  $('#id').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/edit",
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
                            window.location.href = site_url + "master/desa";
                        }, 100)
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