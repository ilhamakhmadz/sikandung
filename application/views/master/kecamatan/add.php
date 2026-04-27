<div class="panel">
    <div class="panel-body">
        <section class="content">
            <div class='box box-default'>
                <div class='box-body'>
                    <div class="form">
                        <form class="form-horizontal" id="form_add" name="form_add" method="post" action="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="id_visi">Kode Kecamatan</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="kd_kabupaten" name="kd_kabupaten" value="<?=$kabupaten->kd_kabupaten?>" required disabled>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" id="kd_kecamatan" name="kd_kecamatan" placeholder="01" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tahunA">Nama Kecamatan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" placeholder="Soreang" required>
                                    </div>
                                </div>


                            </div>
                            <div class="pull-right" >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>

                                <a href="<?php echo site_url() ?>/master/kecamatan" class="btn btn-default save"
                                   id="btn_batal" name="yt1" type="button"/>Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>