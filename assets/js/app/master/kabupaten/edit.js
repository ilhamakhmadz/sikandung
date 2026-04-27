$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('kd_kabupaten', $('#kd_kabupaten').val());
            formInput.append('nama_kabupaten', $('#nama_kabupaten').val());
            formInput.append('id', $('#id').val());

            $.ajax({
                url: site_url + "api/master/Api_kabupaten/edit/",
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
                        window.location.href = site_url + "master/kabupaten";
                },
                error: function(err){
                    console.log('error',err);
                },
            });
        }
    });
});