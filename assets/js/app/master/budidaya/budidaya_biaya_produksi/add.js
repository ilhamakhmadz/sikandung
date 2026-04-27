$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('budidaya_biaya_produksi_uraian_ket', $('#budidaya_biaya_produksi_uraian_ket').val());

            $.ajax({
                url: site_url + "api/master/budidaya/Api_budidaya_biaya_produksi/add",
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
                        window.location.href = site_url + "master/budidaya/budidaya_biaya_produksi";
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