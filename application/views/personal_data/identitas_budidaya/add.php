<div class="panel">
    <div class="panel-body">
        <section class="content">
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <form class="form-horizontal" id="form_add" name="form_add" method="post" action="">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-9"><input id="nik" name="nik" type="text" class="form-control"></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No KK</label>
                                            <div class="col-sm-9"><input id="no_kk" name="no_kk" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NPWP</label>
                                            <div class="col-sm-9"><input id="npwp" name="npwp" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9"><input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9"><input id="jenis_kelamin" name="jenis_kelamin" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-9"><input id="no_tlp" name="no_tlp" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agama</label>
                                            <div class="col-sm-9"><input id="agama" name="agama" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir</label>
                                            <div class="col-sm-5"><input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control"></div>
                                            <div class="col-sm-4"><input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Kawin</label>
                                            <div class="col-sm-9"><input id="status_kawin" name="status_kawin" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gol Darah</label>
                                            <div class="col-sm-9"><input id="gol_darah" name="gol_darah" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                       
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9"><input id="pekerjaan" name="pekerjaan" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9"><input id="pendidikan" name="pendidikan" type="text" class="form-control"></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Provinsi</label>
                                            <div class="col-sm-9"><input id="provinsi" name="provinsi" type="text" class="form-control"></div>
                                            <div class="col-sm-9"><input id="no_provinsi" name="no_provinsi" type="hidden" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kab/Kota</label>
                                            <div class="col-sm-9"><input id="kab" name="kab" value="<?=$kabupaten->nama_kabupaten?>" type="text" class="form-control"></div>
                                            <div class="col-sm-9"><input id="no_kab" value="<?=$kabupaten->kd_kabupaten?>" name="no_kab" type="hidden" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                                            <!-- <input id="kec" name="kec" type="text" class="form-control"></div>
                                            <div class="col-sm-9"><input id="no_kec" name="no_kec" type="hidden" class="form-control"></div> -->
                                            <div class="col-sm-9">
                                                <select class="form-control" name="kec" id="kec">
                                                    <?php foreach($kecamatan as $kec):?>
                                                        <option value="<?=$kec->Kd_Kec?>"><?=$kec->Nama_Kecamatan?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" name="desa" id="desa">
                                                </select>
                                                </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RT/RW</label>
                                            <div class="col-sm-4"><input id="rt" name="rt" type="text" class="form-control"></div>
                                            <div class="col-sm-4"><input id="rw" name="rw" type="text" class="form-control"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                
                                   
                                </div>
                                <div class="col-md-12">
                                   <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                                                <a href="<?php echo site_url() ?>/personal_data/personal_data" class="btn btn-default save"
                                                id="btn_batal" name="yt1" type="button"/>Kembali</a>
                                            </div>
                                        </div>
                                   <div class="hr-line-dashed"></div>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>