<html>
<head>
<title>Kuesioner Budidaya Perikanan</title>
<style type="text/css">
<!--
/* body { font-family: Arial;  } */
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }
.posBody { position: absolute; padding:0px 0px 40px 10px; z-index: 0; left: 0px; top: 0px }
.tableKet { margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;background:white}
span{ font-size:13px;line-height:115%;font-family:"Open Sans",sans-serif;color:black;}
.subTable{width: 26.7pt;border-top: none;border-left: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;}
-->
</style>
</head>
<body style="padding:0px 0px 60px 10px; ">
  <div class="pos" id="_336:101" style="top:50;left:236">
    <span id="_16.1" style="font-weight:bold; font-family:Arial; font-size:16.1px; color:#000000">
    HASIL KUESIONER BUDIDAYA PERIKANAN</span>
  </div>
  <div class="pos" id="_221:130" style="top:75;left:221">
    <span id="_16.1" style="font-weight:bold; font-family:Arial; font-size:16.1px; color:#000000">
    DINAS KETAHANAN PANGAN DAN PERIKANAN</span>
  </div>
  <div class="pos" id="_316:158" style="top:100;left:316">
    <span id="_16.1" style="font-weight:bold; font-family:Arial; font-size:16.1px; color:#000000">
    KABUPATEN BANDUNG</span>
  </div>
  <br><br><br><br><br>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;line-height:150%;font-family:"Open Sans",sans-serif;color:black;'><strong>KETERANGAN KUESIONER</strong></span></p>
  <?php 
    if($budidaya){
  ?>
  <table style="border-collapse:collapse;border:none;">
      <tbody>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Tanggal Kuesioner</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo date_format(date_create($budidaya->tanggal_kuesioner), "d-m-Y"); ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Nama Responden</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya->nama_responden; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Petugas Enumerator</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya->petugas_enumerator; ?></span></p>
              </td>
          </tr>
      </tbody>
  </table>
  <?php
    }else{
  ?>
    <h3>Data Tidak Ditemukan</h3>
  <?php
      }
  ?>
  <p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;line-height:150%;font-family:"Open Sans",sans-serif;color:black;'><strong>IDENTITAS</strong></span></p>
  <?php 
      if($budidaya_identitas){
  ?>
  <table style="border-collapse:collapse;border:none;">
      <tbody>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Nama Kelompok</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->nama_kelompok; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Nama</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->nama; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>NIK</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->nik; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Jabatan Dalam Kelompok</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->jabatan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Alamat Jalan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->alamat_jalan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Desa</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php 
                        if($budidaya_identitas->kd_desa == null){
                          echo $budidaya_identitas->alamat_desa;
                        }else{
                          echo $budidaya_identitas->Nama_Desa;
                        }
                      ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Kecamatan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span> <?php 
                        if($budidaya_identitas->kd_desa == null){
                          echo $budidaya_identitas->alamat_kecamatan;
                        }else{
                          echo $budidaya_identitas->Nama_Kecamatan;
                        }
                      ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Umur</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->umur; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Pendidikan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span> <?php echo $budidaya_identitas->pendidikan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;height: 3.5pt;vertical-align: top;">
                  <p class="tableKet"><span>Telepon</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;height: 3.5pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;height: 3.5pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_identitas->telepon; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Email</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span> <?php echo $budidaya_identitas->email; ?></span></p>
              </td>
          </tr>
      </tbody>
  </table>
  <?php
    }else{
  ?>
    <h3>Data Tidak Ditemukan</h3>
  <?php
       }
  ?>
              
  <p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-family:"Open Sans",sans-serif;color:black;'><strong>BAGIAN I. KETERANGAN UMUM</strong></span></p>
  <?php 
    if($budidaya_ket_umum){
  ?>
  <table style="border-collapse:collapse;border:none;">
      <tbody>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Jenis Perusahaan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->jenis_perusahaan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Kegiatan Usaha</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->kegiatan_usaha; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Frekwensi Panen / tahun</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->frekuensi_panen_setahun; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Mulai Budidaya</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span> <?php echo $budidaya_ket_umum->mulai_budidaya; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Luas Kolam</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->luas_kolam_m2; ?> m2</span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Status Kolam</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->status_kolam; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Permodalaan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->permodalan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Sertifikat/Perijinan Usaha</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $budidaya_ket_umum->perijinan_usaha; ?></span></p>
              </td>
          </tr>
      </tbody>
  </table>
  
  <?php
   }else{
  ?>
    <h3>Data Tidak Ditemukan</h3>
  <?php
    }
  ?>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><br></p>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-family:"Open Sans",sans-serif;color:black;'><strong>BAGIAN II. ASPEK TEKNIS</strong></span></p>
  <p class="tableKet"><span>BIAYA PRODUKSI PER SEKALI SIKLUS</span></p>
  <table style="width:453.2pt;border-collapse:collapse;border:none;">
      <thead>
          <tr>
              <td style="width: 26.7pt;border-top: none;border-left: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>No</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Uraian</span></p>
              </td>
              <td style="width: 79.7pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Jenis</span></p>
              </td>
              <td style="width: 65.95pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Volume</span></p>
              </td>
              <td style="width: 3cm;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Harga</span></p>
              </td>
              <td style="width: 134.65pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;height: 23.6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Nilai</span></p>
              </td>
          </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach($biaya_produksi as $biaya):?>
          <tr>
              <td style="width: 26.7pt;border-right: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(231, 231, 231);border-left: 1pt solid rgb(231, 231, 231);border-image: initial;border-top: none;padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?= $no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->budidaya_biaya_produksi_uraian_ket?></span></p>
              </td>
              <td style="width: 79.7pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->budidaya_jenis_nama?> - 
                          <?=$biaya->budidaya_kategori_nama?></span></p>
              </td>
              <td style="width: 65.95pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->budidaya_biaya_produksi_volume?></span></p>
              </td>
              <td style="width: 3cm;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($biaya->budidaya_biaya_produksi_harga,0,',','.')?></span></p>
              </td>
              <td style="width: 134.65pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($biaya->budidaya_biaya_produksi_nilai,0,',','.')?></span></p>
              </td>
          </tr>
          <?php $no++; endforeach;?>

      </tbody>
  </table>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;font-family:"Open Sans",sans-serif;'>&nbsp;</span></p>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;line-height:150%;font-family:"Open Sans",sans-serif;color:black;'>BAHAN LAINNYA PER SEKALI PRODUKSI</span></p>
  <table style="width:453.2pt;border-collapse:collapse;border:none;">
      <thead>
          <tr>
              <td style="width: 18pt;border-top: none;border-left: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>No</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Uraian</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Volume</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Harga</span></p>
              </td>
              <td style="width: 176.45pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Nilai</span></p>
              </td>
          </tr>
      </thead>
      <tbody>
      <?php $no = 1; foreach($bahan_lainnya as $bahan_lain):?>
          <tr>
              <td style="width: 18pt;border-right: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(231, 231, 231);border-left: 1pt solid rgb(231, 231, 231);border-image: initial;border-top: none;padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?= $no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$bahan_lain->budidaya_bahan_lain_uraian_ket?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$bahan_lain->budidaya_bahan_lain_volume?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($bahan_lain->budidaya_bahan_lain_harga,0,',','.')?></span></p>
              </td>
              <td style="width: 176.45pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($bahan_lain->budidaya_bahan_lain_nilai,0,',','.')?></span></p>
              </td>
          </tr>
        <?php $no++; endforeach;?>
      </tbody>
  </table>
  <p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;line-height:150%;font-family:"Open Sans",sans-serif;color:black;'>NILAI PRODUKSI</span></p>
  <table style="width:453.2pt;border-collapse:collapse;border:none;">
      <thead>
          <tr>
              <td style="width: 26.7pt;border-top: none;border-left: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>No</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Uraian</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Jenis</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Volume</span></p>
              </td>
              <td style="width: 85.6pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Harga</span></p>
              </td>
              <td style="width: 120.45pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Nilai</span></p>
              </td>
          </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach($nilai_produksi as $nilai_produksi):?>
          <tr>
              <td style="width: 26.7pt;border-right: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(231, 231, 231);border-left: 1pt solid rgb(231, 231, 231);border-image: initial;border-top: none;padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?= $no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->budidaya_nilai_produksi_uraian_ket?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->budidaya_jenis_nama?> - 
                          <?=$nilai_produksi->budidaya_kategori_nama?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->budidaya_nilai_produksi_volume?></span></p>
              </td>
              <td style="width: 85.6pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($nilai_produksi->budidaya_nilai_produksi_harga,0,',','.')?></span></p>
              </td>
              <td style="width: 120.45pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($nilai_produksi->budidaya_nilai_produksi_nilai,0,',','.')?></span></p>
              </td>
          </tr>
        <?php $no++; endforeach;?>

      </tbody>
  </table>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
  <p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:150%;font-size:15px;font-family:"Calibri",sans-serif;background:white;'><span style='font-size:13px;line-height:150%;font-family:"Open Sans",sans-serif;color:black;'>SERTIFIKAT DAN PERIJINAN</span></p>
  <table style="width:453.2pt;border-collapse:collapse;border:none;">
      <thead>
          <tr>
              <td style="width: 26.7pt;border-top: none;border-left: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>No</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Jenis Perijinan</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>No</span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(221, 221, 221);border-right: 1pt solid rgb(231, 231, 231);background: rgb(245, 245, 246);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:13px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Tanggal</span></p>
              </td>
          </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach($perijinan as $perijinan):?>
          <tr>
              <td style="width: 26.7pt;border-right: 1pt solid rgb(231, 231, 231);border-bottom: 1pt solid rgb(231, 231, 231);border-left: 1pt solid rgb(231, 231, 231);border-image: initial;border-top: none;padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?= $no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$perijinan->budidaya_perijinan_uraian_ket?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$perijinan->budidaya_perijinan_no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=date_format(date_create($perijinan->budidaya_perijinan_tgl), "d-m-Y")?></span></p>
              </td>
          </tr>
        <?php $no++; endforeach;?>

      </tbody>
  </table>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
</body>
</html>