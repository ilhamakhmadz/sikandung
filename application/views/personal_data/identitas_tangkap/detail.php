    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">        
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="col-md-6">
                    <div class="row m-b-lg m-t-lg">
                            <div class="col-md-6">
                                        <div>
                                            <h2 class="no-margins">
                                                <?= $personal_data->nama_lengkap; ?>
                                            </h2>
                                            <h4><?= $personal_data->tempat_lahir.','.date("d-m-Y", strtotime($personal_data->tanggal_lahir)); ?></h4>
                                            <small>
                                             <?= $personal_data->alamat . ' ' . 'RT ' . $personal_data->no_rt . ' RW ' . $personal_data->no_rw . ' ,KELURAHAN ' . $personal_data->kel_nama . ' KECAMATAN ' . $personal_data->kec_nama . ' ' . $personal_data->kab_nama . ' ' . $personal_data->prov_nama ?>
                                            </small>
                                        </div>
                            </div>
                            <div class="col-md-6">
                                <table class="table small m-b-xs">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong>NIK</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->nik; ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>NO KK</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->no_kk; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>NPWP</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->npwp; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>No Telpon</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->no_telp; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Pekerjaan</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->pekerjaan; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Pendidikan</strong>
                                        </td>
                                        <td>
                                        <?= $personal_data->pendidikan; ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Pendataan</h5>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">
                                <?php
                                  foreach($pendataan as $data_perekonomian){
                                ?>

                                    <div class="feed-element">
                                        <div class="media-body ">
                                             <?= $data_perekonomian->nama_bidang_usaha."/".$data_perekonomian->nama_perusahaan?> <br>
                                            <div class="actions">
                                                <a href="<?php echo site_url('pendataan/'.$data_perekonomian->url_pendataan.'/detail/').$data_perekonomian->id_personal_sektor_ekonomi ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                  }
                                ?>
                                </div>
                                <button class="btn btn-primary btn-block m" data-toggle="modal" data-target="#myModalAdd"><i class=""></i> Tambah</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Produk</h2>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <?php
                foreach($detail_produk as $data_produk){
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div >
                                <img class="img-fluid img-shadow" style="width: 100%; height: 250px; background-size: contain;padding: 10px;" src="<?= $data_produk->img_produk == "" ? base_url('assets/img/empty.png') : base_url(base64_decode($data_produk->img_produk)) ?>">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    <?='Rp. '.$data_produk->harga_produk." / ".$data_produk->volume_produk?>
                                </span>
                                <small class="text-muted">stok <?=$data_produk->stok_produk;?></small>
                                <a href="#" class="product-name">  <?=$data_produk->nama_produk;?></a>

                                <div class="small m-t-xs">
                                    Daerah Pemasaran di  <?=$data_produk->lokasi;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            <?php
                foreach($detail_produk_1 as $data_produk_1){
            ?>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div >
                                <img class="img-fluid img-shadow" style="width: 100%; height: 250px; background-size: contain;padding: 10px;" src="<?= $data_produk_1->img_produk == "" ? base_url('assets/img/empty.png') : base_url(base64_decode($data_produk_1->img_produk)) ?><?=base_url(base64_decode($data_produk_1->img_produk));?>">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    <?='Rp. '.$data_produk_1->harga_produksi." / ".$data_produk_1->volume_produksi?>
                                </span>
                                <!-- <small class="text-muted">stok <?=$data_produk_1->stok_produk;?></small> -->
                                <a href="#" class="product-name">  <?=$data_produk_1->nama_produk;?></a>

                                <div class="small m-t-xs">
                                    Daerah Pemasaran di -
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>





            </div>
        </div>


                   
                            <div class="modal inmodal" id="myModalAdd" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Pilih Jenis Pendataan</h4>
                                        </div>
                                        <form class="form-horizontal" id="form_add" name="form_add" method="post" action="">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>NIK</label> 
                                                <select name="nik" id="nik" class="form-control" style="width:100%" required>
                                                    <option value="<?= $personal_data->id_personal_data; ?>"><?= $personal_data->nik; ?></option>
                                                    
                                                </select>
                                            </div>
                                            <!-- <input type="hidden" name="id_personal_data" id="id_personal_data" value="<?= $this->session->userdata('id_user'); ?>" > -->
                                            <div class="form-group">
                                                <label>Jenis Pendataan</label> 
                                                <select name="jenis_pendataan" id="jenis_pendataan" class="form-control" style="width:100%" required  onchange="url(this.value)"> 
                                                    <option value="">-- Pilih Jenis Pendataan --</option>
                                                    <?php
                                                        foreach($jenis_pendataan as $pendataan){
                                                            echo '<option value="'.$pendataan->url_pendataan.'">'.$pendataan->nama_jenis_pendataan.'</option>';
                                                        }
                                                    ?>
                                                   
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Bidang Usaha</label> 
                                                <select name="bidang_usaha" id="bidang_usaha" class="form-control" style="width:100%" required>
                                                    <option value="">-- Pilih Bidang Usaha --</option>
                                                    <?php
                                                        foreach($bidang_usaha as $usaha){
                                                            echo '<option value="'.$usaha->id_bidang_usaha.'">'.$usaha->nama_bidang_usaha.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal"> Tutup</button>
                                            <button type="submit" class="btn btn-primary">Isi Form</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <style>
                                .select2-container--open {
                                    z-index: 10002 ; 
                                }
                            </style>