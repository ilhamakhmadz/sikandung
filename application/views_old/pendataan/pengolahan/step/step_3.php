                                <div class="col-md-12">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-lg-2 text-right">Jenis Perijinan/Sertifikat</label>
                                            <div class="col-lg-3">
                                                <select name="jenis_perijinan" class="form-control" id="jenis_perijinan">
                                                    <option value="">-Jenis perijinan-</option>
                                                    <?php
                                                        foreach($perijinan as $perijinan){
                                                            echo '<option value="'.$perijinan->pengolahan_perijinan_uraian_id.'">'.$perijinan->pengolahan_perijinan_uraian_ket.'</option>';
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
                                                <label class="col-lg-2 text-right">Nomor Perijinan/Sertifikat</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" name="no_perijinan" id="no_perijinan"  class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-2 text-right">Tanggal Perijinan/Sertifikat</label>
                                                <div class="col-lg-10">
                                                    <input type="date" name="tgl_perijinan" id="tgl_perijinan"  class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="tambahPerijinan()" class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Tambahkan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- / END ORD GROUP-->
                                    <!-- tabel perijinan-->
                                    <div class="col-lg-12">
                                        <table class="table table-hover table-striped" id="table-perijinan">
                                            <thead>
                                                <tr>
                                                    <th>Jenis Perijinan/Sertifikat</th>
                                                    <th>No Perijinan/Sertifikat</th>
                                                    <th>Tanggal Perijinan/Sertifikat</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- / end tabel perijinan-->
                                    <!-- / END SK GROUP-->
                                </div>


                                <!-- <div class="modal inmodal" id="myModalAddPerijinan" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated flipInY">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Tambah Data Perijinan</h4>
                                                </div>
                                                <form class="form-horizontal" id="form_add_perijinan" name="form_add_perijinan" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nama Perijinan</label> 
                                                        <input type="text" name="nama_perijinan" id="nama_perijinan"  class="form-control" >
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                    <button type="button" id="add_modal_perijinan" class="btn btn-primary">Tambah</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
