<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Pendidikan </h5>
        <div class="ibox-tools">
            <a href="<?=site_url('auth/user/edit/')?>">
                    <i class="fa fa"> <strong> Tambah </strong> </i>
            </a>
        </div>
    </div>
    <div class="ibox-content" style="">
            <div class="table-responsive ">
                <?php for($i=0;$i<=4;$i++){?>
                <div class="col-md-4">
                    <table class="table shoping-cart-table" style="margin:10px auto;">
                        <tbody>
                            <tr>
                                <td width="30%">
                                    <a href="<?= assets_url('img/gallery/1.jpg') ?>" title="Image from Unsplash" data-gallery="">
                                        <img style="width:100%; hight:100%;" src="<?= assets_url('img/logounpas.jpg') ?>" >
                                    </a>
                                </td>
                                <td class="desc" width="100%">
                                    <h3>
                                        <a href="#" class="text-navy">
                                            Universitas Pasundan
                                        </a>
                                    </h3>
                                    <p class="normal">
                                        S1 - Teknik Informatika
                                    </p>
                                    <dl class="small m-b-none">
                                        <dt>Kelulusan</dt>
                                        <dd>10 Desember 2012 - 4 Februari 2016 </dd>
                                    </dl>
                                </td>
                                <td width="5%">
                                    <a href="#">Ubah</a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
    </div>
</div>