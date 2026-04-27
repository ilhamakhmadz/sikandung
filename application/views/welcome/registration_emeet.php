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
                                    <h2 class="heading">Registration</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Registration</li>
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
                            <?php
                            if($id['id'] == 1){
                                include 'sabilulumpat_registration_emeet.php';
                            }else if($id['id'] == 2){
                                include 'esport_registration_emeet.php';
                            }else if($id['id'] == 3){
                                include 'startup_registration_emeet.php';
                            }
                            ?>
                            <div class="col-md-8">
                                            <form id="example-advanced-form" action="<?php echo site_url('welcome/save')?>" method="post" >
                                                <h2>Profile Information</h2>
                                                <fieldset class="lgx-registration-form-box lgx-registration-banner-box">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group lgx-registration-form">
                                                                <label>Email *</label>
                                                                <input id="t_email_name" name="t_email_name" type="email" class="wpcf7-form-control form-control required" placeholder="Your E-mail ..." aria-required="true">
                                                            </div>
                                                            <div class="form-group lgx-registration-form">
                                                                <label id="label_t_email_event">Event</label>
                                                                <!-- <input id="t_email_jenis_pendaftaran" name="t_email_jenis_pendaftaran" value="1" type="number" onchange="jumlah_person()" class="wpcf7-form-control form-control" aria-required="true"> -->
                                                                    <select name="t_email_event" id="t_email_event" class="wpcf7-form-control wpcf7-select lgx-select  ">
                                                                        <option value="">-- Pilih Jenis Event --</option>
                                                                        <option value="Sabilulumpat" <?= $id['id']==1 ? 'selected' : ''?>>Sabilulumpat</option>
                                                                        <option value="E-Sport PES" <?= $id['id']==2 ? 'selected' : ''?>>E-Sport PES</option>
                                                                        <option value="Startup Competition" <?= $id['id']==3 ? 'selected' : ''?>>Startup Competition</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group lgx-registration-form">
                                                                <label>Informasi Event Dari</label>
                                                                    <select name="t_email_partner" id="t_email_partner" class="wpcf7-form-control wpcf7-select lgx-select required">
                                                                        <?php
                                                                            foreach($partner as $data_p){
                                                                                echo '<option value="'.$data_p->master_partner_name.'">'.$data_p->master_partner_name.'</option>';
                                                                            }
                                                                        ?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group lgx-registration-form">
                                                                <label id="label_jenis_pendaftaran">Jenis Pendaftaran *</label>
                                                                    <select name="t_email_jenis_pendaftaran" id="t_email_jenis_pendaftaran" onchange="jenis_pendaftaran()" class="wpcf7-form-control wpcf7-select lgx-select required">
                                                                        <option value="" <?= $id['id']==1 ? 'selected' : ''?>>-- Pilih Jenis Pendaftaran --</option>
                                                                        <option value="1" <?= $id['id']==2 ? 'selected' : ''?>>Personal</option>
                                                                        <option value="2" <?= $id['id']==3 ? 'selected' : ''?>>Team</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group lgx-registration-form">
                                                                <label id="label_name_group">Nama Team</label>
                                                                <input id="t_email_name_group" name="t_email_name_group" type="text" class="wpcf7-form-control form-control" aria-required="true">
                                                            </div>
                                                            <div class="form-group lgx-registration-form">
                                                                <label id="label_jumlah_person">Jumlah Orang</label>
                                                                <input id="t_email_jumlah_person" name="t_email_jumlah_person" value="1" type="number" onchange="jumlah_person()" class="wpcf7-form-control form-control" aria-required="true">
                                                            </div>
                                                        </div>

                                                    </div>
                                                        <label>(*)Tidak boleh kosong</label>
                                                </fieldset>

                                                <h2>Personal Data</h2>
                                                <fieldset class="lgx-registration-form-box lgx-registration-banner-box">
                                                    <p id="profil"></p>
                                                </fieldset>

                                                <h2>Pembayaran</h2>
                                                <fieldset class="lgx-registration-form-box lgx-registration-banner-box">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="ibox-content">
                                                                <div class="panel-group payments-method" id="accordion">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <div class="pull-right">
                                                                                <i class="fa fa-bank text-success"></i>
                                                                            </div>
                                                                            <h5 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Bank Transfer (BJB)</a>
                                                                            </h5>
                                                                        </div>
                                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <h3>Pengingat</h3>
                                                                                        <strong>Nama Event :</strong> <span id="name_event" class="text-navy"></span>  <br>
                                                                                        <strong>Harga :</strong> <span id="all_harga_event" class="text-navy"></span>

                                                                                        <!-- <p class="m-t">
                                                                                            Lakukan transfer ke Bank Jabar Banten (BJB) dengan no.rek <b>0096290111100</b> a.n <i>SABILULUMPAT COLOR RUN 2019 [NENDEN SITI NURLAELA-EVI NURDIANI]</i>
                                                                                            bawa bukti transfer untuk melakukan registrasi ulang.


                                                                                        </p> -->

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="ibox">
                                                                <div class="ibox-title">
                                                                    <h5 class="anggota_tim">Total Pembayaran</h5>
                                                                </div>
                                                                <div class="ibox-content">
                                                                <table class="table shoping-cart-table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th style="width: 20%;">
                                                                                Jumlah
                                                                            </th>
                                                                            <th style="width: 40%;">
                                                                                Harga
                                                                            </th>
                                                                            <th style="width: 40%;">
                                                                                Total
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 20%; ">
                                                                                <h5 id="jumlah_person_booking"></h5>
                                                                            </td>
                                                                            <td style="width: 40%;">
                                                                                <h5 id="harga_event"></h5>
                                                                            </td>
                                                                            <td style="width: 40%;">
                                                                                <h5 id="total_harga_booking"></h5>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                    <span class="pembayaran_label">
                                                                        Total Pembayaran
                                                                    </span>
                                                                    <h3 class="font-bold" class="anggota_tim">
                                                                        <input type="hidden" name="t_email_total_pembayaran" id="t_email_total_pembayaran" >
                                                                        <h4 id="label_total_harga_booking" class="anggota_tim"></h4>
                                                                    </h3>

                                                                    <hr>
                                                                    <!-- <span class="text-muted small">
                                                                        * [keterangan tertentu.]
                                                                    </span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h2>Finish</h2>
                                                <fieldset class="lgx-registration-form-box lgx-registration-banner-box">
                                                    <div class="ibox-content">

                                                        <h3 class="anggota_tim">
                                                            Term & Condition<br>
                                                        </h3>
                                                        <!-- <p> -->
                                                        <ol class="line-height-1" >
                                                        Syarat dan Ketentuan
                                                        <li>	Peserta memastikan dan menyatakan kebenaran segala informasi yang diberikan pada saat melakukan pendaftaran. Data pendaftaran harus sesuai dengan tanda pengenal identitas.</li>
                                                        <li>	Setelah melakukan pendaftaran, peserta wajib segera melakukan pembayaran. Informasi mengenai detail pembayaran, konfirmasi pembayaran serta konfirmasi pembayaran akan disampaikan oleh penyelenggara melalui email yang terdaftar.</li>
                                                        <li>	Penukaran racepack dapat dilakukan dengan menunjukan kode registrasi serta tanda pengenal identitas yang didaftarkan pada sistem.</li>
                                                        <li>	Racepack harus diambil sesuai dengan hari pengambilan yang sudah ditentukan dan dijadwalkan. Pengambilan racepack setelah hari yang ditetapkan tidak akan dilayani. </li>
                                                        <li>	Setelah melakukan pembayaran, tidak ada pengembalian atas pembayaran keikutsertaan dengan alasan apapun.</li>
                                                        Dengan ini, Saya menyatakan setuju dengan syarat-syarat dan ketentuan-ketentuan dan peraturan lomba yang disebutkan di atas.
                                                        </ol>
                                                        <!-- </p> -->
                                                        <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                        </div><!-- //.CONTAINER -->
                    </div><!-- //.INNER -->
                </div>
            </section>
        </div>
    </main>

