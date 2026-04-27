<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Pengalaman Kerja </h5>
        <div class="ibox-tools">
            <a href="<?=site_url('auth/user/edit/')?>">
                <i class="fa fa"> <strong> Tambah </strong> </i>
            </a>
        </div>
    </div>
    <div class="ibox-content" style="">
            <div class="table-responsive ">
                <?php for($i=0;$i<=4;$i++){?>
                <div class="col-md-6">
                    <table class="table shoping-cart-table" style="margin:10px auto;">
                        <tbody>
                            <tr>
                                <td width="30%">
                                    <a href="<?= assets_url('img/gallery/1.jpg') ?>" title="Image from Unsplash" data-gallery="">
                                        <img style="width:100%; hight:100%;" src="<?= assets_url('img/astrajingga.png') ?>" >
                                    </a>
                                </td>
                                <td class="desc" width="100%">
                                    <h3>
                                        <a href="#" class="text-navy">
                                            PT Astrajingga - Web Developer
                                        </a>
                                    </h3>
                                    <p class="normal">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis commodi harum in, necessitatibus nesciunt laudantium excepturi. Nemo doloremque, commodi voluptatibus cupiditate distinctio cum non velit ad facere ducimus sint dicta.
                                    </p>
                                    <dl class="small m-b-none">
                                        <dt>Lama Bekerja</dt>
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