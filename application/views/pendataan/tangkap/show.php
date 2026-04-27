
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
                if($tangkap){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Tanggal Kuesioner</div>
                  <div class="col-sm-8">
                    <?php echo date_format(date_create($tangkap->tanggal_kuesioner), "d-m-Y"); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Responden</div>
                  <div class="col-sm-8">
                    <?php echo $tangkap->nama_responden; ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Petugas Enumerator</div>
                  <div class="col-sm-8">
                    <?php echo $tangkap->petugas_enumerator; ?>
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
                if($tangkap_identitas){
              ?>
              <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-4" style="text-align: right;">Nama Kelompok</div>
                  <div class="col-sm-8">
                    <?php echo $tangkap_identitas->nama_kelompok; ?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Nama</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->nama; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">NIK</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->nik; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jabatan Dalam Kelompok</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->jabatan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Alamat Jalan</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->alamat_jalan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Desa</div>
                    <div class="col-sm-8">
                      <?php 
                        if($tangkap_identitas->kd_desa == null){
                          echo $tangkap_identitas->alamat_desa;
                        }else{
                          echo $tangkap_identitas->Nama_Desa;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Kecamatan</div>
                    <div class="col-sm-8">
                      <?php 
                        if($tangkap_identitas->kd_desa == null){
                          echo $tangkap_identitas->alamat_kecamatan;
                        }else{
                          echo $tangkap_identitas->Nama_Kecamatan;
                        }
                      ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Umur</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->umur; ?> Tahun
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Pendidikan</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->pendidikan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Telepon</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->telepon; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Email</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_identitas->email; ?>
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
                if($tangkap_ket_umum){
              ?>
               <div class="hr-line-dashed"></div>
              <div class="box-body">
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jenis Perairan Umum</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_ket_umum->tangkap_jenis_perairan; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Luas PU (Ha/m2)</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_ket_umum->luas_pu_m2; ?> m2
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Pengelola PU</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_ket_umum->pengelola_pu; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4" style="text-align: right;">Jumlah Trip Penangkapan (Dalam Sebulan)</div>
                    <div class="col-sm-8">
                      <?php echo $tangkap_ket_umum->jumlah_trip_penangkapan_sebulan; ?>
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
                        <td><?=$biaya->tangkap_biaya_produksi_uraian_ket?></td>
                        <td>
                          <?=$biaya->tangkap_jenis_nama?> - 
                          <?=$biaya->tangkap_kategori_nama?>
                        </td>
                        <td><?=$biaya->tangkap_biaya_produksi_volume?></td>
                        <td><?='Rp. '.number_format($biaya->tangkap_biaya_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($biaya->tangkap_biaya_produksi_nilai,0,',','.')?></td>
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
                        <td><?=$nilai_produksi->tangkap_nilai_produksi_uraian_ket?></td>
                        <td>
                          <?=$nilai_produksi->tangkap_jenis_nama?> - 
                          <?=$nilai_produksi->tangkap_kategori_nama?>
                        </td>
                        <td><?=$nilai_produksi->tangkap_nilai_produksi_volume?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->tangkap_nilai_produksi_harga,0,',','.')?></td>
                        <td><?='Rp. '.number_format($nilai_produksi->tangkap_nilai_produksi_nilai,0,',','.')?></td>
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
                        <td><?=$perijinan->tangkap_perijinan_uraian_ket?></td>
                        <td>
                          <?=$perijinan->tangkap_perijinan_no?>
                        </td>
                        <td><?=date_format(date_create($perijinan->tangkap_perijinan_tgl), "d-m-Y")?></td>
                      
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
