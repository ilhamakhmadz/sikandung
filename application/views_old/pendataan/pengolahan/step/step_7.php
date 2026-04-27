<div class="col-md-12">
                                <div class="col-md-6">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <!-- <input type="text" name="" id=""  class="form-control" > -->
                                                    <select class="form-control" name="nama_nilai_produksi" id="nama_nilai_produksi">
                                                        <?php foreach($nilai_produksi as $nilai_produksi):?>
                                                            <option value="<?=$nilai_produksi->pengolahan_nilai_produksi_uraian_id?>"><?=$nilai_produksi->pengolahan_nilai_produksi_uraian_ket?></option>
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
                                                            <input type="text" name="lokasi_pemasaran" id="lokasi_pemasaran"  class="form-control">
                                                        </div>
                                                    </div>
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
                                                        <input type="number" name="volume_nilai_produksi" id="volume_nilai_produksi"  class="form-control" >
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
                                                    <input type="number" class="form-control" name="harga_nilai_produksi" id="harga_nilai_produksi" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="tambahProduksi()" class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Tambahkan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                                    <!-- tabel alat-->
                                    <div class="col-lg-12">
                                        <table class="table table-hover table-striped" id="table-produksi">
                                            <thead>
                                                <tr>
                                                    <th>Uraian</th>
                                                    <th>Pemasaran</th>
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
                                    