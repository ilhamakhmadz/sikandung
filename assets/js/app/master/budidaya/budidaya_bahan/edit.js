$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('budidaya_bahan_lain_uraian_ket', $('#budidaya_bahan_lain_uraian_ket').val());

            $.ajax({
                url: site_url + "api/master/budidaya/Api_budidaya_bahan/edit/" + $('#budidaya_bahan_lain_uraian_id').val(),
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
                        window.location.href = site_url + "master/budidaya/budidaya_bahan";
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