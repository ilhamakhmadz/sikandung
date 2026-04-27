<div class="col-md-12">
                                <div class="col-md-6">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <!-- <input type="text" name="" id=""  class="form-control" > -->
                                                    <select class="form-control" name="nama_bahan_lain" id="nama_bahan_lain">
                                                        <?php foreach($bahan_lainnya as $bahanlain):?>
                                                            <option value="<?=$bahanlain->budidaya_bahan_lain_uraian_id?>"><?=$bahanlain->budidaya_bahan_lain_uraian_ket?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Volume</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <input type="number" name="volume_bahan_lain" id="volume_bahan_lain"  class="form-control" >
                                                        <!-- <span class="input-group-addon">Kg</span>  -->
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
                                                    <input type="number" class="form-control" name="harga_bahan_lain" id="harga_bahan_lain" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="tambahBahanLain()" class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Tambahkan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                                    <!-- tabel alat-->
                                    <div class="col-lg-12">
                                        <table class="table table-hover table-striped" id="table-bahan-lain">
                                            <thead>
                                                <tr>
                                                    <th>Uraian</th>
                                                    <th>Volume</th>
                                                    <th>Harga</th>
                                                    <th>Nilai (Volume X Harga)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <!-- / end tabel alat-->
                                    <!-- / END SK GROUP-->
                                    <style>
                                        .gallery img{
                                            padding-bottom:20px;
                                            margin : 5px;
                                            width : 250px;
                                            height : 300px;
                                        }
                                    </style>