<script src="<?php echo js_url('numeral.js') ?>"></script>
<script>
// scipt untuk jenis pendaftaran

$(document).ready(function(){
    $('#t_email_jumlah_person').hide();
    $('#label_jumlah_person').hide();
    $('#label_name_group').hide();
    $('#t_email_name_group').hide();
    $("#t_email_event").hide();
    $("#label_t_email_event").hide();
    $('#label_jenis_pendaftaran').hide()
    $('#t_email_jenis_pendaftaran').hide()

    if($('#t_email_event').val() == "Sabilulumpat"){
        // $("#t_email_jenis_pendaftaran").value = "";
        $('#label_jenis_pendaftaran').show()
     $('#t_email_jenis_pendaftaran').show()
        // $("#t_email_jenis_pendaftaran").attr("disabled", false);
            $('#t_email_jumlah_person').hide();
            $('#label_jumlah_person').hide();
            $('#label_name_group').hide();
            $('#t_email_name_group').hide();

    }else if($('#t_email_event').val() == "E-Sport PES"){
        // $("#t_email_jenis_pendaftaran").value = "1";
        $('#label_jenis_pendaftaran').hide()
        $('#t_email_jenis_pendaftaran').hide()
        // $("#t_email_jenis_pendaftaran").attr("disabled", true);
        if($('#t_email_jenis_pendaftaran').val() == 1){
            $('#t_email_jumlah_person').hide();
            $('#label_jumlah_person').hide();
            $('#label_name_group').hide();
            $('#t_email_name_group').hide();
            $('#t_email_jumlah_person').val(1);
        }else{
            $('#t_email_jumlah_person').show();
            $('#label_jumlah_person').show();
            $('#label_name_group').show();
            $('#t_email_name_group').show();
        }
    jenis_pendaftaran();

    }else if($('#t_email_event').val() == "Startup Competition"){
        // $("#t_email_jenis_pendaftaran").value = "2";
        // $("#t_email_jenis_pendaftaran").attr("disabled", true);
        $('#label_jenis_pendaftaran').hide()
        $('#t_email_jenis_pendaftaran').hide()
        if($('#t_email_jenis_pendaftaran').val() == 1){
            $('#t_email_jumlah_person').hide();
            $('#label_jumlah_person').hide();
            $('#label_name_group').hide();
            $('#t_email_name_group').hide();
            $('#t_email_jumlah_person').val(1);
        }else{
            $('#t_email_jumlah_person').show();
            $('#label_jumlah_person').show();
            $('#label_name_group').show();
            $('#t_email_name_group').show();
        }
    // jenis_pendaftaran();

    }

});


