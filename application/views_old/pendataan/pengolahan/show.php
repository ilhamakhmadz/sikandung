
<div class="panel">
    <div class="panel-body">
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!-- general form elements -->
          <div class="box">
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-header with-border">
                KETERANGAN KUESIONER
              </div>
              <?php 
                if($pengolahan){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Tanggal Kuesioner</div>
                  <div class="col-sm-8">
                    <?php echo date_format(date_create($pengolahan->tanggal_kuesioner), "d-m-Y"); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Responden</div>
                  <div class="col-sm-8">
                    <?php echo $pengolahan->nama_responden; ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Petugas Enumerator</div>
                  <div class="col-sm-8">
                    <?php echo $pengolahan->petugas_enumerator; ?>
                  </div>
                </div>
              </div>
              <?php
                }else{
              ?>
                <h3>Data Tidak Ditemukan</h3>
              <?php
                }
              ?>
             
              <div class="box-header with-border">
                IDENTITAS
              </div>
              <?php 
                if($pengolahan_identitas){
              ?>
              <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Kelompok</div>
                  <div class="col-sm-8">
                    <?php echo $pengolahan_identitas->nama_kelompok; ?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Nama</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->nama; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">NIK</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->nik; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jabatan Dalam Kelompok</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->jabatan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Alamat Jalan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->alamat_jalan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Desa</div>
                    <div class="col-sm-8">
                      <?php 
                        if($pengolahan_identitas->kd_desa == null){
                          echo $pengolahan_identitas->alamat_desa;
                        }else{
                          echo $pengolahan_identitas->Nama_Desa;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Kecamatan</div>
                    <div class="col-sm-8">
                      <?php 
                        if($pengolahan_identitas->kd_desa == null){
                          echo $pengolahan_identitas->alamat_kecamatan;
                        }else{
                          echo $pengolahan_identitas->Nama_Kecamatan;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Umur</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->umur; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Pendidikan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->pendidikan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Telepon</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->telepon; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Email</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_identitas->email; ?>
                    </div>
                </div>
              </div>
              <?php
                }else{
              ?>
                <h3>Data Tidak Ditemukan</h3>
              <?php
                }
              ?>
              
              <div class="box-header with-border">
                BAGIAN I. KETERANGAN UMUM
              </div>
              <?php 
                if($pengolahan_ket_umum){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jenis Perusahaan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->jenis_perusahaan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Kegiatan Usaha</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->kegiatan_usaha; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jenis Olahan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->jenis_olahan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Frekwensi Produksi per minggu</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->frekuensi_produksi_peminggu; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Mulai Berproduksi</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->mulai_berproduksi; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Luas Bangunan Keseluruhan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->luas_bangunan_keseluruhan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Luas Bangunan Produksi</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->luas_bangunan_produksi; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Permodalaan</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->permodalan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Perijinan yang sudah dimiliki</div>
                    <div class="col-sm-8">
                      <?php echo $pengolahan_ket_umum->perijinan_usaha; ?>
                    </div>
                </div>
              </div>
              <?php
                }else{
              ?>
                <h3>Data Tidak Ditemukan</h3>
              <?php
                }
              ?>
             
              <div class="box-header with-border">
                BAGIAN II. ASPEK TEKNIS
              </div>
              <div class="hr-line-dashed"></div>
              <div class="box-header with-border">
                JUMLAH PERALATAN PRODUKSI
              </div>
              <div class="br-line-dashed"></div>
              <div class="box-body table-responsive" id="list-biaya-produksi">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uraian</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($alat_produksi as $alat):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$alat->pengolahan_alat_produksi_uraian_ket?></td>
                        <td><?=$alat->pengolahan_alat_produksi_volume?></td>
                        <td><?='Rp. '.number_format($alat->pengolahan_alat_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($alat->pengolahan_alat_produksi_nilai,0,',','.')?></td>
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-header with-border">
                BAHAN BAKU UTAMA
              </div>
              <div class="br-line-dashed"></div>
              <div class="box-body table-responsive" id="list-biaya-produksi">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uraian</th>
                      <th>Asal</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($bahan_utama as $alat):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$alat->pengolahan_bahan_utama_uraian_ket?></td>
                        <td><?=$alat->pengolahan_bahan_utama_asal?></td>
                        <td><?=$alat->pengolahan_bahan_utama_volume?></td>
                        <td><?='Rp. '.number_format($alat->pengolahan_bahan_utama_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($alat->pengolahan_bahan_utama_nilai,0,',','.')?></td>
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-header with-border">
                BAHAN LAINNYA
              </div>
              <div class="box-body table-responsive" id="list-bahan-lain">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uraian</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($bahan_lainnya as $bahan_lain):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$bahan_lain->pengolahan_bahan_lain_uraian_ket?></td>
                        <td><?=$bahan_lain->pengolahan_bahan_lain_volume?></td>
                        <td><?='Rp. '.number_format($bahan_lain->pengolahan_bahan_lain_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($bahan_lain->pengolahan_bahan_lain_nilai,0,',','.')?></td>
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-header with-border">
                NILAI PRODUKSI
              </div>
              <div class="box-body table-responsive" id="list-nilai-produksi">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uraian</th>
                      <th>Lokasi Pemasaran</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($nilai_produksi as $nilai_produksi):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$nilai_produksi->pengolahan_nilai_produksi_uraian_ket?></td>
                        <td><?=$nilai_produksi->pengolahan_nilai_lokasi_pemasaran?></td>
                        <td><?=$nilai_produksi->pengolahan_nilai_produksi_volume?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->pengolahan_nilai_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->pengolahan_nilai_produksi_nilai,0,',','.')?></td>
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-header with-border">
                SERTIFIKAT DAN PERIJINAN
              </div>
              <div class="box-body table-responsive" id="list-nilai-produksi">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Jenis Perijinan</th>
                      <th>No</th>
                      <th>Tanggal Perijinan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($perijinan as $perijinan):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$perijinan->pengolahan_perijinan_uraian_ket?></td>
                        <td>
                          <?=$perijinan->pengolahan_perijinan_no?>
                        </td>
                        <td><?=date_format(date_create($perijinan->pengolahan_perijinan_tgl), "d-m-Y")?></td>
                      
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-footer">&nbsp;</div>
              <br>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
</script>
