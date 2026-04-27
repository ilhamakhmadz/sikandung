<html>
<head>
<title>Kuesioner Tangkap Perikanan</title>
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
<body>
  <div class="pos" id="_336:101" style="top:50;left:236">
    <span id="_16.1" style="font-weight:bold; font-family:Arial; font-size:16.1px; color:#000000">
    HASIL KUESIONER PERIKANAN TANGKAP</span>
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
    if($tangkap){
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
                  <p class="tableKet"><span><?php echo date_format(date_create($tangkap->tanggal_kuesioner), "d-m-Y"); ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap->nama_responden; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap->petugas_enumerator; ?></span></p>
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
      if($tangkap_identitas){
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->nama_kelompok; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->nama; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->nik; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->jabatan; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->alamat_jalan; ?></span></p>
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
                        if($tangkap_identitas->kd_desa == null){
                          echo $tangkap_identitas->alamat_desa;
                        }else{
                          echo $tangkap_identitas->Nama_Desa;
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
                        if($tangkap_identitas->kd_desa == null){
                          echo $tangkap_identitas->alamat_kecamatan;
                        }else{
                          echo $tangkap_identitas->Nama_Kecamatan;
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->umur; ?></span></p>
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
                  <p class="tableKet"><span> <?php echo $tangkap_identitas->pendidikan; ?></span></p>
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
                  <p class="tableKet"><span><?php echo $tangkap_identitas->telepon; ?></span></p>
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
                  <p class="tableKet"><span> <?php echo $tangkap_identitas->email; ?></span></p>
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
    if($tangkap_ket_umum){
  ?>
  <table style="border-collapse:collapse;border:none;">
      <tbody>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Jenis Perairan Umum</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $tangkap_ket_umum->tangkap_jenis_perairan; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Luas PU (Ha/m2)</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $tangkap_ket_umum->luas_pu_m2; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Pengelola PU</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span><?php echo $tangkap_ket_umum->pengelola_pu; ?></span></p>
              </td>
          </tr>
          <tr>
              <td style="width: 169.85pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>Trip Penangkapan / Bulan</span></p>
              </td>
              <td style="width: 14.2pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span>:</span></p>
              </td>
              <td style="width: 266.75pt;padding: 2px 6pt;vertical-align: top;">
                  <p class="tableKet"><span> <?php echo $tangkap_ket_umum->jumlah_trip_penangkapan_sebulan; ?></span></p>
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
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->tangkap_biaya_produksi_uraian_ket?></span></p>
              </td>
              <td style="width: 79.7pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->tangkap_jenis_nama?> - 
                          <?=$biaya->tangkap_kategori_nama?></span></p>
              </td>
              <td style="width: 65.95pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$biaya->tangkap_biaya_produksi_volume?></span></p>
              </td>
              <td style="width: 3cm;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($biaya->tangkap_biaya_produksi_harga,0,',','.')?></span></p>
              </td>
              <td style="width: 134.65pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($biaya->tangkap_biaya_produksi_nilai,0,',','.')?></span></p>
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
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->tangkap_nilai_produksi_uraian_ket?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->tangkap_jenis_nama?> - 
                          <?=$nilai_produksi->tangkap_kategori_nama?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$nilai_produksi->tangkap_nilai_produksi_volume?></span></p>
              </td>
              <td style="width: 85.6pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($nilai_produksi->tangkap_nilai_produksi_harga,0,',','.')?></span></p>
              </td>
              <td style="width: 120.45pt;border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?='Rp. '.number_format($nilai_produksi->tangkap_nilai_produksi_nilai,0,',','.')?></span></p>
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
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$perijinan->tangkap_perijinan_uraian_ket?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=$perijinan->tangkap_perijinan_no?></span></p>
              </td>
              <td style="border-top: none;border-left: none;border-bottom: 1pt solid rgb(231, 231, 231);border-right: 1pt solid rgb(231, 231, 231);padding: 6pt;vertical-align: top;">
                  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:13px;font-family:"Times New Roman",serif;'><?=date_format(date_create($perijinan->tangkap_perijinan_tgl), "d-m-Y")?></span></p>
              </td>
          </tr>
        <?php $no++; endforeach;?>

      </tbody>
  </table>
  <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
</body>
</html>