function jenis_pendaftaran(){
    if($('#t_email_jenis_pendaftaran').val() == 1){
        $('#t_email_jumlah_person').hide();
        $('#label_jumlah_person').hide();
        $('#label_name_group').hide();
        $('#t_email_name_group').hide();
        $('#t_email_jumlah_person').val(1)
    }else{
        $('#t_email_jumlah_person').show();
        $('#label_jumlah_person').show();
        $('#label_name_group').show();
        $('#t_email_name_group').show();
    }
    // Harga
    // digunakan untuk pengkondisian jenis event dan menentukan harga
    if($('#t_email_event').val() == 'Sabilulumpat'){
        var jenis_kompetisi = 100000;
        $('#harga_event').text('Rp. '+ jenis_kompetisi);
    }else{
        var jenis_kompetisi = 0;
        $('#harga_event').text('Rp. '+ jenis_kompetisi);
    }
    var harga = jenis_kompetisi * $('#t_email_jumlah_person').val();
    var rupiah = "Rp. " + numeral(harga).format('0,0');

    $('#jumlah_person_booking').text($('#t_email_jumlah_person').val());
    $('#name_event').text($('#t_email_event').val());
    $('#total_harga_booking').text(rupiah);
    $('#label_total_harga_booking').text(rupiah);
    $('#all_harga_event').text(rupiah);
    $('#t_email_total_pembayaran').val(harga);

    $('#profil').empty();
    var person = $('#t_email_jumlah_person').val();
    var i;
    for (i = 1; i <= person; i++) {
        $('#profil').append("<h3 class='anggota_tim'>Data Anggota "+i+"</h3>" +
                        '<div class="row">' +
                            '<div class="col-lg-6">' +
                                '<div class="form-group lgx-registration-form">' +
                                '<label>Nama Lengkap *</label>' +
                                    '<input id="t_ticket_nama_lengkap['+i+']" name="t_ticket_nama_lengkap['+i+']" type="text" class="wpcf7-wpcf7-form-control form-control wpcf7-form-control form-control required" aria-required="true">' +
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>No Identitas (KTP/Kartu Pelajar/PASSPORT) * </label>'+
                                    '<input id="t_ticket_nik['+i+']" name="t_ticket_nik['+i+']" type="number" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>No Telp </label>'+
                                    '<input id="t_ticket_no_telp['+i+']" name="t_ticket_no_telp['+i+']" type="number" minlength="9" maxlength="12" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>Umur *</label>'+
                                    '<input id="t_ticket_umur['+i+']" name="t_ticket_umur['+i+']" type="number" maxlength="2" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-6">'+
                            '<div class="form-group lgx-registration-form">'+
                                    '<label>Alamat *</label>'+
                                    '<textarea name="t_ticket_alamat['+i+']" id="t_ticket_alamat['+i+']" class="wpcf7-form-control wpcf7-textarea lgx-textarea required" cols="20" rows="10"></textarea>'+
                            '</div>'+
                        //     '<div class="form-group lgx-registration-form">'+
                        //         '<label>Kecamatan</label>'+
                        //         // '<input id="t_ticket_kecamatan['+i+']" name="t_ticket_kecamatan['+i+']" type="text" class="wpcf7-form-control form-control required">'+
                        //         '<select name="t_ticket_kecamatan_'+i+'" id="t_ticket_kecamatan_'+i+'" class="wpcf7-form-control form-control required">' +
                        //                     '<option value="">-- Pilih Kecamatan --</option>' +
                        //                     kecamatan+
                        //                 '</select>' +
                        // '</div>'+
                        //     '<div class="form-group lgx-registration-form">'+
                        //         '<label>Desa</label>'+
                        //         '<select name="t_ticket_desa_'+i+'" id="t_ticket_desa_'+i+'" class="wpcf7-form-control form-control required"></select>'+
                        //     '</div>'+
                        '</div>'+
                    '</div>'+
                    '<hr style="border:1px solid gray;">'

        );

        // $('select[name=t_ticket_kecamatan_'+i+']').on('change', function() {
        //     // $('select[name=t_ticket_desa_'+i+']').empty();
        //     var a = i-1;
        //     console.log(a);
        //     $('select[name=t_ticket_desa_'+a+']').select2({
        //         ajax: {
        //             url: site_url + '/api/wilayah/desa?desaId='+$('#t_ticket_kecamatan_'+a).val(),
        //             dataType: 'json',
        //             data: function(param) {
        //             return {
        //                 delay: 0.3,
        //                 q: param.term
        //             }
        //             },
        //             processResults: function(data) {
        //                 return {
        //                         results: $.map(data.items || data, function(obj) {
        //                             return {
        //                                 id: obj.Kd_Desa,
        //                                 text: obj.text,
        //                             }
        //                         })
        //                     }
        //                 },
        //             cache: false,
        //             minimumInputLength: 3,

        //         }
        //     });
        // });
    }


}


