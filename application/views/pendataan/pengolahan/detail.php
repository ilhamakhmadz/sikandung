        <div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="m-b-md">
                                                <h2>KETERANGAN KUESIONER</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($pengolahan){
                                    ?>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>TANGGAL KUESIONER:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo date_format(date_create($pengolahan->tanggal_kuesioner), "d-m-Y"); ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>NAMA RESPONDEN:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan->nama_responden; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>PETUGAS ENUMERATOR:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan->petugas_enumerator; ?></dd>
                                            </div>
                                        </dl>
                                    <?php
                                        }else{
                                    ?>
                                        <h3>Data Tidak Ditemukan</h3>
                                    <?php
                                        }
                                    ?>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="m-b-md">
                                                <h2>IDENTITAS</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($pengolahan_identitas){
                                    ?>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NAMA KELOMPOK:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->nama_kelompok; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NAMA:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->nama; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NIK:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->nik; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>JABATAN:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"> <?php echo $pengolahan_identitas->jabatan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>ALAMAT:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->alamat_jalan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>DESA:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1">
                                                <?php 
                                                    if($pengolahan_identitas->kd_desa == null){
                                                    echo $pengolahan_identitas->alamat_desa;
                                                    }else{
                                                    echo $pengolahan_identitas->Nama_Desa;
                                                    }
                                                ?>    
                                            </dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>KECAMATAN:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1">
                                                <?php 
                                                    if($pengolahan_identitas->kd_desa == null){
                                                    echo $pengolahan_identitas->alamat_kecamatan;
                                                    }else{
                                                    echo $pengolahan_identitas->Nama_Kecamatan;
                                                    }
                                                ?>    
                                            </dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>UMUR:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->umur; ?> Tahun</dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>PENDIDIKAN:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->pendidikan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>TELEPON:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->telepon; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>EMAIL:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $pengolahan_identitas->email; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-12 text-sm-left" style="padding-top:10px;">
                                            <a data-toggle="modal" data-target="#modalIdentitas" class="btn btn-primary btn-xs float-right">Edit Data</a>
                                        </div>    
                                    </dl>
                                    <?php
                                        }else{
                                    ?>
                                     <h3>Data Tidak Ditemukan</h3>
                                     <?php
                                        }
                                    ?>
                                   
                                    
                                </div>
                                <div class="col-lg-6" id="cluster_info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="m-b-md">
                                                <h2>KETERANGAN UMUM</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($pengolahan_ket_umum){
                                    ?>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>JENIS PERUSAHAAN</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan_ket_umum->jenis_perusahaan; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>KEGIATAN USAHA:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo $pengolahan_ket_umum->kegiatan_usaha; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>JENIS OLAHAN:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo $pengolahan_ket_umum->jenis_olahan; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>FREKUENSI PANEN PERMINGGU:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan_ket_umum->frekuensi_produksi_peminggu; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>MULAI BERPRODUKSI</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan_ket_umum->mulai_berproduksi; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>LUAS BANGUNAN KESELURUHAN:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo $pengolahan_ket_umum->luas_bangunan_keseluruhan; ?> m2</dd>
                                            </div>
                                        </dl>
                                    
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>LUAS BANGUNAN PRODUKSI:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan_ket_umum->luas_bangunan_produksi; ?> m2</dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>PEMODALAN:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo $pengolahan_ket_umum->permodalan; ?></dd>
                                            </div>
                                        </dl>
                                        
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>SERTIFIKAT/PERIJINAN USAHA:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $pengolahan_ket_umum->perijinan_usaha; ?></dd>
                                            </div>
                                        </dl>
                                    <?php
                                        }else{
                                    ?>
                                     <h3>Data Tidak Ditemukan</h3>
                                     <?php
                                        }
                                    ?>
                                    
                                </div>
                                    <div class="modal fade bd-example-modal-xl"  id="modalIdentitas" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" style="width:80%;margin:0px auto;">
                                            <div class="modal-content animated flipInY">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">Ubah Data Identitas</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <form class="form-horizontal" id="form_kuesioner" name="form_kuesioner" method="post" action="">
                                                                <div class="col-md-12">
                                                                    <div class="m-b-md">
                                                                        <h2>KETERANGAN KUESIONER</h2>
                                                                    </div>
                                                                    <?php 
                                                                        if($pengolahan){
                                                                    ?>
                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Tanggal Kuesioner</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="pengolahan_id" name="pengolahan_id" type="hidden" class="form-control" value="<?= $pengolahan->pengolahan_id; ?>" required>
                                                                                <input id="tanggal_kuesionertext" name="tanggal_kuesionertext" type="text" class="form-control" value="<?= $pengolahan->tanggal_kuesioner ?>" disabled required>
                                                                                <input id="tanggal_kuesioner" name="tanggal_kuesioner" type="hidden" class="form-control" value="<?= $pengolahan->tanggal_kuesioner ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Petugas Enumerator</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="petugas_enumeratortext" name="petugas_enumeratortext" type="text" class="form-control" value="<?= $pengolahan->petugas_enumerator; ?>" disabled required>
                                                                                <input id="petugas_enumerator" name="petugas_enumerator" type="hidden" class="form-control" value="<?= $pengolahan->petugas_enumerator; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama Responden</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="nama_responden" name="nama_responden" type="text" class="form-control" value="<?=$pengolahan->nama_responden?>" required>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                        }else{
                                                                    ?>
                                                                    <h3>Data Tidak Ditemukan</h3>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="m-b-md">
                                                                        <h2>IDENTITAS RESPONDEN</h2>
                                                                    </div>
                                                                </div>
                                                                <?php 
                                                                    if($pengolahan_identitas){
                                                                ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                                            <input id="pengolahan_id" name="pengolahan_id" type="hidden" class="form-control" value="<?= $pengolahan_identitas->pengolahan_identitas_id; ?>" required>
                                                                            <div class="col-sm-9"><input id="kelompok" name="kelompok" type="text"  class="form-control" value="<?= $pengolahan_identitas->nama_kelompok; ?>" required></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9"><input id="nama" name="nama" type="text"  class="form-control" value="<?= $pengolahan_identitas->nama; ?>" required ></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">NIK</label>
                                                                            <div class="col-sm-6"><input id="nik" name="nik" disabled type="text"  class="form-control" value="<?= $pengolahan_identitas->nik; ?>" required minlength="16" maxlength="16"></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                                                            <div class="col-sm-9"><input id="jabatan" name="jabatan" type="text"  class="form-control" value="<?= $pengolahan_identitas->jabatan; ?>" required ></div>
                                                                        </div>
                                                                    
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Umur</label>
                                                                            <div class="col-sm-9"><input id="umur" name="umur" type="text"  class="form-control" value="<?= $pengolahan_identitas->umur; ?>" required ></div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Pendidikan</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control" name="pendidikan" id="pendidikan">
                                                                                        <option value="SD" <?= $pengolahan_identitas->pendidikan == 'SD' ? 'selected' : '';?>>SD</option>
                                                                                        <option value="SMP/Sederajat" <?= $pengolahan_identitas->pendidikan == 'SMP/Sederajat' ? 'selected' : '';?>>SMP/Sederajat</option>
                                                                                        <option value="SMA/Sederajat" <?= $pengolahan_identitas->pendidikan == 'SMA/Sederajat' ? 'selected' : '';?>>SMA/Sederajat</option>
                                                                                        <option value="D3" <?= $pengolahan_identitas->pendidikan == 'D3' ? 'selected' : '';?>>D III</option>
                                                                                        <option value="S1" <?= $pengolahan_identitas->pendidikan == 'S1' ? 'selected' : '';?>>S1</option>
                                                                                        <option value="S2" <?= $pengolahan_identitas->pendidikan == 'S2' ? 'selected' : '';?>>S2</option>
                                                                                        <option value="S3" <?= $pengolahan_identitas->pendidikan == 'S3' ? 'selected' : '';?>>S3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Telepon</label>
                                                                            <div class="col-sm-9"><input id="telepon" name="telepon" type="text"  class="form-control" value="<?= $pengolahan_identitas->telepon; ?>" required ></div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                            <div class="col-sm-9"><input id="email" name="email" type="text"  class="form-control" value="<?= $pengolahan_identitas->email; ?>" required ></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Kab/Kota</label>
                                                                            <div class="col-sm-9"><input id="kabupaten" disabled name="kabupaten" value="<?=$kabupaten->nama_kabupaten?>" type="text" class="form-control"></div>
                                                                            <div class="col-sm-9"><input id="kd_kabupaten" value="<?=$kabupaten->kd_kabupaten?>" name="kd_kabupaten" type="hidden" class="form-control"></div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control" name="kecamatan" id="kecamatan">
                                                                                    <?php 
                                                                                        if($pengolahan_identitas->kd_kec == null){
                                                                                            echo "<option value='".$pengolahan_identitas->alamat_kecamatan."'>".$pengolahan_identitas->alamat_kecamatan."</option>";
                                                                                            foreach($kecamatan as $kec){
                                                                                                echo '<option value="'.$kec->Kd_Kec.'">'.$kec->Nama_Kecamatan.'</option>';
                                                                                            }
                                                                                        }else{
                                                                                            foreach($kecamatan as $kec){
                                                                                        ?>
                                                                                                <option value="<?=$kec->Kd_Kec?>" <?= $pengolahan_identitas->kd_kec == $kec->Kd_Kec ? 'selected' : '';?>><?=$kec->Nama_Kecamatan?></option>
                                                                                        <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Desa</label>
                                                                                <div class="col-sm-9">
                                                                                        <select class="form-control" name="desa" id="desa">
                                                                                            <option value="<?=$pengolahan_identitas->kd_desa?>"><?=$pengolahan_identitas->Nama_Desa?></option>
                                                                                        </select>
                                                                                </div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">RT/RW</label>
                                                                            <div class="col-sm-4"><input id="rt" name="rt" type="text"  class="form-control" value="<?= $pengolahan_identitas->umur; ?>" required ></div>
                                                                            <div class="col-sm-4"><input id="rw" name="rw" type="text"  class="form-control" value="<?= $pengolahan_identitas->umur; ?>" required ></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $pengolahan_identitas->alamat_jalan; ?></textarea>
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
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="m-b-md">
                                                                        <h2>KETERANGAN UMUM</h2>
                                                                    </div>
                                                                </div>
                                                                    <?php 
                                                                        if($pengolahan_identitas){
                                                                    ?>
                                                                    <div class="col-md-12">
                                                                    <div class="form-group row"><label class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="radio"><label><input type="radio" name="jenis_perusahaan" value="Perseorangan" <?= $pengolahan_ket_umum->jenis_perusahaan == 'Perseorangan' ? 'checked' : '' ?>>1. Perseorangan</label></div>
                                                                            <div class="radio"><label><input type="radio" name="jenis_perusahaan" value="Kelompok" <?= $pengolahan_ket_umum->jenis_perusahaan == 'Kelompok' ? 'checked' : '' ?>> 2. Kelompok</label></div>
                                                                            <div class="radio"><label><input type="radio" name="jenis_perusahaan" value="Koperasi" <?= $pengolahan_ket_umum->jenis_perusahaan == 'Koperasi' ? 'checked' : '' ?>> 3. Koperasi</label></div>
                                                                            <div class="radio"><label><input type="radio" name="jenis_perusahaan" value="CV/Firma/PT" <?= $pengolahan_ket_umum->jenis_perusahaan == 'CV/Firma/PT' ? 'checked' : '' ?>> 4. CV/Firma/PT</label></div>
                                                                        </div>
                                                                    </div>
                                                                        

                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Kegiatan Usaha</label>
                                                                                <div class="col-sm-9">
                                                                                    <div class="radio"><label><input type="radio" name="kegiatan_usaha" value="Pengolahan/Produksi" <?= $pengolahan_ket_umum->kegiatan_usaha == 'Pengolahan/Produksi' ? 'checked' : '' ?>>1. Pengolahan/Produksi</label></div>
                                                                                    <div class="radio"><label><input type="radio" name="kegiatan_usaha" value="Perdagangan" <?= $pengolahan_ket_umum->kegiatan_usaha == 'Perdagangan' ? 'checked' : '' ?>> 2. Perdagangan</label></div>
                                                                                    <div class="radio"><label><input type="radio" name="kegiatan_usaha" value="Keduanya" <?= $pengolahan_ket_umum->kegiatan_usaha == 'Keduanya' ? 'checked' : '' ?>> 3. Keduanya</label></div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Jenis Olahan</label>
                                                                            <div class="col-sm-8">
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Pindang" <?= $pengolahan_ket_umum->jenis_olahan == 'Pindang' ? 'checked' : '' ?>>1. Pindang</label></div>
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Abon" <?= $pengolahan_ket_umum->jenis_olahan == 'Abon' ? 'checked' : '' ?>> 2.	Abon</label></div>
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Baby Fish" <?= $pengolahan_ket_umum->jenis_olahan == 'Baby Fish' ? 'checked' : '' ?>> 3.	Baby Fish</label></div>
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Nugget" <?= $pengolahan_ket_umum->jenis_olahan == 'Nugget' ? 'checked' : '' ?>> 4.	Nugget</label></div>
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Bakso" <?= $pengolahan_ket_umum->jenis_olahan == 'Bakso' ? 'checked' : '' ?>> 5.	Bakso</label></div>
                                                                                <div class="radio"><label><input type="radio" name="jenis_olahan" value="Lainnya" <?= $pengolahan_ket_umum->jenis_olahan == 'Lainnya' ? 'checked' : '' ?>> 6.	Lainnya</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Frekwensi Produksi per minggu</label>
                                                                                <div class="col-sm-3">
                                                                                    <input id="frekuensi_produksi_peminggu" name="frekuensi_produksi_peminggu" type="number" class="form-control" value="<?= $pengolahan_ket_umum->frekuensi_produksi_peminggu; ?>" required>
                                                                                </div>
                                                                        </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Mulai Berproduksi</label>
                                                                            <div class="col-sm-3">
                                                                                <select name="tahun_berdiri" id="tahun_berdiri" class="form-control">
                                                                                    <?php
                                                                                        for($i=date('Y');$i>=date('Y')-100;$i--){
                                                                                    ?>
                                                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                                                        <option value="<?=$i?>" <?= $pengolahan_ket_umum->mulai_berproduksi == $i ? 'selected' : '' ?>> <?=$i?> </option>
                                                                                    <?php
                                                                                        }

                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Luas Bangunan Keseluruhan</label>
                                                                            <div class="col-sm-3">
                                                                                <div class="input-group">
                                                                                    <input id="luas_bangunan_keseluruhan" name="luas_bangunan_keseluruhan" type="number" value="<?php echo $pengolahan_ket_umum->luas_bangunan_keseluruhan; ?>" class="form-control" required>
                                                                                    <span class="input-group-addon">m<sup>2</sup></span> 
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Luas Bangunan Produksi</label>
                                                                            <div class="col-sm-3">
                                                                                <input id="luas_bangunan_produksi" name="luas_bangunan_produksi" value="<?php echo $pengolahan_ket_umum->luas_bangunan_produksi; ?>" type="number" class="form-control" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Pemodalan</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="radio"><label><input type="radio" name="permodalan" value="Modal Sendiri" <?= $pengolahan_ket_umum->permodalan == 'Modal Sendiri' ? 'checked' : '' ?>> 1.	Modal Sendiri</label></div>
                                                                                <div class="radio"><label><input type="radio" name="permodalan" value="Modal Bersama" <?= $pengolahan_ket_umum->permodalan == 'Modal Bersama' ? 'checked' : '' ?>> 2.	Modal Bersama</label></div>
                                                                                <div class="radio"><label><input type="radio" name="permodalan" value="Modal Orang Lain" <?= $pengolahan_ket_umum->permodalan == 'Modal Orang Lain' ? 'checked' : '' ?>> 3.	Modal Orang Lain</label></div>
                                                                                <div class="radio"><label><input type="radio" name="permodalan" value="Modal Asing" <?= $pengolahan_ket_umum->permodalan == 'Modal Asing' ? 'checked' : '' ?>> 4.	Modal Asing</label></div>
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row"><label class="col-sm-3 col-form-label">Nama Penyuluh Perikanan</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="radio"><label><input type="radio" name="perijinan_usaha" value="SIUP" <?= $pengolahan_ket_umum->perijinan_usaha == 'SIUP' ? 'checked' : '' ?>> 1.	SIUP</label></div>
                                                                            <div class="radio"><label><input type="radio" name="perijinan_usaha" value="CBIB" <?= $pengolahan_ket_umum->perijinan_usaha == 'CBIB' ? 'checked' : '' ?>> 2.	CBIB</label></div>
                                                                            <div class="radio"><label><input type="radio" name="perijinan_usaha" value="CPIB" <?= $pengolahan_ket_umum->perijinan_usaha == 'CPIB' ? 'checked' : '' ?>> 3.	CPIB</label></div>
                                                                            <div class="radio"><label><input type="radio" name="perijinan_usaha" value="Lainnya" <?= $pengolahan_ket_umum->perijinan_usaha == 'Lainnya' ? 'checked' : '' ?>> 4.	Lainnya</label></div>
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
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                                                    <button type="submit" id="add_modal_identitas" class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a class="nav-link active"  href="#tab-2" data-toggle="tab">PERALATAN PRODUKSI</a></li>
                                                    <li><a class="nav-link" href="#tab-1" data-toggle="tab">BAHAN UTAMA</a></li>
                                                    <li><a class="nav-link" href="#tab-3" data-toggle="tab">BAHAN LAINNYA</a></li>
                                                    <li><a class="nav-link" href="#tab-4" data-toggle="tab">NILAI PRODUKSI</a></li>
                                                    <li><a class="nav-link" href="#tab-5" data-toggle="tab">SERTIFIKAT DAN PERIJINAN</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-2">
                                                    <a data-toggle="modal" data-target="#modalTambahAlat" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Uraian</th>
                                                            <th>Volume</th>
                                                            <th>Harga</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $no = 1; foreach($alat_produksi as $alat):?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?=site_url('pendataan/pengolahan/edit_alat_produksi/').$alat->pengolahan_alat_produksi_id.'/'.$alat->pengolahan_id?>" data-button="Edit">
                                                                        <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                    </a>
                                                                    <a href="<?=site_url('pendataan/pengolahan/delete_alat_produksi/').$alat->pengolahan_alat_produksi_id.'/'.$alat->pengolahan_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>

                                                                </td>
                                                                <td><?=$alat->pengolahan_alat_produksi_uraian_ket?></td>
                                                                <td><?=$alat->pengolahan_alat_produksi_volume?></td>
                                                                <td><?='Rp. '.number_format($alat->pengolahan_alat_produksi_harga,0,',','.')?></td>
                                                                <td><?='Rp. '.number_format($alat->pengolahan_alat_produksi_nilai,0,',','.')?></td>
                                                            </tr>
                                                            <?php $no++; endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="tab-pane" id="tab-1">
                                                    <a data-toggle="modal" data-target="#modalTambahBahanUtama" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Uraian</th>
                                                            <th>Asal</th>
                                                            <th>Volume</th>
                                                            <th>Harga</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $no = 1; foreach($bahan_utama as $bahan_utama):?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?=site_url('pendataan/pengolahan/edit_bahan_utama/').$bahan_utama->pengolahan_bahan_utama_id.'/'.$bahan_utama->pengolahan_id?>" data-button="Edit">
                                                                        <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                    </a>
                                                                    <a href="<?=site_url('pendataan/pengolahan/delete_bahan_utama/').$bahan_utama->pengolahan_bahan_utama_id.'/'.$bahan_utama->pengolahan_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                <td><?=$bahan_utama->pengolahan_bahan_utama_uraian_ket?></td>
                                                                <td><?=$bahan_utama->pengolahan_bahan_utama_asal?></td>
                                                                <td><?=$bahan_utama->pengolahan_bahan_utama_volume?></td>
                                                                <td><?='Rp. '.number_format($bahan_utama->pengolahan_bahan_utama_harga,0,',','.')?></td>
                                                                <td><?='Rp. '.number_format($bahan_utama->pengolahan_bahan_utama_nilai,0,',','.')?></td>
                                                            </tr>
                                                        <?php $no++; endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="tab-pane" id="tab-3">
                                                    <a data-toggle="modal" data-target="#modalTambahBahanLain" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Uraian</th>
                                                            <th>Volume</th>
                                                            <th>Harga</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $no = 1; foreach($bahan_lainnya as $bahan_lain):?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?=site_url('pendataan/pengolahan/edit_bahan_lain/').$bahan_lain->pengolahan_bahan_lain_id.'/'.$bahan_lain->pengolahan_id?>" data-button="Edit">
                                                                        <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                    </a>
                                                                    <a href="<?=site_url('pendataan/pengolahan/delete_bahan_lain/').$bahan_lain->pengolahan_bahan_lain_id.'/'.$bahan_lain->pengolahan_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                <td><?=$bahan_lain->pengolahan_bahan_lain_uraian_ket?></td>
                                                                <td><?=$bahan_lain->pengolahan_bahan_lain_volume?></td>
                                                                <td><?='Rp. '.number_format($bahan_lain->pengolahan_bahan_lain_harga,0,',','.')?></td>
                                                                <td><?='Rp. '.number_format($bahan_lain->pengolahan_bahan_lain_nilai,0,',','.')?></td>
                                                            </tr>
                                                        <?php $no++; endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="tab-pane" id="tab-4">
                                                    <a data-toggle="modal" data-target="#modalTambahNilaiProduksi" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Uraian</th>
                                                            <th>Lokasi Pemasaran</th>
                                                            <th>Volume</th>
                                                            <th>Harga</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($nilai_produksi as $nilai_produksi):?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?= site_url('pendataan/pengolahan/edit_nilai_produksi/').$nilai_produksi->pengolahan_nilai_produksi_id.'/'.$nilai_produksi->pengolahan_id?>">
                                                                            <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                        </a>
                                                                        <a href="<?=site_url('pendataan/pengolahan/delete_nilai_produksi/').$nilai_produksi->pengolahan_nilai_produksi_id.'/'.$nilai_produksi->pengolahan_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                    </td>
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

                                                <div class="tab-pane" id="tab-5">
                                                    <a data-toggle="modal" data-target="#modalTambahPerijinan" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Nama Perijinan</th>
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($perijinan as $perijinan):?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?= site_url('pendataan/pengolahan/edit_perijinan/').$perijinan->pengolahan_perijinan_id.'/'.$perijinan->pengolahan_id?>">
                                                                            <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                        </a>
                                                                        <a href="<?=site_url('pendataan/pengolahan/delete_perijinan/').$perijinan->pengolahan_perijinan_id.'/'.$perijinan->pengolahan_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    <td><?=$perijinan->pengolahan_perijinan_uraian_ket?></td>
                                                                    <td><?=$perijinan->pengolahan_perijinan_no?></td>
                                                                    <td><?=$perijinan->pengolahan_perijinan_tgl?></td>
                                                                </tr>
                                                            <?php $no++; endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('delete-modal'); ?>
        
        <?php $this->load->view('pendataan/pengolahan/modal/modal_tambah_alat_produksi',$pengolahan_identitas); ?>
        <?php $this->load->view('pendataan/pengolahan/modal/modal_tambah_bahan_utama',$pengolahan_identitas); ?>
        <?php $this->load->view('pendataan/pengolahan/modal/modal_tambah_bahan_lain',$pengolahan_identitas); ?>
        <?php $this->load->view('pendataan/pengolahan/modal/modal_tambah_nilai_produksi',$pengolahan_identitas); ?>
        <?php $this->load->view('pendataan/pengolahan/modal/modal_tambah_perijinan',$pengolahan_identitas); ?>
