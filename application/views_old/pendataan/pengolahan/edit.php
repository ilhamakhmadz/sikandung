<div class="panel">
    <div class="panel-body">
        <section class="content">
            <div class='box box-default'>
                <div class='box-body'>
                    <div class="form">
                        <form class="form-horizontal" id="form_edit" name="form_edit" method="post" action="">
                        <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="hr-line-dashed"></div>
                                        <div id="checknik" class="form-group row"><label class="col-sm-2 col-form-label">NIK</label>
                                            <div class="col-sm-9"><input id="id_personal_data" name="id_personal_data" type="hidden" class="form-control" value="<?=$personal_data->id_personal_data;?>"></div>
                                            <div class="col-sm-9"><input id="nik" name="nik" type="text" class="form-control" value="<?=$personal_data->nik;?>"></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No KK</label>
                                            <div class="col-sm-9"><input id="no_kk" name="no_kk" type="text" class="form-control" value="<?=$personal_data->no_kk;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NPWP</label>
                                            <div class="col-sm-9"><input id="npwp" name="npwp" type="text" class="form-control" value="<?=$personal_data->npwp;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9"><input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="<?=$personal_data->nama_lengkap;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-9"><input id="jenis_kelamin" name="jenis_kelamin" type="text" class="form-control" value="<?=$personal_data->jenis_kelamin;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No Telp</label>
                                            <div class="col-sm-9"><input id="no_tlp" name="no_tlp" type="text" class="form-control" value="<?=$personal_data->no_telp;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agama</label>
                                            <div class="col-sm-9"><input id="agama" name="agama" type="text" class="form-control" value="<?=$personal_data->agama;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir</label>
                                            <div class="col-sm-5"><input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?=$personal_data->tempat_lahir;?>"></div>
                                            <div class="col-sm-4"><input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?=$personal_data->tanggal_lahir;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Kawin</label>
                                            <div class="col-sm-9"><input id="status_kawin" name="status_kawin" type="text" class="form-control" value="<?=$personal_data->status_kawin;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gol Darah</label>
                                            <div class="col-sm-9"><input id="gol_darah" name="gol_darah" type="text" class="form-control" value="<?=$personal_data->gol_darah;?>"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                       
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-9"><input id="pekerjaan" name="pekerjaan" type="text" class="form-control" value="<?=$personal_data->pekerjaan;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9"><input id="pendidikan" name="pendidikan" type="text" class="form-control" value="<?=$personal_data->pendidikan;?>"></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Provinsi</label>
                                            <div class="col-sm-9"><input id="provinsi" name="provinsi" type="text" class="form-control" value="<?=$personal_data->prov_nama;?>"></div>
                                            <div class="col-sm-9"><input id="no_provinsi" name="no_provinsi" type="hidden" class="form-control" value="<?=$personal_data->no_prov;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kab/Kota</label>
                                            <div class="col-sm-9"><input id="kab" name="kab" type="text" class="form-control" value="<?=$personal_data->kab_nama;?>"></div>
                                            <div class="col-sm-9"><input id="no_kab" name="no_kab" type="hidden" class="form-control" value="<?=$personal_data->no_kab;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-9"><input id="kec" name="kec" type="text" class="form-control" value="<?=$personal_data->kec_nama;?>"></div>
                                            <div class="col-sm-9"><input id="no_kec" name="no_kec" type="hidden" class="form-control" value="<?=$personal_data->no_kec;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                            <div class="col-sm-9"><input id="kelurahan" name="kelurahan" type="text" class="form-control" value="<?=$personal_data->kel_nama;?>"></div>
                                            <div class="col-sm-9"><input id="no_kelurahan" name="no_kelurahan" type="hidden" class="form-control" value="<?=$personal_data->no_kel;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RT/RW</label>
                                            <div class="col-sm-4"><input id="rt" name="rt" type="text" class="form-control" value="<?=$personal_data->no_rt;?>"></div>
                                            <div class="col-sm-4"><input id="rw" name="rw" type="text" class="form-control" value="<?=$personal_data->no_rw;?>"></div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"><?=$personal_data->alamat;?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                
                                   
                                </div>
                                <div class="col-md-12">
                                   <div class="hr-line-dashed"></div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                                <a href="<?php echo site_url() ?>/personal_data/personal_data" class="btn btn-default save"
                                                id="btn_batal" name="yt1" type="button"/>Batal</a>
                                            </div>
                                        </div>
                                   <div class="hr-line-dashed"></div>

                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>