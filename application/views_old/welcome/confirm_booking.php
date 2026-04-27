
  <!-- /.modal-dialog -->
  <style>
     label{
        font-size: 14px;
        font-family: Oswald,sans-serif;
    }
    .lgx-registration-form{
        text-align: left;
        color: white;
    }
    .wpcf7-textarea{
        margin-bottom: 1.5rem;
        display: block;
        width: 100%;
        /* height: 60px; */
        background: rgba(255,255,255,.2);
        color: #fff;
    }

    .anggota_tim {
        font-size: 25px;
        margin: 20px auto;
        font-family: Oswald,sans-serif;
        color: white;
    }

    .ibox-content{
        text-align: left;
        font-family: serif;
    }
    .ibox-content h3{
        font-family: fantasy;
        margin-top: -6px;
    }
    .ibox-content .m-t{
        font-family: serif;
        text-align: justify;
    }
    .shoping-cart-table tr th{
        font-family: serif;
        font-size: 14px;
        color: white;
        text-align:center;
    }
    .shoping-cart-table tr td{
        font-family: serif;
        font-size: 14px;
        color: white;
        text-align:center;
    }
    .text-navy{
        color: black;
        font-style: oblique;
    }
    .pembayaran_label{
        font-family: serif;
        font-size: 14px;
        color: white;
    }
    .text-muted{
        color:white;
    }
    .line-height-1{
        color:white;
    }
    body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #fff;
    }

</style>
    <!--Banner Inner-->
    <section>
        <div class="lgx-banner lgx-banner-inner">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">Confirmation Booking</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Confirmation Booking</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
        <div class="lgx-page-wrapper lgx-page-wrapper-none">
            <section>
                <div class="lgx-registration3"> <!--lgx-registration2 lgx-registration3 lgx-registration4-->
                    <div class="lgx-inner">
                        <div class="container ">
                            <div class="row">
                                <div class="col-lg-12">
                                <form id="form_confirm_booking" name="form_confirm_booking" method="post" action="">
                                    <fieldset >
                                        <legend style="color: white;"><small>Total Pembayaran</small></legend>
                                        <div class="form-group">
                                        <label style="color: white;" for="">Kode Pembayaran</label>
                                            <input type="text" disabled class="form-control" id="t_email_kode_reg" name="t_email_kode_reg" autofocus="true" value="<?=$barcode->t_email_kode_reg?>"/>
                                            <input type="hidden" disabled class="form-control" id="t_pembayaran_id_email" name="t_pembayaran_id_email" value="<?=$barcode->t_email_id?>"/>
                                        </div>
                                        <div class="form-group">
                                        <label style="color: white;" for="">Total Pembayaran</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input type="number" disabled class="form-control" id="t_email_total_pembayaran" name="t_email_total_pembayaran" value="<?=$barcode->t_email_total_pembayaran?>"/>
                                        </div>
                                        </div>
                                    </fieldset>
                                        <fieldset>
                                            <legend style="color: white;"><small>Bukti Pembayaran</small></legend>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color: white;" for="">Bank Pengirim</label>
                                                    <input type="text" class="form-control" name="t_pembayaran_nama_rek" id="t_pembayaran_nama_rek" lettersonly required/>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color: white;" for="">No Rek Pengirim</label>
                                                    <input type="text" class="form-control" name="t_pembayaran_no_rek_pengirim" id="t_pembayaran_no_rek_pengirim" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color: white;" for="">Nama Pengirim</label>
                                                    <input type="text" class="form-control" name="t_pembayaran_nama_pengirim" id="t_pembayaran_nama_pengirim" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color: white;" for="">Tanggal Transfer</label>
                                                    <input type="date" class="form-control" name="t_pembayaran_tanggal" id="t_pembayaran_tanggal" required/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color: white;" for="">Jumlah Transfer</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Rp.</span>
                                                        <input type="number" class="form-control" id="t_pembayaran_jumlah" name="t_pembayaran_jumlah" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color: white;" for="">Upload Bukti Pembayaran </label>
                                                    <input type="file" class="form-control" name="t_pembayaran_dokumen" id="t_pembayaran_dokumen" required />
                                                    <i class="pull-right"><small><i>(Max 5 MB)</i>file dalam bentuk jpg, png, atau jpeg</small></i>
                                                </div>
                                                <div class="form-group">
                                                    <label style="color: white;" for="">catatan</label>
                                                    <textarea style="color: black;" name="t_pembayaran_catatan" id="t_pembayaran_catatan" cols="70" rows="10"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="lgx-btn" id="btn_simpan">Simpan</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div><!-- //.CONTAINER -->
                    </div><!-- //.INNER -->
                </div>
            </section>
        </div>
    </main>


