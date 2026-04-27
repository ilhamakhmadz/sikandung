$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('pengolahan_bahan_lain_uraian_ket', $('#pengolahan_bahan_lain_uraian_ket').val());

            $.ajax({
                url: site_url + "api/master/pengolahan/Api_pengolahan_bahan/edit/" + $('#pengolahan_bahan_lain_uraian_id').val(),
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
                        window.location.href = site_url + "master/pengolahan/pengolahan_bahan_lain";
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