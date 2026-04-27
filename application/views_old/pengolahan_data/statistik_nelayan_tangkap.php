                <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Jumlah Pelaku Usaha</h5>
                                <h1 class="no-margins"><?=number_format($pelaku_nelayan_tangkap->pelaku,0)?> Orang</h1>
                                <!-- <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div> -->
                                <small class="font-bold text-navy">Total</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Alat Tangkap</h5>
                                <h1 class="no-margins"><?=number_format($alat_nelayan_tangkap->biaya_produksi,0)?> m2</h1>
                                <!-- <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div> -->
                                <small class="font-bold text-navy">Total</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h5>Total Produksi</h5>
                                <h1 class="no-margins">Rp. <?=number_format($nilai_produksi_nelayan_tangkap->nilai_produksi,0)?></h1>
                                <!-- <div class="stat-percent font-bold text-danger">12% <i class="fa fa-level-down"></i></div> -->
                                <small class="font-bold text-navy">Total</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Jumlah Pelaku Usaha <small>Nelayan</small></h5>
                            </div>
                            <div class="ibox-content">
                                            <canvas id="chartJumlah"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Alat Tangkap <small>Nelayan</small></h5>
                            </div>
                            <div class="ibox-content">
                                            <canvas id="chartLuas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Total Produksi <small>Nelayan</small></h5>
                            </div>
                            <div class="ibox-content">
                                            <canvas id="chartNilai"></canvas>
                            </div>
                        </div>
                    </div>
                </div>