$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('tangkap_jenis_nama', $('#tangkap_jenis_nama').val());
            formInput.append('kategori', $('#kategori').val());

            $.ajax({
                url: site_url + "api/master/tangkap/Api_tangkap_jenis/add",
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
                        window.location.href = site_url + "master/tangkap/tangkap_jenis";
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