<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Budidaya Pembenihan</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h3 {
            margin: 0 0 4px 0;
            font-size: 15px;
            font-weight: bold;
            color: #111;
        }
        .header h4 {
            margin: 0 0 4px 0;
            font-size: 13px;
            font-weight: bold;
            color: #222;
        }
        .header h5 {
            margin: 0;
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }
        .meta-table {
            margin-bottom: 12px;
            font-size: 11px;
            font-weight: bold;
        }
        .meta-table td {
            padding: 2px 4px;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }
        table.data-table th, table.data-table td {
            border: 1px solid #999;
            padding: 5px 6px;
        }
        table.data-table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>LAPORAN DATA BUDIDAYA PEMBENIHAN</h3>
        <h4>DINAS KETAHANAN PANGAN DAN PERIKANAN</h4>
        <h5>KABUPATEN BANDUNG</h5>
    </div>

    <table class="meta-table">
        <tr>
            <td width="130">NAMA KELOMPOK</td>
            <td width="10">:</td>
            <td><?= $kelompok == '0' ? "-" : htmlspecialchars($kelompok) ;?></td>
        </tr>
        <tr>
            <td>KECAMATAN</td>
            <td>:</td>
            <td><?= $kecamatan == '0' ? "-" : htmlspecialchars($kecamatan) ;?></td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th rowspan="2" width="4%">No</th>
                <th rowspan="2" width="13%">NIK</th>
                <th rowspan="2" width="15%">Nama</th>
                <th rowspan="2" width="13%">Kelompok</th>
                <th rowspan="2" width="11%">Kecamatan</th>
                <th rowspan="2" width="11%">Desa</th>
                <th rowspan="2" width="11%">Luas Lahan (m2)</th>
                <th colspan="3" width="22%">Produksi</th>
            </tr>
            <tr>
                <th>Biaya</th>
                <th>Volume</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pembenihan)): ?>
                <?php $no = 1; foreach($pembenihan as $row): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row->nik ?? '-') ?></td>
                    <td><?= htmlspecialchars($row->nama ?? '-') ?></td>
                    <td><?= htmlspecialchars($row->nama_kelompok ?? '-') ?></td>
                    <td><?= htmlspecialchars($row->Nama_Kecamatan ?? '-') ?></td>
                    <td><?= htmlspecialchars($row->Nama_Desa ?? '-') ?></td>
                    <td class="text-right"><?= htmlspecialchars($row->luas_kolam_m2 ?? '0') ?></td>
                    <td class="text-right"><?= number_format((float)($row->harga_produksi ?? 0), 0, ',', '.') ?></td>
                    <td class="text-right"><?= number_format((float)($row->volume_produksi ?? 0), 0, ',', '.') ?></td>
                    <td class="text-right"><?= number_format((float)($row->nilai_produksi ?? 0), 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>