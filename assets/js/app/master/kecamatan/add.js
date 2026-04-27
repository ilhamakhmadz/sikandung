$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('Kd_Kec',  $('#kd_kabupaten').val() + $('#kd_kecamatan').val());
            formInput.append('Kd_Kabupaten',  $('#kd_kabupaten').val());
            formInput.append('Nama_Kecamatan',  $('#nama_kecamatan').val());

            $.ajax({
                url: site_url + "api/master/Api_kecamatan/add",
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
                            window.location.href = site_url + "master/kecamatan";
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