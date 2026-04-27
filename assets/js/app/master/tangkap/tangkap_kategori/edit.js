$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('tangkap_kategori_nama', $('#tangkap_kategori_nama').val());

            $.ajax({
                url: site_url + "api/master/tangkap/Api_tangkap_kategori/edit/" + $('#tangkap_kategori_id').val(),
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
                        window.location.href = site_url + "master/tangkap/tangkap_kategori";
                    }, 100)
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