$(function(){
    var form = $("#example-advanced-form").show();
        form.steps({
        headerTag: "h2",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex){
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex){
                    return true;
                }

                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex){
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
        },
            onStepChanged: function (event, currentIndex, priorIndex){


        },
            onFinishing: function (event, currentIndex){
                var form = $(this);
                var result = $('ul[aria-label=Pagination]').children().find('a');
                $(result).each(function () {
                    if ($(this).text() == 'Finish') {
                        //$(this).attr('disabled', 'disabled');
                        //$(this).css('background', 'green');
                        $(this).css('display', 'none');
                    }
                });
                form.validate().settings.ignore = ":disabled";
                return form.valid();
        },
            onFinished: function (event, currentIndex){
                $("#example-advanced-form").submit()

        }}).validate({
                 errorPlacement: function errorPlacement(error, element) { element.before(error); },
                    rules: {
                        confirm: {
                            equalTo: "#password-2"
                        }
                    }
                });
            });

function jumlah_person(){
    // digunakan untuk pengkondisian jenis event dan menentukan harga
    if($('#t_email_event').val() == 'Sabilulumpat'){
        var jenis_kompetisi = 100000;
        $('#harga_event').text('Rp. '+ jenis_kompetisi);
    }else{
        var jenis_kompetisi = 0;
        $('#harga_event').text('Rp. '+ jenis_kompetisi);
    }
      // Harga
    var harga = jenis_kompetisi * $('#t_email_jumlah_person').val();
    var rupiah = "Rp. " + numeral(harga).format('0,0');
    $('#t_email_total_pembayaran').val(harga);
    $('#label_total_harga_booking').text(rupiah);
    $('#all_harga_event').text(rupiah);
    $('#jumlah_person_booking').text($('#t_email_jumlah_person').val());
    $('#name_event').text($('#t_email_event').val());
    $('#total_harga_booking').text(rupiah);
    $('#profil').empty();
    var person = $('#t_email_jumlah_person').val();
    var i;
    for (i = 1; i <= person; i++) {

        $('#profil').append("<h3 class='anggota_tim'>Data Anggota "+i+"</h3>" +
                            '<div class="row">' +
                            '<div class="col-lg-6">' +
                                '<div class="form-group lgx-registration-form">' +
                                '<label>Nama Lengkap *</label>' +
                                    '<input id="t_ticket_nama_lengkap['+i+']" name="t_ticket_nama_lengkap['+i+']" type="text" class="wpcf7-wpcf7-form-control form-control wpcf7-form-control form-control required" aria-required="true">' +
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>No Identitas (KTP/Kartu Pelajar/PASSPORT) * </label>'+
                                    '<input id="t_ticket_nik['+i+']" name="t_ticket_nik['+i+']" type="number" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>No Telp </label>'+
                                    '<input id="t_ticket_no_telp['+i+']" name="t_ticket_no_telp['+i+']" type="number" minlength="9" maxlength="12" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                                '<div class="form-group lgx-registration-form">'+
                                    '<label>Umur *</label>'+
                                    '<input id="t_ticket_umur['+i+']" name="t_ticket_umur['+i+']" type="number" maxlength="2" class="wpcf7-form-control form-control required" aria-required="true">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-6">'+
                            '<div class="form-group lgx-registration-form">'+
                                    '<label>Alamat *</label>'+
                                    '<textarea name="t_ticket_alamat['+i+']" id="t_ticket_alamat['+i+']" class="wpcf7-form-control wpcf7-textarea lgx-textarea required" cols="20" rows="10"></textarea>'+
                            '</div>'+
                        //     '<div class="form-group lgx-registration-form">'+
                        //         '<label>Kecamatan</label>'+
                        //         // '<input id="t_ticket_kecamatan['+i+']" name="t_ticket_kecamatan['+i+']" type="text" class="wpcf7-form-control form-control required">'+
                        //         '<select name="t_ticket_kecamatan_'+i+'" id="t_ticket_kecamatan_'+i+'" class="wpcf7-form-control form-control required">' +
                        //                     '<option value="">-- Pilih Kecamatan --</option>' +
                        //                     kecamatan+
                        //                 '</select>' +
                        // '</div>'+
                        //     '<div class="form-group lgx-registration-form">'+
                        //         '<label>Desa</label>'+
                        //         '<select name="t_ticket_desa_'+i+'" id="t_ticket_desa_'+i+'" class="wpcf7-form-control form-control required"></select>'+
                        //     '</div>'+
                        '</div>'+
                    '</div>'+
                    '<hr style="border:1px solid gray;">'

        );
            // let ii = i;
            // $('select[name=t_ticket_kecamatan_'+i+']').on('change', function() {
            //     // $('select[name=t_ticket_desa_'+i+']').empty();
            //     var a = ii;
            //     $('select[name=t_ticket_desa_'+ii+']').select2({
            //         ajax: {
            //             url: site_url + '/api/wilayah/desa?desaId='+$('#t_ticket_kecamatan_'+a).val(),
            //             dataType: 'json',
            //             data: function(param) {
            //             return {
            //                 delay: 0.3,
            //                 q: param.term
            //             }
            //             },
            //             processResults: function(data) {
            //                 return {
            //                         results: $.map(data.items || data, function(obj) {
            //                             return {
            //                                 id: obj.Kd_Desa,
            //                                 text: obj.text,
            //                             }
            //                         })
            //                     }
            //                 },
            //             cache: false,
            //             minimumInputLength: 3,

            //         }
            //     });
            // });





    }
}


</script>