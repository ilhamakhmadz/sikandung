

                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" id="form_edit_bahan_utama" name="form_edit_bahan_utama" method="post" action="">
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Uraian</label>
                                                                                            <div class="col-lg-8">
                                                                                                <select class="form-control" name="nama_bahan_utama" id="nama_bahan_utama">
                                                                                                    <?php foreach($bahan_utama_master as $bahanutama):?>
                                                                                                        <option value="<?=$bahanutama->pengolahan_bahan_utama_uraian_id?>" <?=$bahanutama->pengolahan_bahan_utama_uraian_id == $bahan_utama->pengolahan_bahan_utama_uraian_id ? 'selected' : ''?>><?=$bahanutama->pengolahan_bahan_utama_uraian_ket?></option>
                                                                                                    <?php endforeach;?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Asal</label>
                                                                                                <div class="col-lg-8">
                                                                                                    <input type="text" name="asal_bahan_utama" id="asal_bahan_utama" value="<?=$bahan_utama->pengolahan_bahan_utama_asal?>" class="form-control" >
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Volume</label>
                                                                                            <div class="col-lg-3">
                                                                                                <div class="input-group">
                                                                                                    <input type="number" name="volume_bahan_utama" value="<?=$bahan_utama->pengolahan_bahan_utama_volume?>" id="volume_bahan_utama"  class="form-control" >
                                                                                                    <input type="hidden" name="pengolahan_bahan_utama_id" id="pengolahan_bahan_utama_id" value="<?=$bahan_utama->pengolahan_bahan_utama_id?>"  class="form-control" >
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Harga</label>
                                                                                            <div class="col-lg-8">
                                                                                                <div class="input-group">
                                                                                                <span class="input-group-addon">Rp.</span>
                                                                                                <input type="number" class="form-control" name="harga_bahan_utama" id="harga_bahan_utama" value="<?=$bahan_utama->pengolahan_bahan_utama_harga?>" />
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