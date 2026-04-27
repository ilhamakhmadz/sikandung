

                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" id="form_edit_bahan_lain" name="form_edit_bahan_lain" method="post" action="">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    <h4 class="modal-title">Edit Data Bahan Lainnya</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Uraian</label>
                                                                                            <div class="col-lg-8">
                                                                                                <select class="form-control" name="nama_bahan_lain" id="nama_bahan_lain">
                                                                                                    <?php foreach($bahan_lainnya_master as $bahanlain):?>
                                                                                                        <option value="<?=$bahanlain->budidaya_bahan_lain_uraian_id?>" <?=$bahanlain->budidaya_bahan_lain_uraian_id == $bahan_lain->budidaya_bahan_lain_uraian_id ? 'selected' : ''?>><?=$bahanlain->budidaya_bahan_lain_uraian_ket?></option>
                                                                                                    <?php endforeach;?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Volume</label>
                                                                                            <div class="col-lg-3">
                                                                                                <div class="input-group">
                                                                                                    <input type="number" name="volume_bahan_lain" value="<?=$bahan_lain->budidaya_bahan_lain_volume?>" id="volume_bahan_lain"  class="form-control" >
                                                                                                    <input type="hidden" name="budidaya_bahan_lain_id" id="budidaya_bahan_lain_id" value="<?=$bahan_lain->budidaya_bahan_lain_id?>"  class="form-control" >
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
                                                                                                <input type="number" class="form-control" name="harga_bahan_lain" id="harga_bahan_lain" value="<?=$bahan_lain->budidaya_bahan_lain_harga?>" />
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