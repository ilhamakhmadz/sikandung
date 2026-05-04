<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#208a8a',
                primary2: '#0db077'
            }
        }
    }
}
</script>

<style>
    /* Reset some Inspinia conflicts if any */
    .ibox { border: none !important; margin-bottom: 0 !important; }
    #page-wrapper { background-color: #f3f4f6 !important; }
    .wrapper-content { padding: 20px 0 !important; }
    .row { margin: 0 !important; }
</style>

<div class="w-full space-y-8 font-sans">
    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 px-2">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Dashboard Overview</h1>
            <p class="text-sm text-gray-500">Sistem Informasi Perikanan Kabupaten Bandung</p>
        </div>
        <div class="flex items-center gap-3 bg-white px-5 py-2.5 rounded-2xl shadow-sm border border-gray-100">
            <span class="text-primary"><i class="fa fa-calendar"></i></span>
            <span class="text-sm font-semibold text-gray-600"><?php echo date('d F Y'); ?></span>
        </div>
    </div>

    <!-- MAIN SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1: Total Pelaku -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 hover:shadow-md transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.1em]">Total Pelaku</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">
                        <?php 
                            $total_pelaku = ($pelaku_pembenihan->pelaku ?? 0) + ($pelaku_pembesaran->pelaku ?? 0) + ($pelaku_ikan_hias->pelaku ?? 0) + ($pelaku_mina_padi->pelaku ?? 0) + ($pelaku_tangkap->pelaku ?? 0) + ($pelaku_pengolahan->pelaku ?? 0);
                            echo number_format($total_pelaku);
                        ?>
                    </h3>
                </div>
                <div class="p-3.5 bg-teal-50 text-primary rounded-2xl group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <i class="fa fa-users text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[10px] font-bold bg-primary/10 text-primary px-2 py-0.5 rounded-lg">RTP</span>
                <span class="text-[10px] text-gray-400 font-medium">Seluruh Sektor</span>
            </div>
        </div>

        <!-- Card 2: Total Produksi -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 hover:shadow-md transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.1em]">Produksi Gabungan</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">
                        <?php 
                            // This is just a summary count, units are mixed so we just show a representative number or total records
                            $total_p = ($total_produksi_pembenihan->total_produksi ?? 0) + ($total_produksi_pembesaran->total_produksi ?? 0) + ($total_produksi_ikan_hias->total_produksi ?? 0) + ($total_produksi_mina_padi->total_produksi ?? 0) + ($total_produksi_tangkap->total_produksi ?? 0);
                            echo number_format($total_p);
                        ?>
                    </h3>
                </div>
                <div class="p-3.5 bg-blue-50 text-blue-500 rounded-2xl group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa fa-database text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[10px] font-bold bg-blue-100 text-blue-700 px-2 py-0.5 rounded-lg">VOLUME</span>
                <span class="text-[10px] text-gray-400 font-medium">Ton / Ekor / Ribu</span>
            </div>
        </div>

        <!-- Card 3: Nilai Produksi -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 hover:shadow-md transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.1em]">Nilai Produksi</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">
                        <span class="text-sm font-bold text-gray-400 mr-1">Rp</span><?php 
                            $total_v = ($nilai_produksi_pembenihan->nilai_produksi ?? 0) + ($nilai_produksi_pembesaran->nilai_produksi ?? 0) + ($nilai_produksi_ikan_hias->nilai_produksi ?? 0) + ($nilai_produksi_mina_padi->nilai_produksi ?? 0) + ($nilai_produksi_tangkap->nilai_produksi ?? 0) + ($nilai_produksi_pengolahan->nilai_produksi ?? 0);
                            echo number_format($total_v / 1000000, 1) . ' Jt';
                        ?>
                    </h3>
                </div>
                <div class="p-3.5 bg-amber-50 text-amber-600 rounded-2xl group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                    <i class="fa fa-money text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[10px] font-bold bg-amber-100 text-amber-700 px-2 py-0.5 rounded-lg">EKONOMI</span>
                <span class="text-[10px] text-gray-400 font-medium">Estimasi Nilai</span>
            </div>
        </div>

        <!-- Card 4: Updates -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 hover:shadow-md transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.1em]">Update Terbaru</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-2">
                        <?php echo count($budidaya_result) + count($tangkap_result) + count($pengolahan_result); ?>
                    </h3>
                </div>
                <div class="p-3.5 bg-purple-50 text-purple-500 rounded-2xl group-hover:bg-purple-500 group-hover:text-white transition-colors duration-300">
                    <i class="fa fa-refresh text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="text-[10px] font-bold bg-purple-100 text-purple-700 px-2 py-0.5 rounded-lg">AKTIVITAS</span>
                <span class="text-[10px] text-gray-400 font-medium">Kuesioner Masuk</span>
            </div>
        </div>
    </div>

    <!-- SECTOR DETAIL SECTION -->
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-gray-800 px-2 flex items-center gap-3">
            <span class="w-1.5 h-6 bg-primary rounded-full"></span>
            Statistik Per Sektor (Wajib Tampil)
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <!-- 1. PEMBENIHAN -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-primary/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-primary text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-primary/30">Pembenihan</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pembenihan->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pembenihan->luas_lahan, 0) ?> <span class="text-xs font-medium text-gray-400">m2</span></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Luas Lahan</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_pembenihan->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">RIBU EKOR</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_pembenihan->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>

            <!-- 2. PEMBESARAN -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-blue-500/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-blue-500 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-blue-500/30">Pembesaran</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pembesaran->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pembesaran->luas_lahan, 0) ?> <span class="text-xs font-medium text-gray-400">m2</span></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Luas Lahan</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_pembesaran->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">TON</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_pembesaran->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>

            <!-- 3. IKAN HIAS -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-blue-400/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-blue-400 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-blue-400/30">Ikan Hias</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_ikan_hias->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_ikan_hias->luas_lahan, 0) ?> <span class="text-xs font-medium text-gray-400">m2</span></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Luas Lahan</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_ikan_hias->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">EKOR</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_ikan_hias->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>

            <!-- 4. MINA PADI -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-emerald-500/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-emerald-500 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-emerald-500/30">Mina Padi</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_mina_padi->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_mina_padi->luas_lahan, 0) ?> <span class="text-xs font-medium text-gray-400">m2</span></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Luas Lahan</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_mina_padi->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">TON</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_mina_padi->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>

            <!-- 5. NELAYAN TANGKAP -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-orange-500/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-orange-500 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-orange-500/30">Nelayan Tangkap</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_tangkap->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($alat_tangkap->biaya_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Alat Tangkap</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_tangkap->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">TON</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_tangkap->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>

            <!-- 6. PENGOLAHAN -->
            <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 hover:ring-2 ring-rose-500/20 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xs font-black text-gray-400 tracking-widest uppercase">RTP</span>
                    <span class="px-3 py-1 bg-rose-500 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter shadow-sm shadow-rose-500/30">Pengolahan</span>
                </div>
                <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pengolahan->pelaku, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Pelaku</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($pelaku_pengolahan->luas_lahan, 0) ?> <span class="text-xs font-medium text-gray-400">m2</span></p>
                        <p class="text-[10px] font-bold text-primary uppercase">Luas Lahan</p>
                    </div>
                    <div>
                        <p class="text-[20px] font-bold text-gray-800 leading-tight"><?= number_format($total_produksi_pengolahan->total_produksi, 0) ?> <span class="text-[10px] font-medium text-gray-400">TON</span></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Total Produksi</p>
                    </div>
                    <div>
                        <p class="text-[18px] font-bold text-gray-800 leading-tight"><span class="text-[10px] text-gray-400 mr-0.5">Rp</span><?= number_format($nilai_produksi_pengolahan->nilai_produksi, 0) ?></p>
                        <p class="text-[10px] font-bold text-primary2 uppercase">Nilai Produksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-8">
                <h3 class="font-bold text-gray-800 flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-primary rounded-full"></span>
                    Perbandingan Pelaku Per Sektor
                </h3>
            </div>
            <div class="h-72">
                <canvas id="sectorChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-primary2 rounded-full"></span>
                Distribusi Produksi
            </h3>
            <div class="h-72 flex items-center justify-center">
                <canvas id="productionPie"></canvas>
            </div>
        </div>
    </div>

    <!-- TABLES SECTION -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-3">
                <i class="fa fa-list-alt text-primary"></i>
                Update Data Kuesioner Terbaru
            </h3>
            <div class="flex gap-2">
                <div class="relative">
                    <i class="fa fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="tableSearch" placeholder="Cari responden..." 
                        class="text-sm pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-2xl outline-none focus:ring-4 ring-primary/10 focus:border-primary transition w-full md:w-72">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="mainTable">
                <thead>
                    <tr class="bg-gray-50/80 text-gray-400 text-[10px] uppercase tracking-[0.15em] font-black">
                        <th class="px-8 py-5 border-b border-gray-100">Sektor</th>
                        <th class="px-8 py-5 border-b border-gray-100">Responden</th>
                        <th class="px-8 py-5 border-b border-gray-100">Petugas</th>
                        <th class="px-8 py-5 border-b border-gray-100">Tanggal</th>
                        <th class="px-8 py-5 border-b border-gray-100">Status</th>
                        <th class="px-8 py-5 border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm">
                    <!-- BUDIDAYA -->
                    <?php foreach($budidaya_result as $row): ?>
                    <tr class="hover:bg-teal-50/30 transition-colors table-row-item group" data-search="<?= strtolower($row->nama_responden) ?>">
                        <td class="px-8 py-5">
                            <span class="px-2.5 py-1 bg-teal-100 text-teal-700 rounded-lg text-[10px] font-black uppercase tracking-tight">Budidaya</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-gray-700"><?= $row->nama_responden ?></td>
                        <td class="px-8 py-5 text-gray-500 font-medium"><?= $row->petugas_enumerator ?></td>
                        <td class="px-8 py-5 text-gray-500"><?= date('d/m/Y', strtotime($row->tanggal_kuesioner)) ?></td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-2 px-2.5 py-1 bg-green-50 text-green-600 rounded-full text-[11px] font-bold">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                <?= $row->submit ?: 'Verified' ?>
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <a href="<?= base_url('pendataan/budidaya/view/'.$row->budidaya_id) ?>" 
                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gray-50 text-gray-400 hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- TANGKAP -->
                    <?php foreach($tangkap_result as $row): ?>
                    <tr class="hover:bg-blue-50/30 transition-colors table-row-item group" data-search="<?= strtolower($row->nama_responden) ?>">
                        <td class="px-8 py-5">
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-lg text-[10px] font-black uppercase tracking-tight">Tangkap</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-gray-700"><?= $row->nama_responden ?></td>
                        <td class="px-8 py-5 text-gray-500 font-medium"><?= $row->petugas_enumerator ?></td>
                        <td class="px-8 py-5 text-gray-500"><?= date('d/m/Y', strtotime($row->tanggal_kuesioner)) ?></td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-2 px-2.5 py-1 bg-blue-50 text-blue-600 rounded-full text-[11px] font-bold">
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                <?= $row->submit ?: 'Verified' ?>
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <a href="<?= base_url('pendataan/tangkap/view/'.$row->tangkap_id) ?>" 
                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gray-50 text-gray-400 hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- PENGOLAHAN -->
                    <?php foreach($pengolahan_result as $row): ?>
                    <tr class="hover:bg-purple-50/30 transition-colors table-row-item group" data-search="<?= strtolower($row->nama_responden) ?>">
                        <td class="px-8 py-5">
                            <span class="px-2.5 py-1 bg-purple-100 text-purple-700 rounded-lg text-[10px] font-black uppercase tracking-tight">Pengolahan</span>
                        </td>
                        <td class="px-8 py-5 font-bold text-gray-700"><?= $row->nama_responden ?></td>
                        <td class="px-8 py-5 text-gray-500 font-medium"><?= $row->petugas_enumerator ?></td>
                        <td class="px-8 py-5 text-gray-500"><?= date('d/m/Y', strtotime($row->tanggal_kuesioner)) ?></td>
                        <td class="px-8 py-5">
                            <span class="inline-flex items-center gap-2 px-2.5 py-1 bg-purple-50 text-purple-600 rounded-full text-[11px] font-bold">
                                <span class="w-1.5 h-1.5 bg-purple-500 rounded-full"></span>
                                <?= $row->submit ?: 'Verified' ?>
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <a href="<?= base_url('pendataan/pengolahan/view/'.$row->pengolahan_id) ?>" 
                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gray-50 text-gray-400 hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // SECTOR CHART (Bar)
    const sectorChartEl = document.getElementById('sectorChart');
    if (sectorChartEl) {
        const ctx = sectorChartEl.getContext('2d');
        new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pembenihan', 'Pembesaran', 'Ikan Hias', 'Mina Padi', 'Tangkap', 'Pengolahan'],
            datasets: [{
                label: 'Jumlah Pelaku (RTP)',
                data: [
                    <?= $pelaku_pembenihan->pelaku ?? 0 ?>,
                    <?= $pelaku_pembesaran->pelaku ?? 0 ?>,
                    <?= $pelaku_ikan_hias->pelaku ?? 0 ?>,
                    <?= $pelaku_mina_padi->pelaku ?? 0 ?>,
                    <?= $pelaku_tangkap->pelaku ?? 0 ?>,
                    <?= $pelaku_pengolahan->pelaku ?? 0 ?>
                ],
                backgroundColor: '#208a8a',
                borderRadius: 12,
                barThickness: 30
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: true, 
                    grid: { color: '#f3f4f6', drawBorder: false },
                    ticks: { font: { size: 10, weight: 'bold' }, color: '#9ca3af' }
                },
                x: { 
                    grid: { display: false },
                    ticks: { font: { size: 11, weight: 'bold' }, color: '#4b5563' }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1f2937',
                    padding: 12,
                    titleFont: { size: 12, weight: 'bold' },
                    bodyFont: { size: 12 },
                    cornerRadius: 10
                }
            }
        }
        });
    }

    // PRODUCTION PIE
    const productionPieEl = document.getElementById('productionPie');
    if (productionPieEl) {
        const ctx2 = productionPieEl.getContext('2d');
        new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Pembenihan', 'Pembesaran', 'Ikan Hias', 'Mina Padi', 'Tangkap'],
            datasets: [{
                data: [
                    <?= $total_produksi_pembenihan->total_produksi ?? 0 ?>,
                    <?= $total_produksi_pembesaran->total_produksi ?? 0 ?>,
                    <?= $total_produksi_ikan_hias->total_produksi ?? 0 ?>,
                    <?= $total_produksi_mina_padi->total_produksi ?? 0 ?>,
                    <?= $total_produksi_tangkap->total_produksi ?? 0 ?>
                ],
                backgroundColor: ['#208a8a', '#3b82f6', '#60a5fa', '#10b981', '#f59e0b'],
                borderWidth: 0,
                hoverOffset: 20
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: { 
                    position: 'bottom', 
                    labels: { 
                        boxWidth: 8, 
                        boxHeight: 8,
                        usePointStyle: true,
                        padding: 20, 
                        font: { size: 11, weight: 'bold' },
                        color: '#4b5563'
                    } 
                }
            }
        }
        });
    }

    // TABLE SEARCH
    document.getElementById('tableSearch').addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        const rows = document.querySelectorAll('.table-row-item');
        rows.forEach(row => {
            const text = row.getAttribute('data-search');
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
});
</script>