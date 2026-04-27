$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('budidaya_kategori_nama', $('#budidaya_kategori_nama').val());

            $.ajax({
                url: site_url + "api/master/budidaya/Api_budidaya_kategori/add",
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
                        window.location.href = site_url + "master/budidaya/budidaya_kategori";
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