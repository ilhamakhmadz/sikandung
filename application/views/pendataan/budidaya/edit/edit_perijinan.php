

                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" id="form_edit_perijinan" name="form_edit_perijinan" method="post" action="">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Ubah Data Perijinan</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <label class="col-lg-4 text-right">Jenis Perijinan/Sertifikat</label>
                                                                                        <div class="col-lg-6">
                                                                                            <select name="jenis_perijinan" class="form-control" id="jenis_perijinan">
                                                                                                <option value="<?=$perijinan->budidaya_perijinan_uraian_id?>"><?=$perijinan->budidaya_perijinan_uraian_ket?></option>
                                                                                                <?php
                                                                                                    foreach($jenis_perijinan as $perijinan_value){
                                                                                                        echo '<option value="'.$perijinan_value->budidaya_perijinan_uraian_id.'">'.$perijinan_value->budidaya_perijinan_uraian_ket.'</option>';
                                                                                                    }
                                                                                                ?>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- ORD GROUP-->
                                                                                <div id="ord_group">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                                    <label class="col-lg-4 text-right">Nomor Perijinan/Sertifikat</label>
                                                                                                    <div class="col-lg-8">
                                                                                                        <input type="hidden" name="budidaya_perijinan_id" id="budidaya_perijinan_id" value="<?=$perijinan->budidaya_perijinan_id?>"  class="form-control" >
                                                                                                        <input type="text" name="no_perijinan" id="no_perijinan"  class="form-control" value="<?=$perijinan->budidaya_perijinan_no?>">
                                                                                                    </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-lg-4 text-right">Tanggal Perijinan/Sertifikat</label>
                                                                                            <div class="col-lg-8">
                                                                                                <input type="date" name="tgl_perijinan" id="tgl_perijinan"  class="form-control" value="<?=$perijinan->budidaya_perijinan_tgl?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                                                            <button type="submit" id="add_modal_identitas" class="btn btn-primary">Ubah</button>
                                                                                    </div>

                                                                                </div>
                                                                            </form>       
                                                                        </div>