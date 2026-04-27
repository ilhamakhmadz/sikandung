<div class="panel">
    <div class="panel-body">
        <section class="content">
            <div class='box box-default'>
                <div class='box-body'>
                    <div class="form">
                        <form class="form-horizontal" id="form_edit" name="form_edit" method="post" action="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tahunA">Nama Kategori</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tangkap_kategori_nama" name="tangkap_kategori_nama" value="<?=$tangkap_kategori->tangkap_kategori_nama;?>" required>
                                        <input type="hidden" class="form-control" id="tangkap_kategori_id" name="tangkap_kategori_id" value="<?=$tangkap_kategori->tangkap_kategori_id;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right" >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>

                                <a href="<?php echo site_url() ?>/master/tangkap/tangkap_kategori" class="btn btn-default save"
                                   id="btn_batal" name="yt1" type="button"/>Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>