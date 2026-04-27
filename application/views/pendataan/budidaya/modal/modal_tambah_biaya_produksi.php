<div id="modalTambahBiaya" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
                                <form class="form-horizontal" id="form_tambah_biaya_produksi" name="form_tambah_biaya_produksi" method="post" action="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Data Biaya Produksiii</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="nama_produk_bahan_master" id="nama_produk_bahan_master">
                                                        <?php foreach($biaya_produksi_master as $bahan):?>
                                                            <option value="<?=$bahan->budidaya_biaya_produksi_uraian_id?>"><?=$bahan->budidaya_biaya_produksi_uraian_ket?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Jenis</label>
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <select name="jenis_produk_bahan_master" id="jenis_produk_bahan_master" class="form-control">
                                                                <option value="">-- Pilih Jenis Biaya --</option>
                                                                <?php 
                                                                foreach($jenis_biaya_master as $biaya){
                                                                    echo '<option value="'.$biaya->budidaya_jenis_id.'">'.$biaya->budidaya_jenis_nama.' - [ '.$biaya->budidaya_kategori_nama.' ]'.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Volume Produk</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <input type="number" name="volume_produk_bahan_master" id="volume_produk_bahan_master"  class="form-control" >
                                                        <input type="hidden" name="budidaya_id" id="budidaya_id" value="<?=$budidaya_identitas->budidaya_id?>"  class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Harga Produk</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" class="form-control" name="harga_produk_bahan_master" id="harga_produk_bahan_master" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                            <button type="submit" id="add_modal_identitas" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>    
                                
    </div>
  </div>
</div>


<!-- <div id="modalEditBiaya<?=$no?>" class="modal fade" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form class="form-horizontal" id="form_edit_nilai_produksi" name="form_edit_nilai_produksi" method="post" action="">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Edit Data Nilai Produksi</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Uraian</label>
                                                                                        <div class="col-lg-8">
                                                                                            <select class="form-control" name="nama_produk_bahan_master" id="nama_produk_bahan_master">
                                                                                                <?php foreach($biaya_produksi_master as $bahan):?>
                                                                                                    <option value="<?=$bahan->budidaya_biaya_produksi_uraian_id?>" <?=$bahan->budidaya_biaya_produksi_uraian_id == $biaya->budidaya_biaya_produksi_uraian_id ? 'selected' : ''?>><?=$bahan->budidaya_biaya_produksi_uraian_ket?></option>
                                                                                                <?php endforeach;?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Jenis</label>
                                                                                        <div class="col-lg-8">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-12">
                                                                                                    <select name="jenis_produk_bahan_master" id="jenis_produk_bahan_master" class="form-control">
                                                                                                        <option value="">-- Pilih Jenis Biaya --</option>
                                                                                                        <?php 
                                                                                                        foreach($jenis_biaya_master as $biaya_master){
                                                                                                        ?>
                                                                                                            <option value="<?=$biaya_master->budidaya_jenis_id?>" <?=$biaya->budidaya_jenis_id == $biaya_master->budidaya_jenis_id ? 'selected' : ''?>><?=$biaya_master->budidaya_jenis_nama.'- [ '.$biaya_master->budidaya_kategori_nama?> ]</option>
                                                                                                        <?php
                                                                                                        }
                                                                                                        ?>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Volume Produk</label>
                                                                                        <div class="col-lg-3">
                                                                                            <div class="input-group">
                                                                                                <input type="number" name="volume_produk_bahan_master" value="<?=$biaya->budidaya_biaya_produksi_volume?>" id="volume_produk_bahan_master"  class="form-control" >
                                                                                                <input type="hidden" name="budidaya_biaya_produksi_id" id="budidaya_biaya_produksi_id" value="<?=$biaya->budidaya_biaya_produksi_id?>"  class="form-control" >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Harga Produk</label>
                                                                                        <div class="col-lg-8">
                                                                                            <div class="input-group">
                                                                                            <span class="input-group-addon">Rp.</span>
                                                                                            <input type="number" class="form-control" value="<?=$biaya->budidaya_biaya_produksi_harga?>" name="harga_produk_bahan_master" id="harga_produk_bahan_master" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                                                    <button type="submit" id="add_modal_identitas" class="btn btn-primary">Edit</button>
                                                                            </div>
                                                                        </form>    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             -->