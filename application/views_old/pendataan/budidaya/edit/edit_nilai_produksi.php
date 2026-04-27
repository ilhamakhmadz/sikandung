
    <div class="modal-content">
                                <form class="form-horizontal" id="form_edit_nilai_produksi" name="form_edit_nilai_produksi" method="post" action="">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="nama_nilai_produksi" id="nama_nilai_produksi">
                                                        <?php foreach($nilai_produksi_master as $nilai):?>
                                                            <option value="<?=$nilai->budidaya_nilai_produksi_uraian_id?>" <?=$nilai->budidaya_nilai_produksi_uraian_id == $nilai_produksi->budidaya_nilai_produksi_uraian_id ? 'selected' : ''?>><?=$nilai->budidaya_nilai_produksi_uraian_ket?></option>
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
                                                            <select name="jenis_nilai_produksi" id="jenis_nilai_produksi" class="form-control">
                                                                <option value="">-- Pilih Jenis Biaya --</option>
                                                                <?php 
                                                                foreach($jenis_biaya_master as $biaya_master){
                                                                ?>
                                                                    <option value="<?=$biaya_master->budidaya_jenis_id?>" <?=$nilai_produksi->budidaya_jenis_id == $biaya_master->budidaya_jenis_id ? 'selected' : ''?>><?=$biaya_master->budidaya_jenis_nama.'- [ '.$biaya_master->budidaya_kategori_nama?> ]</option>
                                                                
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
                                                        <input type="number" name="volume_nilai_produksi" value="<?=$nilai_produksi->budidaya_nilai_produksi_volume?>" id="volume_nilai_produksi"  class="form-control" >
                                                        <input type="hidden" name="id_nilai_produksi" id="id_nilai_produksi"  value="<?=$nilai_produksi->budidaya_nilai_produksi_id?>"   class="form-control" >
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
                                                    <input type="number" class="form-control" value="<?=$nilai_produksi->budidaya_nilai_produksi_harga?>" name="harga_nilai_produksi" id="harga_nilai_produksi" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" id="add_modal_identitas" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>    
                                
    </div>