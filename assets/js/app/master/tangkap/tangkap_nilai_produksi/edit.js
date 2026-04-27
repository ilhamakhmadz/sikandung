$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('tangkap_nilai_produksi_uraian_ket', $('#tangkap_nilai_produksi_uraian_ket').val());

            $.ajax({
                url: site_url + "api/master/tangkap/Api_tangkap_nilai_produksi/edit/" + $('#tangkap_nilai_produksi_uraian_id').val(),
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
                        window.location.href = site_url + "master/tangkap/tangkap_nilai_produksi";
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