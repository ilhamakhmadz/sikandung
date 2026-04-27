                    <div id="modalTambahPerijinan" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal" id="form_tambah_perijinan" name="form_tambah_perijinan" method="post" action="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Data Perijinan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Jenis Perijinan/Sertifikat</label>
                                                <div class="col-lg-6">
                                                    <select name="jenis_perijinan" class="form-control" id="jenis_perijinan">
                                                        <option value="">-Jenis perijinan-</option>
                                                        <?php
                                                            foreach($jenis_perijinan as $perijinan){
                                                                echo '<option value="'.$perijinan->tangkap_perijinan_uraian_id.'">'.$perijinan->tangkap_perijinan_uraian_ket.'</option>';
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
                                                                <input type="hidden" name="tangkap_id" id="tangkap_id" value="<?=$tangkap_identitas->tangkap_id?>"  class="form-control" >
                                                                <input type="text" name="no_perijinan" id="no_perijinan" class="form-control">
                                                            </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-lg-4 text-right">Tanggal Perijinan/Sertifikat</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="tgl_perijinan" id="tgl_perijinan"  class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                    <button type="submit" id="add_modal_identitas" class="btn btn-primary">Tambah</button>
                                            </div>

                                        </div>
                                       
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
