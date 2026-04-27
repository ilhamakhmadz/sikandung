        <div class="wrapper wrapper-content animated fadeInRight ecommerce">    
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col-md-8"> 
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="col-form-label" for="product_name">Nama Kelompok</label>
                                        <select name="nama_kelompok" id="nama_kelompok" class="form-control">
                                            <option value="">--Pilih Kelompok--</option>
                                            <?php
                                                foreach($kelompok_pembesaran as $kelompok){
                                                    echo '<option value="'.$kelompok->nama_kelompok.'">'.$kelompok->nama_kelompok.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="col-form-label" for="price">Kecamatan</label>
                                        <select name="nama_kecamatan" id="nama_kecamatan" class="form-control">
                                            <option value="">--Pilih Kecamatan--</option>
                                            <?php
                                                foreach($kecamatan_pembesaran as $kecamatan){
                                                    echo '<option value="'.$kecamatan->nama_kecamatan.'">'.$kecamatan->nama_kecamatan.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" id="btnCari" class="form-control"><strong>Cari</strong></button>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">  
                                <br>
                                <?php if($this->acl->is_allowed('report/report_pembesaran/pdf')): ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-danger float-right m-t-n-xs" id="btnPdf" class="form-control"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <strong>Cetak PDF</strong></button>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($this->acl->is_allowed('report/report_pembesaran/excel')): ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" id="btnExcel" class="form-control"><i class="fa fa-file-excel-o" aria-hidden="true"></i> <strong>Cetak Excel</strong></button>
                                    </div>
                                </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <table id="dataTable_Desa" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</span></th>
                                                <th rowspan="2">NIK</span></th>
                                                <th rowspan="2">Nama</span></th>
                                                <th rowspan="2">Kelompok</span></th>
                                                <th rowspan="2">Kecamatan</span></th>
                                                <th rowspan="2">Desa</span></th>
                                                <th rowspan="2">Luas Lahan (m2)</span></th>
                                                <th colspan="3">Produksi</span></th>
                                            </tr>
                                            <tr>
                                                <th>Biaya</span></th>
                                                <th>Volume</span></th>
                                                <th>Nilai</span></th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align:center;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
