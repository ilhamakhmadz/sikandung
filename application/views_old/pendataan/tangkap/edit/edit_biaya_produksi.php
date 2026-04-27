                                                                    <div class="modal-content">
                                                                        <form class="form-horizontal" id="form_edit_biaya" name="form_edit_biaya" method="post" action="">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Uraian</label>
                                                                                        <div class="col-lg-8">
                                                                                            <select class="form-control" name="nama_produk_bahan_master" id="nama_produk_bahan_master">
                                                                                                <?php foreach($biaya_produksi_master as $bahan):?>
                                                                                                    <option value="<?=$bahan->tangkap_biaya_produksi_uraian_id?>" <?=$bahan->tangkap_biaya_produksi_uraian_id == $biaya_produksi->tangkap_biaya_produksi_uraian_id ? 'selected' : ''?>><?=$bahan->tangkap_biaya_produksi_uraian_ket?></option>
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
                                                                                                            <option value="<?=$biaya_master->tangkap_jenis_id?>" <?=$biaya_produksi->tangkap_jenis_id == $biaya_master->tangkap_jenis_id ? 'selected' : ''?>><?=$biaya_master->tangkap_jenis_nama.'- [ '.$biaya_master->tangkap_kategori_nama?> ]</option>
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
                                                                                                <input type="number" name="volume_produk_bahan_master" value="<?=$biaya_produksi->tangkap_biaya_produksi_volume?>" id="volume_produk_bahan_master"  class="form-control" >
                                                                                                <input type="hidden" name="tangkap_biaya_produksi_id" id="tangkap_biaya_produksi_id" value="<?=$biaya_produksi->tangkap_biaya_produksi_id?>"  class="form-control" >
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
                                                                                            <input type="number" class="form-control" value="<?=$biaya_produksi->tangkap_biaya_produksi_harga?>" name="harga_produk_bahan_master" id="harga_produk_bahan_master" />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                    <!-- <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button> -->
                                                                                    <button type="submit" id="add_modal_identitas" class="btn btn-primary">Edit</button>
                                                                            </div>
                                                                        </form>    
                                                                    </div>
                              