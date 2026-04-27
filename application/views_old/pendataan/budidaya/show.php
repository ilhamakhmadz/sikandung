
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
                if($budidaya){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Tanggal Kuesioner</div>
                  <div class="col-sm-8">
                    <?php echo date_format(date_create($budidaya->tanggal_kuesioner), "d-m-Y"); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Responden</div>
                  <div class="col-sm-8">
                    <?php echo $budidaya->nama_responden; ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Petugas Enumerator</div>
                  <div class="col-sm-8">
                    <?php echo $budidaya->petugas_enumerator; ?>
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
                if($budidaya_identitas){
              ?>
              <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Kelompok</div>
                  <div class="col-sm-8">
                    <?php echo $budidaya_identitas->nama_kelompok; ?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Nama</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->nama; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">NIK</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->nik; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jabatan Dalam Kelompok</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->jabatan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Alamat Jalan</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->alamat_jalan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Desa</div>
                    <div class="col-sm-8">
                      <?php 
                        if($budidaya_identitas->kd_desa == null){
                          echo $budidaya_identitas->alamat_desa;
                        }else{
                          echo $budidaya_identitas->Nama_Desa;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Kecamatan</div>
                    <div class="col-sm-8">
                      <?php 
                        if($budidaya_identitas->kd_desa == null){
                          echo $budidaya_identitas->alamat_kecamatan;
                        }else{
                          echo $budidaya_identitas->Nama_Kecamatan;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Umur</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->umur; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Pendidikan</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->pendidikan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Telepon</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->telepon; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Email</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_identitas->email; ?>
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
                if($budidaya_ket_umum){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jenis Perusahaan</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->jenis_perusahaan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Kegiatan Usaha</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->kegiatan_usaha; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Frekwensi Panen dalam  1 tahun</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->frekuensi_panen_setahun; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Mulai Budidaya</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->mulai_budidaya; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Luas Kolam</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->luas_kolam_m2; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Status Kolam</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->status_kolam; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Permodalaan</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->permodalan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Sertifikat/Perijinan Usaha</div>
                    <div class="col-sm-8">
                      <?php echo $budidaya_ket_umum->perijinan_usaha; ?>
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
                BIAYA PRODUKSI PER SEKALI SIKLUS
              </div>
              <div class="br-line-dashed"></div>
              <div class="box-body table-responsive" id="list-biaya-produksi">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Uraian</th>
                      <th>Jenis</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($biaya_produksi as $biaya):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$biaya->budidaya_biaya_produksi_uraian_ket?></td>
                        <td>
                          <?=$biaya->budidaya_jenis_nama?> - 
                          <?=$biaya->budidaya_kategori_nama?>
                        </td>
                        <td><?=$biaya->budidaya_biaya_produksi_volume?></td>
                        <td><?='Rp. '.number_format($biaya->budidaya_biaya_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($biaya->budidaya_biaya_produksi_nilai,0,',','.')?></td>
                      </tr>
                    <?php $no++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <div class="box-header with-border">
                BAHAN LAINNYA PER SEKALI PRODUKSI
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
                        <td><?=$bahan_lain->budidaya_bahan_lain_uraian_ket?></td>
                        <td><?=$bahan_lain->budidaya_bahan_lain_volume?></td>
                        <td><?='Rp. '.number_format($bahan_lain->budidaya_bahan_lain_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($bahan_lain->budidaya_bahan_lain_nilai,0,',','.')?></td>
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
                      <th>Jenis</th>
                      <th>Volume</th>
                      <th>Harga</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($nilai_produksi as $nilai_produksi):?>
                      <tr>
                        <td style="width: 10px"><?= $no?></td>
                        <td><?=$nilai_produksi->budidaya_nilai_produksi_uraian_ket?></td>
                        <td>
                          <?=$nilai_produksi->budidaya_jenis_nama?> - 
                          <?=$nilai_produksi->budidaya_kategori_nama?>
                        </td>
                        <td><?=$nilai_produksi->budidaya_nilai_produksi_volume?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->budidaya_nilai_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->budidaya_nilai_produksi_nilai,0,',','.')?></td>
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
                        <td><?=$perijinan->budidaya_perijinan_uraian_ket?></td>
                        <td>
                          <?=$perijinan->budidaya_perijinan_no?>
                        </td>
                        <td><?=date_format(date_create($perijinan->budidaya_perijinan_tgl), "d-m-Y")?></td>
                      
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
