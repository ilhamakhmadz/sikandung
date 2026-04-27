<div class="panel">
    <div class="panel-body">
        <section class="content">
            <div class='box box-default'>
                <div class='box-body'>
                    <div class="form">
                        <form class="form-horizontal" id="form_edit" name="form_edit" method="post" action="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="id_visi">Pilih Kecamatan</label>
                                    <div class="col-sm-5">
                                        <select name="kec_id" id="kec_id" class="form-control">
                                            <option value='<?=$desa->Kd_Kec?>'><?=$desa->Nama_Kecamatan?></option>
                                            <?php
                                                foreach($kecamatan as $nama){
                                                    echo "<option value='".$nama->Kd_Kec."'>".$nama->Nama_Kecamatan."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="id_visi">Kode Desa</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?=$desa->id?>" required disabled>
                                        <input type="text" class="form-control" id="kd_kecamatan" name="kd_kecamatan" value='<?=$desa->Kd_Kec?>' required disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="kd_desa" name="kd_desa" value="<?=substr($desa->Kd_Desa,6);?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" style="text-align:left;" for="tahunA">Nama Desa</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_desa" name="nama_desa"  value='<?=$desa->Nama_Desa?>' required>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right" >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>

                                <a href="<?php echo site_url() ?>/master/desa" class="btn btn-default save"
                                   id="btn_batal" name="yt1" type="button"/>Batal</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>