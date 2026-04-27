
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right" style="float:right;">Pembenihan</span>
                                </div>
                                <h5>RTP</h5>

                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_pembenihan->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($pelaku_pembenihan->luas_lahan,0)?> m2</h3>
                                        <div class="font-bold text-navy"><small>Luas Lahan</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_pembenihan->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right" style="float:right;">Pembesaran</span>
                                </div>
                                <h5>RTP</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_pembesaran->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($pelaku_pembesaran->luas_lahan,0)?> m2</h3>
                                        <div class="font-bold text-navy"><small>Luas Lahan</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_pembesaran->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right" style="float:right;">Ikan Hias</span>
                                </div>
                                <h5>RTP</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_ikan_hias->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($pelaku_ikan_hias->luas_lahan,0)?> m2</h3>
                                        <div class="font-bold text-navy"><small>Luas Lahan</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_ikan_hias->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-success float-right" style="float:right;">Mina Padi</span>
                                </div>
                                <h5>RTP</h5>

                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_mina_padi->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($pelaku_mina_padi->luas_lahan,0)?> m2</h3>
                                        <div class="font-bold text-navy"><small>Luas Lahan</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_mina_padi->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-warning float-right" style="float:right;">Nelayan Tangkap</span>
                                </div>
                                <h5>RTP</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_tangkap->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($alat_tangkap->biaya_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Alat Tangkap</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_tangkap->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right" style="float:right;">Pengolahan</span>
                                </div>
                                <h5>RTP</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="no-margins"><?=number_format($pelaku_pengolahan->pelaku,0)?></h3>
                                        <div class="font-bold text-navy"><small>Pelaku</small></div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="no-margins"><?=number_format($pelaku_pengolahan->luas_lahan,0)?> m2</h3>
                                        <div class="font-bold text-navy"><small>Luas Lahan</small></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="no-margins">Rp. <?=number_format($nilai_produksi_pengolahan->nilai_produksi,0)?></h3>
                                        <div class="font-bold text-navy"><small>Total Produksi</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content ibox-heading bg-primary">
                                <h3> Update data terbaru</h3>
                            </div>
                        </div>
                    </div>

                            <div class="col-lg-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Perikanan Budidaya</h5>
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Tgl Upload</th>
                                                <th>Responden</th>
                                                <th>Petugas</th>
                                                <th>#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($budidaya_result as $budidaya){ ?>
                                                    <tr>
                                                        <td><small><?=$budidaya->submit?></small></td>
                                                        <td><i class="fa fa-clock-o"></i><?=$budidaya->tanggal_kuesioner?></td>
                                                        <td><?=$budidaya->nama_responden?></td>
                                                        <td><?=$budidaya->petugas_enumerator?></td>
                                                        <td class="text-navy"><a href="<?=base_url('pendataan/budidaya/view/').$budidaya->budidaya_id?>"><i class="fa fa-eye"></a></i></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Perikanan Tangkap</h5>
                                        
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Tgl Upload</th>
                                                <th>Responden</th>
                                                <th>Petugas</th>
                                                <th>#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($tangkap_result as $tangkap){ ?>
                                                    <tr>
                                                        <td><small><?=$tangkap->submit?></small></td>
                                                        <td><i class="fa fa-clock-o"></i><?=$tangkap->tanggal_kuesioner?></td>
                                                        <td><?=$tangkap->nama_responden?></td>
                                                        <td><?=$tangkap->petugas_enumerator?></td>
                                                        <td class="text-navy"><a href="<?=base_url('pendataan/tangkap/view/').$tangkap->tangkap_id?>"><i class="fa fa-eye"></a></i></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox ">
                                    <div class="ibox-title">
                                        <h5>Pengolahan Hasil Perikanan</h5>
                                        
                                    </div>
                                    <div class="ibox-content table-responsive">
                                        <table class="table table-hover no-margins">
                                            <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Tgl Upload</th>
                                                <th>Responden</th>
                                                <th>Petugas</th>
                                                <th>#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($pengolahan_result as $pengolahan){ ?>
                                                    <tr>
                                                        <td><small><?=$pengolahan->submit?></small></td>
                                                        <td><i class="fa fa-clock-o"></i><?=$pengolahan->tanggal_kuesioner?></td>
                                                        <td><?=$pengolahan->nama_responden?></td>
                                                        <td><?=$pengolahan->petugas_enumerator?></td>
                                                        <td class="text-navy"><a href="<?=base_url('pendataan/pengolahan/view/').$pengolahan->pengolahan_id?>"><i class="fa fa-eye"></a></i></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>