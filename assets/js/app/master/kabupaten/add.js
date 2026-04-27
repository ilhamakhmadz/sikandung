$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('kd_kabupaten', $('#kd_kabupaten').val());
            formInput.append('nama_kabupaten', $('#nama_kabupaten').val());

            $.ajax({
                url: site_url + "api/master/Api_kabupaten/add",
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
                        }, 500)
                },
                error: function(err){
                    console.log('error',err);
                },
            });
        }
    });
});