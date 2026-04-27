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
                                        if($tangkap){
                                    ?>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>TANGGAL KUESIONER:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo date_format(date_create($tangkap->tanggal_kuesioner), "d-m-Y"); ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>NAMA RESPONDEN:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $tangkap->nama_responden; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>PETUGAS ENUMERATOR:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $tangkap->petugas_enumerator; ?></dd>
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
                                        if($tangkap_identitas){
                                    ?>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NAMA KELOMPOK:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->nama_kelompok; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NAMA:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->nama; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>NIK:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->nik; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>JABATAN:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"> <?php echo $tangkap_identitas->jabatan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>ALAMAT:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->alamat_jalan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>DESA:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1">
                                                <?php 
                                                    if($tangkap_identitas->kd_desa == null){
                                                    echo $tangkap_identitas->alamat_desa;
                                                    }else{
                                                    echo $tangkap_identitas->Nama_Desa;
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
                                                    if($tangkap_identitas->kd_desa == null){
                                                    echo $tangkap_identitas->alamat_kecamatan;
                                                    }else{
                                                    echo $tangkap_identitas->Nama_Kecamatan;
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
                                            <dd class="mb-1"><?php echo $tangkap_identitas->umur; ?> Tahun</dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>PENDIDIKAN:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->pendidikan; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>TELEPON:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->telepon; ?></dd>
                                        </div>
                                    </dl>
                                    <dl class="row mb-0">
                                        <div class="col-sm-4 text-sm-right">
                                            <dt>EMAIL:</dt>
                                        </div>
                                        <div class="col-sm-8 text-sm-left">
                                            <dd class="mb-1"><?php echo $tangkap_identitas->email; ?></dd>
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
                                        if($tangkap_ket_umum){
                                    ?>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>JENIS PERAIRAN UMUM</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $tangkap_ket_umum->tangkap_jenis_perairan; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>LUAS PU:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"> <?php echo $tangkap_ket_umum->luas_pu_m2; ?> m2</dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>PENGELOLA PU:</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $tangkap_ket_umum->pengelola_pu; ?></dd>
                                            </div>
                                        </dl>
                                        <dl class="row mb-0">
                                            <div class="col-sm-4 text-sm-right">
                                                <dt>JUMLAH TRIP PENANGKAPAN</dt>
                                            </div>
                                            <div class="col-sm-8 text-sm-left">
                                                <dd class="mb-1"><?php echo $tangkap_ket_umum->jumlah_trip_penangkapan_sebulan; ?></dd>
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
                                                                        if($tangkap){
                                                                    ?>
                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Tanggal Kuesioner</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="tangkap_id" name="tangkap_id" type="hidden" class="form-control" value="<?= $tangkap->tangkap_id; ?>" required>
                                                                                <input id="tanggal_kuesionertext" name="tanggal_kuesionertext" type="text" class="form-control" value="<?= $tangkap->tanggal_kuesioner ?>" disabled required>
                                                                                <input id="tanggal_kuesioner" name="tanggal_kuesioner" type="hidden" class="form-control" value="<?= $tangkap->tanggal_kuesioner ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row"><label class="col-sm-3 col-form-label">Petugas Enumerator</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="petugas_enumeratortext" name="petugas_enumeratortext" type="text" class="form-control" value="<?= $tangkap->petugas_enumerator; ?>" disabled required>
                                                                                <input id="petugas_enumerator" name="petugas_enumerator" type="hidden" class="form-control" value="<?= $tangkap->petugas_enumerator; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama Responden</label>
                                                                            <div class="col-sm-9">
                                                                                <input id="nama_responden" name="nama_responden" type="text" class="form-control" value="<?=$tangkap->nama_responden?>" required>
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
                                                                    if($tangkap_identitas){
                                                                ?>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama Kelompok</label>
                                                                            <input id="tangkap_id" name="tangkap_id" type="hidden" class="form-control" value="<?= $tangkap_identitas->tangkap_identitas_id; ?>" required>
                                                                            <div class="col-sm-9"><input id="kelompok" name="kelompok" type="text"  class="form-control" value="<?= $tangkap_identitas->nama_kelompok; ?>" required></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9"><input id="nama" name="nama" type="text"  class="form-control" value="<?= $tangkap_identitas->nama; ?>" required ></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">NIK</label>
                                                                            <div class="col-sm-9"><input id="nik" name="nik" disabled type="text"  class="form-control" value="<?= $tangkap_identitas->nik; ?>" required minlength="16" maxlength="16"></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Jabatan</label>
                                                                            <div class="col-sm-9"><input id="jabatan" name="jabatan" type="text"  class="form-control" value="<?= $tangkap_identitas->jabatan; ?>" required ></div>
                                                                        </div>
                                                                    
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Umur</label>
                                                                            <div class="col-sm-9"><input id="umur" name="umur" type="text"  class="form-control" value="<?= $tangkap_identitas->umur; ?>" required ></div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Pendidikan</label>
                                                                            <div class="col-sm-9">
                                                                                <select class="form-control" name="pendidikan" id="pendidikan">
                                                                                        <option value="SD" <?= $tangkap_identitas->pendidikan == 'SD' ? 'selected' : '';?>>SD</option>
                                                                                        <option value="SMP/Sederajat" <?= $tangkap_identitas->pendidikan == 'SMP/Sederajat' ? 'selected' : '';?>>SMP/Sederajat</option>
                                                                                        <option value="SMA/Sederajat" <?= $tangkap_identitas->pendidikan == 'SMA/Sederajat' ? 'selected' : '';?>>SMA/Sederajat</option>
                                                                                        <option value="D3" <?= $tangkap_identitas->pendidikan == 'D3' ? 'selected' : '';?>>D III</option>
                                                                                        <option value="S1" <?= $tangkap_identitas->pendidikan == 'S1' ? 'selected' : '';?>>S1</option>
                                                                                        <option value="S2" <?= $tangkap_identitas->pendidikan == 'S2' ? 'selected' : '';?>>S2</option>
                                                                                        <option value="S3" <?= $tangkap_identitas->pendidikan == 'S3' ? 'selected' : '';?>>S3</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Telepon</label>
                                                                            <div class="col-sm-9"><input id="telepon" name="telepon" type="text"  class="form-control" value="<?= $tangkap_identitas->telepon; ?>" required ></div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Email</label>
                                                                            <div class="col-sm-9"><input id="email" name="email" type="text"  class="form-control" value="<?= $tangkap_identitas->email; ?>" required ></div>
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
                                                                                        if($tangkap_identitas->kd_kec == null){
                                                                                            echo "<option value='".$tangkap_identitas->alamat_kecamatan."'>".$tangkap_identitas->alamat_kecamatan."</option>";
                                                                                            foreach($kecamatan as $kec){
                                                                                                echo '<option value="'.$kec->Kd_Kec.'">'.$kec->Nama_Kecamatan.'</option>';
                                                                                            }
                                                                                        }else{
                                                                                            foreach($kecamatan as $kec){
                                                                                        ?>
                                                                                                <option value="<?=$kec->Kd_Kec?>" <?= $tangkap_identitas->kd_kec == $kec->Kd_Kec ? 'selected' : '';?>><?=$kec->Nama_Kecamatan?></option>
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
                                                                                            <option value="<?=$tangkap_identitas->kd_desa?>"><?=$tangkap_identitas->Nama_Desa?></option>
                                                                                        </select>
                                                                                </div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">RT/RW</label>
                                                                            <div class="col-sm-4"><input id="rt" name="rt" type="text"  class="form-control" value="<?= $tangkap_identitas->umur; ?>" required ></div>
                                                                            <div class="col-sm-4"><input id="rw" name="rw" type="text"  class="form-control" value="<?= $tangkap_identitas->umur; ?>" required ></div>
                                                                        </div>
                                                
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?= $tangkap_identitas->alamat_jalan; ?></textarea>
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
                                                                        if($tangkap_identitas){
                                                                    ?>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Jenis Perairan Umum</label>
                                                                            <div class="col-sm-8">
                                                                                <div class="radio"><label><input type="radio" name="tangkap_jenis_perairan" id="tangkap_jenis_perairan" value="Danau" <?= $tangkap_ket_umum->tangkap_jenis_perairan == 'Danau' ? 'checked' : '' ?>>1. Danau</label></div>
                                                                                <div class="radio"><label><input type="radio" name="tangkap_jenis_perairan" id="tangkap_jenis_perairan" value="Sungai" <?= $tangkap_ket_umum->tangkap_jenis_perairan == 'Sungai' ? 'checked' : '' ?>> 2. Sungai</label></div>
                                                                                <div class="radio"><label><input type="radio" name="tangkap_jenis_perairan" id="tangkap_jenis_perairan" value="Sodetan Sungai" <?= $tangkap_ket_umum->tangkap_jenis_perairan == 'Sodetan Sungai' ? 'checked' : '' ?>> 3. Sodetan Sungai</label></div>
                                                                                <div class="radio"><label><input type="radio" name="tangkap_jenis_perairan" id="tangkap_jenis_perairan" value="Galian C" <?= $tangkap_ket_umum->tangkap_jenis_perairan == 'Galian C' ? 'checked' : '' ?>> 4. Galian C</label></div>
                                                                            </div>
                                                                        </div>
                                                                            
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Luas PU</label>
                                                                            <div class="col-sm-3">
                                                                                <div class="input-group">
                                                                                    <input id="luas_pu_m2" name="luas_pu_m2" type="number" class="form-control" value="<?= $tangkap_ket_umum->luas_pu_m2?>" required>
                                                                                    <span class="input-group-addon">H<sub>a</sub>/m<sup>2</sup></span> 
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Pengelola PU</label>
                                                                            <div class="col-sm-3">
                                                                                <div class="input-group">
                                                                                    <input id="pengelola_pu" name="pengelola_pu" type="text" class="form-control" value="<?= $tangkap_ket_umum->pengelola_pu?>" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-sm-2 col-form-label">Jumlah Trip Penangkapan</label>
                                                                            <div class="col-sm-3">
                                                                                <div class="input-group">
                                                                                    <input id="jumlah_trip_penangkapan_sebulan" name="jumlah_trip_penangkapan_sebulan" type="number" class="form-control" value="<?= $tangkap_ket_umum->jumlah_trip_penangkapan_sebulan?>" required>
                                                                                    <span class="input-group-addon">/bulan</span> 
                                                                                </div>
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
                                                    <li class="active"><a class="nav-link active"  href="#tab-2" data-toggle="tab">BIAYA PRODUKSI PER SEKALI SIKLUS</a></li>
                                                    <li><a class="nav-link" href="#tab-4" data-toggle="tab">NILAI PRODUKSI</a></li>
                                                    <li><a class="nav-link" href="#tab-5" data-toggle="tab">SERTIFIKAT DAN PERIJINAN</a></li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-2">
                                                    <a data-toggle="modal" data-target="#modalTambahBiaya" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
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
                                                                <td>
                                                                    <a href="<?=site_url('pendataan/tangkap/edit_biaya_produksi/').$biaya->tangkap_biaya_produksi_id.'/'.$biaya->tangkap_id?>" data-button="Edit">
                                                                        <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                    </a>
                                                                    <a href="<?=site_url('pendataan/tangkap/delete_biaya_produksi/').$biaya->tangkap_biaya_produksi_id.'/'.$biaya->tangkap_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>

                                                                </td>
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

                                                

                                                <div class="tab-pane" id="tab-4">
                                                    <a data-toggle="modal" data-target="#modalTambahNilaiProduksi" class="btn btn-success btn-xs float-right">Tambah</a>
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 75px">Aksi</th>
                                                            <th>Uraian</th>
                                                            <th>Jenis</th>
                                                            <th>Volume</th>
                                                            <th>Harga</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($nilai_produksi as $nilai_produksi):?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="<?= site_url('pendataan/tangkap/edit_nilai_produksi/').$nilai_produksi->tangkap_nilai_produksi_id.'/'.$nilai_produksi->tangkap_id?>">
                                                                            <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                        </a>
                                                                        <a href="<?=site_url('pendataan/tangkap/delete_nilai_produksi/').$nilai_produksi->tangkap_nilai_produksi_id.'/'.$nilai_produksi->tangkap_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                    </td>
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
                                                                        <a href="<?= site_url('pendataan/tangkap/edit_perijinan/').$perijinan->tangkap_perijinan_id.'/'.$perijinan->tangkap_id?>">
                                                                            <span class="label label-primary"><i class="fa fa-edit"></i></span>
                                                                        </a>
                                                                        <a href="<?=site_url('pendataan/tangkap/delete_perijinan/').$perijinan->tangkap_perijinan_id.'/'.$perijinan->tangkap_id?>" data-button="delete"> <span class="label label-danger"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    <td><?=$perijinan->tangkap_perijinan_uraian_ket?></td>
                                                                    <td><?=$perijinan->tangkap_perijinan_no?></td>
                                                                    <td><?=$perijinan->tangkap_perijinan_tgl?></td>
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
        <?php $this->load->view('pendataan/tangkap/modal/modal_tambah_biaya_produksi',$tangkap_identitas); ?>
        <?php $this->load->view('pendataan/tangkap/modal/modal_tambah_nilai_produksi',$tangkap_identitas); ?>
        <?php $this->load->view('pendataan/tangkap/modal/modal_tambah_perijinan',$tangkap_identitas); ?>

                                    