<script>
     $('#form_confirm_booking').submit(function (e) {
            e.preventDefault(); }).validate({
                submitHandler: function (form) {
                    $('#btn_simpan').hide();
                    var t_pembayaran_id_email = $('#t_pembayaran_id_email').val();
                    var t_pembayaran_nama_rek = $('#t_pembayaran_nama_rek').val();
                    var t_pembayaran_no_rek_pengirim = $('#t_pembayaran_no_rek_pengirim').val();
                    var t_pembayaran_nama_pengirim = $('#t_pembayaran_nama_pengirim').val();
                    var t_pembayaran_tanggal = $('#t_pembayaran_tanggal');
                    var t_pembayaran_dokumen = $('#t_pembayaran_dokumen');
                    var t_pembayaran_jumlah = $('#t_pembayaran_jumlah').val();
                    var t_pembayaran_catatan = $('#t_pembayaran_catatan').val();


                    var params = {
                        t_pembayaran_id_email: t_pembayaran_id_email,
                        t_pembayaran_nama_rek: t_pembayaran_nama_rek,
                        t_pembayaran_no_rek_pengirim: t_pembayaran_no_rek_pengirim,
                        t_pembayaran_nama_pengirim: t_pembayaran_nama_pengirim,
                        t_pembayaran_catatan: t_pembayaran_catatan,
                        t_pembayaran_jumlah: t_pembayaran_jumlah,
                        t_pembayaran_tanggal: moment(t_pembayaran_tanggal.val()).format('YYYY-MM-DD'),
                    };


                    if (t_pembayaran_dokumen.val()) {
                        Upload.uploadFile(t_pembayaran_dokumen).then(function (result) {

                            params.t_pembayaran_dokumen = result.file;

                            $.ajax({
                                url: site_url + 'api/Api_confirm_booking/add',
                                method: 'post',
                                data: $.param(params)
                            }).then(function (result) {
                                $('#modal_deal').modal('hide');
                                    // swal({
                                    //     title: 'Sukses!',
                                    //     text: 'Berhasil Diubah',
                                    //     type: 'success'
                                    // });
                                    setTimeout(function(){
                                        window.location.href = site_url + "hyugasdgahj6776576asdads";
                                    }, 1000)
                                return false;
                            }, function (err) {
                            });
                        }, function (err) {
                            // swal({
                            //         title: 'Gagal!',
                            //         text: 'Tidak Dapat Menyimpan',
                            //         type: 'warning'
                            //     });
                                console.log('error',err);
                            return false;
                        });
                    } else {

                        $.ajax({
                            url: site_url + 'api/Api_confirm_booking/add',
                            method: 'post',
                            data: $.param(params)
                        }).then(function (result) {
                            $('#modal_deal').modal('hide');
                                // swal({
                                //     title: 'Sukses!',
                                //     text: 'Berhasil Diubah',
                                //     type: 'success'
                                // });
                                setTimeout(function(){
                                    window.location.href = site_url + "hyugasdgahj6776576asdads";
                                }, 1000)
                            return false;
                        }, function (err) {
                            // swal({
                            //     title: 'Gagal!',
                            //     text: 'Tidak Dapat Menyimpan',
                            //     type: 'warning'
                            // });
                            console.log('error',err);
                        });

                    }

                    return false;
                },
                invalidHandler: function (err) {
                    console.log(err);
                }
            });


</script>