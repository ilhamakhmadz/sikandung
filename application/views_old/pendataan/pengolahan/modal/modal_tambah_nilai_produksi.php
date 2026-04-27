<div id="modalTambahNilaiProduksi" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
                                <form class="form-horizontal" id="form_tambah_nilai_produksi" name="form_tambah_nilai_produksi" method="post" action="">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Data Nilai Produksi</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Uraian</label>
                                                <div class="col-lg-8">
                                                    <select class="form-control" name="nama_nilai_produksi" id="nama_nilai_produksi">
                                                        <?php foreach($nilai_produksi_master as $nilai):?>
                                                            <option value="<?=$nilai->pengolahan_nilai_produksi_uraian_id?>"><?=$nilai->pengolahan_nilai_produksi_uraian_ket?></option>
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
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-4 text-right">Volume Produk</label>
                                                <div class="col-lg-3">
                                                    <div class="input-group">
                                                        <input type="number" name="volume_nilai_produksi" id="volume_nilai_produksi"  class="form-control" >
                                                        <input type="hidden" name="pengolahan_id" id="pengolahan_id" value="<?=$pengolahan_identitas->pengolahan_id?>"  class="form-control" >
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
                                                    <input type="number" class="form-control" name="harga_nilai_produksi" id="harga_nilai_produksi" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                            <button type="submit" id="add_modal_identitas" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>    
                                
    </div>
  </div>
</div>