
    <div class="modal-content">
                                <form class="form-horizontal" id="form_edit_nilai_produksi" name="form_edit_nilai_produksi" method="post" action="">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="nama_nilai_produksi" id="nama_nilai_produksi">
                                                        <?php foreach($nilai_produksi_master as $nilai):?>
                                                            <option value="<?=$nilai->pengolahan_nilai_produksi_uraian_id?>" <?=$nilai->pengolahan_nilai_produksi_uraian_id == $nilai_produksi->pengolahan_nilai_produksi_uraian_id ? 'selected' : ''?>><?=$nilai->pengolahan_nilai_produksi_uraian_ket?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Lokasi Pemasaran</label>
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="text" name="lokasi_pemasaran" id="lokasi_pemasaran" value="<?=$nilai_produksi->pengolahan_nilai_lokasi_pemasaran?>" class="form-control">
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
                                                        <input type="number" name="volume_nilai_produksi" value="<?=$nilai_produksi->pengolahan_nilai_produksi_volume?>" id="volume_nilai_produksi"  class="form-control" >
                                                        <input type="hidden" name="id_nilai_produksi" id="id_nilai_produksi"  value="<?=$nilai_produksi->pengolahan_nilai_produksi_id?>"   class="form-control" >
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
                                                    <input type="number" class="form-control" value="<?=$nilai_produksi->pengolahan_nilai_produksi_harga?>" name="harga_nilai_produksi" id="harga_nilai_produksi" />
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