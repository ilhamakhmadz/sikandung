<div class="panel">
    <div class="panel-body">
        <section class="content">
            <div class='box box-default'>
                <div class='box-body'>
                    <div class="form">
                        <form class="form-horizontal" id="form_add" name="form_add" method="post" action="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tahunA">Kategori</label>
                                    <div class="col-sm-6">
                                        <select name="kategori" id="kategori" class="form-control">
                                            <?php foreach($kategori as $kat): ?>
                                            <option value="<?=$kat->tangkap_kategori_id?>"><?=$kat->tangkap_kategori_nama?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tahunA">Nama Jenis</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tangkap_jenis_nama" name="tangkap_jenis_nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right" >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                <a href="<?php echo site_url() ?>/master/tangkap/tangkap_jenis" class="btn btn-default save"
                                   id="btn_batal" name="yt1" type="button"/>Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>