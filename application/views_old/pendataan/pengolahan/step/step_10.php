                            <div class="col-md-12">
                                <div class="col-md-6">
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Nama Alat Produksi</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="nama_produk_alat" id="nama_produk_alat">
                                                        <?php foreach($alat_produksi as $alat):?>
                                                            <option value="<?=$alat->pengolahan_alat_produksi_uraian_id?>"><?=$alat->pengolahan_alat_produksi_uraian_ket?></option>
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
                                                <label class="col-lg-4 text-right">Volume Alat Produksi</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <input type="number" name="volume_produk_alat" id="volume_produk_alat"  class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Harga Alat Produksi</label>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" class="form-control" name="harga_produk_alat" id="harga_produk_alat" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <a onclick="tambahAlat()" class="btn btn-success">
                                                    <i class="fa fa-plus"></i> Tambahkan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                    <div class="col-lg-12">
                                        <table class="table table-hover table-striped" id="table-alat">
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
                                    <div class="modal inmodal" id="myModalAddSatuan" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content animated flipInY">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Tambah Data Satuan</h4>
                                                </div>
                                                <form class="form-horizontal" id="form_add_satuan" name="form_add_satuan" method="post" action="<?= site_url('pendataan/umkm/add') ?>">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nama Satuan</label> 
                                                        <input type="text" name="nama_satuan" id="nama_satuan"  class="form-control" >
                                                    </div>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                    <button type="button" id="add_modal_satuan" class="btn btn-primary">Tambah</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
