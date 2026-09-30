<?php

class Pengolahan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendataan/pengolahan_model');
        $this->load->model('personal_data/identitas_pengolahan_model');
        $this->load->model('master/kabupaten_model');
        $this->load->model('master/kecamatan_model');
        $this->load->model('master/pengolahan/Pengolahan_bahan_utama_model');
        $this->load->model('master/pengolahan/Pengolahan_bahan_model');
        $this->load->model('master/pengolahan/Pengolahan_alat_produksi_model');
        $this->load->model('master/pengolahan/Pengolahan_nilai_produksi_model');
        $this->load->model('master/pengolahan/Pengolahan_perijinan_model');
        $this->load->model('master/desa_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));
    }

    // DONE
    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Data Kelompok Pengolahan Ikan',
            'site_title' => 'Pendataan',
            'ui_controller' => 'pendataan/pengolahan',
        ));
        $buttons = '';
        if($this->acl->is_allowed('pendataan/pengolahan/add')):
            $buttons .= '<button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd"><i class="fa fa-plus"></i> Tambah</button> ';
        endif;
        $buttons .= '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalExport"><i class="fa fa-file-excel-o"></i> Export Excel</button>';
        
        $this->load->vars(array(
            'page_icon' => $buttons,
        ));
        $data['list_tahun'] = $this->pengolahan_model->get_list_tahun();

        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                    ->set_js(assets_url('datatables_responsive/datatables.bundle', true)) 
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('select2/dist/js/select2.min'))
                    ->build('pendataan/pengolahan/index', $data);
    }

    public function export()
    {
        $userId = $this->session->userdata('id');
        $roleId = $this->session->userdata('role_id');
        $tahun = $this->input->get('tahun') ?: $this->input->post('tahun');

        $dataIdentitas   = $this->pengolahan_model->get_export_data($userId, $roleId, $tahun);
        $dataAlat        = $this->pengolahan_model->get_export_alat_produksi($userId, $roleId, $tahun);
        $dataBahanUtama  = $this->pengolahan_model->get_export_bahan_utama($userId, $roleId, $tahun);
        $dataBahanLain   = $this->pengolahan_model->get_export_bahan_lain($userId, $roleId, $tahun);
        $dataNilai       = $this->pengolahan_model->get_export_nilai_produksi($userId, $roleId, $tahun);
        $dataPerijinan   = $this->pengolahan_model->get_export_perijinan($userId, $roleId, $tahun);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $titleTahun = (!empty($tahun) && $tahun != '0' && $tahun != 'all') ? ' - TAHUN ' . $tahun : ' - SEMUA TAHUN';

        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['argb' => 'FF000000']],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FFD9E1F2']
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FFBFBFBF'],
                ]
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];

        // -------------------------------------------------------------------------
        // SHEET 1: DATA RESPONDEN
        // -------------------------------------------------------------------------
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Data Responden');

        $sheet1->mergeCells('A1:R1');
        $sheet1->mergeCells('A2:R2');
        $sheet1->mergeCells('A3:R3');
        $sheet1->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet1->setCellValue('A1', 'DATA HASIL KUISIONER PENGOLAHAN HASIL PERIKANAN' . $titleTahun);
        $sheet1->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet1->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers1 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'Tanggal Kuisioner',
            'D5' => 'NIK',
            'E5' => 'Nama Responden',
            'F5' => 'Nama Kelompok',
            'G5' => 'Jabatan',
            'H5' => 'Alamat',
            'I5' => 'Desa',
            'J5' => 'Kecamatan',
            'K5' => 'No Telepon',
            'L5' => 'Bentuk Usaha',
            'M5' => 'Kegiatan Usaha',
            'N5' => 'Jenis Olahan',
            'O5' => 'Luas Bangunan (m2)',
            'P5' => 'Permodalan',
            'Q5' => 'Petugas Enumerator',
            'R5' => 'Status Kuisioner'
        ];

        foreach ($headers1 as $cell => $text) {
            $sheet1->setCellValue($cell, $text);
        }
        $sheet1->getStyle('A5:R5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataIdentitas as $item) {
            $sheet1->setCellValue('A' . $row, $no);
            $sheet1->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet1->setCellValue('C' . $row, $item->tanggal_kuesioner ? date('d-m-Y', strtotime($item->tanggal_kuesioner)) : '-');
            $sheet1->setCellValueExplicit('D' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet1->setCellValue('E' . $row, $item->nama ?? $item->nama_responden ?? '-');
            $sheet1->setCellValue('F' . $row, $item->nama_kelompok ?? '-');
            $sheet1->setCellValue('G' . $row, $item->jabatan ?? '-');
            $sheet1->setCellValue('H' . $row, $item->alamat_jalan ?? '-');
            $sheet1->setCellValue('I' . $row, $item->Nama_Desa ?? '-');
            $sheet1->setCellValue('J' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet1->setCellValueExplicit('K' . $row, (string)($item->telepon ?? '-'), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet1->setCellValue('L' . $row, $item->jenis_perusahaan ?? '-');
            $sheet1->setCellValue('M' . $row, $item->kegiatan_usaha ?? '-');
            $sheet1->setCellValue('N' . $row, $item->jenis_olahan ?? '-');
            $sheet1->setCellValue('O' . $row, (float)($item->luas_bangunan_keseluruhan ?? 0));
            $sheet1->setCellValue('P' . $row, $item->permodalan ?? '-');
            $sheet1->setCellValue('Q' . $row, $item->petugas_enumerator ?? '-');
            $sheet1->setCellValue('R' . $row, $item->submit ?? 'Draft');
            $row++;
            $no++;
        }

        $colWidths1 = [
            'A' => 6, 'B' => 8, 'C' => 18, 'D' => 20, 'E' => 25, 'F' => 25, 'G' => 15,
            'H' => 30, 'I' => 20, 'J' => 20, 'K' => 18, 'L' => 20, 'M' => 20, 'N' => 20,
            'O' => 22, 'P' => 18, 'Q' => 20, 'R' => 15
        ];
        foreach ($colWidths1 as $col => $w) {
            $sheet1->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 2: PERALATAN PRODUKSI
        // -------------------------------------------------------------------------
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Peralatan Produksi');

        $sheet2->mergeCells('A1:K1');
        $sheet2->mergeCells('A2:K2');
        $sheet2->mergeCells('A3:K3');
        $sheet2->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet2->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - JUMLAH PERALATAN PRODUKSI' . $titleTahun);
        $sheet2->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet2->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers2 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'NIK',
            'D5' => 'Nama Responden',
            'E5' => 'Kelompok',
            'F5' => 'Kecamatan',
            'G5' => 'Desa',
            'H5' => 'Uraian',
            'I5' => 'Volume',
            'J5' => 'Harga (Rp)',
            'K5' => 'Nilai (Rp)'
        ];

        foreach ($headers2 as $cell => $text) {
            $sheet2->setCellValue($cell, $text);
        }
        $sheet2->getStyle('A5:K5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataAlat as $item) {
            $sheet2->setCellValue('A' . $row, $no);
            $sheet2->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet2->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet2->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet2->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet2->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet2->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet2->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet2->setCellValue('I' . $row, (float)($item->volume ?? 0));
            $sheet2->setCellValue('J' . $row, (float)($item->harga ?? 0));
            $sheet2->setCellValue('K' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        $colWidths2 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 15, 'J' => 18, 'K' => 20
        ];
        foreach ($colWidths2 as $col => $w) {
            $sheet2->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 3: BAHAN BAKU UTAMA
        // -------------------------------------------------------------------------
        $sheet3 = $spreadsheet->createSheet();
        $sheet3->setTitle('Bahan Baku Utama');

        $sheet3->mergeCells('A1:L1');
        $sheet3->mergeCells('A2:L2');
        $sheet3->mergeCells('A3:L3');
        $sheet3->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet3->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - BAHAN BAKU UTAMA' . $titleTahun);
        $sheet3->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet3->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers3 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'NIK',
            'D5' => 'Nama Responden',
            'E5' => 'Kelompok',
            'F5' => 'Kecamatan',
            'G5' => 'Desa',
            'H5' => 'Uraian',
            'I5' => 'Asal',
            'J5' => 'Volume',
            'K5' => 'Harga (Rp)',
            'L5' => 'Nilai (Rp)'
        ];

        foreach ($headers3 as $cell => $text) {
            $sheet3->setCellValue($cell, $text);
        }
        $sheet3->getStyle('A5:L5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataBahanUtama as $item) {
            $sheet3->setCellValue('A' . $row, $no);
            $sheet3->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet3->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet3->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet3->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet3->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet3->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet3->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet3->setCellValue('I' . $row, $item->asal ?? '-');
            $sheet3->setCellValue('J' . $row, (float)($item->volume ?? 0));
            $sheet3->setCellValue('K' . $row, (float)($item->harga ?? 0));
            $sheet3->setCellValue('L' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        $colWidths3 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 20, 'J' => 15, 'K' => 18, 'L' => 20
        ];
        foreach ($colWidths3 as $col => $w) {
            $sheet3->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 4: BAHAN LAINNYA
        // -------------------------------------------------------------------------
        $sheet4 = $spreadsheet->createSheet();
        $sheet4->setTitle('Bahan Lainnya');

        $sheet4->mergeCells('A1:K1');
        $sheet4->mergeCells('A2:K2');
        $sheet4->mergeCells('A3:K3');
        $sheet4->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet4->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - BAHAN LAINNYA' . $titleTahun);
        $sheet4->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet4->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers4 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'NIK',
            'D5' => 'Nama Responden',
            'E5' => 'Kelompok',
            'F5' => 'Kecamatan',
            'G5' => 'Desa',
            'H5' => 'Uraian',
            'I5' => 'Volume',
            'J5' => 'Harga (Rp)',
            'K5' => 'Nilai (Rp)'
        ];

        foreach ($headers4 as $cell => $text) {
            $sheet4->setCellValue($cell, $text);
        }
        $sheet4->getStyle('A5:K5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataBahanLain as $item) {
            $sheet4->setCellValue('A' . $row, $no);
            $sheet4->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet4->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet4->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet4->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet4->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet4->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet4->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet4->setCellValue('I' . $row, (float)($item->volume ?? 0));
            $sheet4->setCellValue('J' . $row, (float)($item->harga ?? 0));
            $sheet4->setCellValue('K' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        $colWidths4 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 15, 'J' => 18, 'K' => 20
        ];
        foreach ($colWidths4 as $col => $w) {
            $sheet4->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 5: NILAI PRODUKSI
        // -------------------------------------------------------------------------
        $sheet5 = $spreadsheet->createSheet();
        $sheet5->setTitle('Nilai Produksi');

        $sheet5->mergeCells('A1:L1');
        $sheet5->mergeCells('A2:L2');
        $sheet5->mergeCells('A3:L3');
        $sheet5->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet5->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - NILAI PRODUKSI' . $titleTahun);
        $sheet5->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet5->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers5 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'NIK',
            'D5' => 'Nama Responden',
            'E5' => 'Kelompok',
            'F5' => 'Kecamatan',
            'G5' => 'Desa',
            'H5' => 'Uraian',
            'I5' => 'Lokasi Pemasaran',
            'J5' => 'Volume',
            'K5' => 'Harga (Rp)',
            'L5' => 'Nilai (Rp)'
        ];

        foreach ($headers5 as $cell => $text) {
            $sheet5->setCellValue($cell, $text);
        }
        $sheet5->getStyle('A5:L5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataNilai as $item) {
            $sheet5->setCellValue('A' . $row, $no);
            $sheet5->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet5->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet5->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet5->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet5->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet5->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet5->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet5->setCellValue('I' . $row, $item->lokasi_pemasaran ?? '-');
            $sheet5->setCellValue('J' . $row, (float)($item->volume ?? 0));
            $sheet5->setCellValue('K' . $row, (float)($item->harga ?? 0));
            $sheet5->setCellValue('L' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        $colWidths5 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 25, 'J' => 15, 'K' => 18, 'L' => 20
        ];
        foreach ($colWidths5 as $col => $w) {
            $sheet5->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 6: SERTIFIKAT & PERIJINAN
        // -------------------------------------------------------------------------
        $sheet6 = $spreadsheet->createSheet();
        $sheet6->setTitle('Sertifikat & Perijinan');

        $sheet6->mergeCells('A1:J1');
        $sheet6->mergeCells('A2:J2');
        $sheet6->mergeCells('A3:J3');
        $sheet6->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet6->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - SERTIFIKAT DAN PERIJINAN' . $titleTahun);
        $sheet6->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN KABUPATEN BANDUNG');
        $sheet6->setCellValue('A3', 'Tanggal Unduh: ' . date('d-m-Y H:i:s'));

        $headers6 = [
            'A5' => 'No',
            'B5' => 'Tahun',
            'C5' => 'NIK',
            'D5' => 'Nama Responden',
            'E5' => 'Kelompok',
            'F5' => 'Kecamatan',
            'G5' => 'Desa',
            'H5' => 'Jenis Perijinan',
            'I5' => 'No Perijinan',
            'J5' => 'Tanggal Perijinan'
        ];

        foreach ($headers6 as $cell => $text) {
            $sheet6->setCellValue($cell, $text);
        }
        $sheet6->getStyle('A5:J5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataPerijinan as $item) {
            $sheet6->setCellValue('A' . $row, $no);
            $sheet6->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet6->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet6->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet6->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet6->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet6->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet6->setCellValue('H' . $row, $item->jenis_perijinan ?? '-');
            $sheet6->setCellValueExplicit('I' . $row, (string)($item->no_perijinan ?? '-'), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet6->setCellValue('J' . $row, $item->tgl_perijinan ? date('d-m-Y', strtotime($item->tgl_perijinan)) : '-');
            $row++;
            $no++;
        }

        $colWidths6 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 25, 'J' => 20
        ];
        foreach ($colWidths6 as $col => $w) {
            $sheet6->getColumnDimension($col)->setWidth($w);
        }

        // Return to first sheet as active view
        $spreadsheet->setActiveSheetIndex(0);

        $filename = 'Kuisioner_Pengolahan_' . (!empty($tahun) && $tahun != '0' && $tahun != 'all' ? $tahun . '_' : '') . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }


    public function add()
    {
            $this->load->vars(array(
                'page_title' => 'Tambah Kuisioner Data Pengolahan',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
            ));
            
            $data['tanggal_kuesioner'] = $this->input->post('tanggal_kuesioner');
            $data['nama_responden'] = $this->input->post('nama_responden');
            $data['petugas_enumelator'] = $this->input->post('petugas_enumelator');
            $data['user_id'] = $this->input->post('user_id');
            $data['kecamatan'] = $this->kecamatan_model->get_all();
            $data['kabupaten'] = $this->kabupaten_model->get_data();
            $data['desa'] = $this->desa_model->get_all();
            $data['alat_produksi'] = $this->Pengolahan_alat_produksi_model->get_all();
            $data['bahan_lainnya'] = $this->Pengolahan_bahan_model->get_all();
            $data['bahan_utama'] = $this->Pengolahan_bahan_utama_model->get_all();
            $data['nilai_produksi'] = $this->Pengolahan_nilai_produksi_model->get_all();
            $data['perijinan'] = $this->Pengolahan_perijinan_model->get_all();

            $this->template 
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_arrows'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_circles'))
                        ->set_css(bower_url('smartwizard/dist/css/smart_wizard_theme_dots'))
                        ->set_js(bower_url('smartwizard/dist/js/jquery.smartWizard.min'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/add.js?v=' . time()))
                        ->build('pendataan/pengolahan/add',$data);
    }
    public function view($id)
        {
            $this->load->vars(array(
                'page_title' => 'Detail Data Pengolahan',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
                'ui_controller' => 'pendataan/pengolahan/datail',
            ));
            $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
            $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
            $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
            $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
            $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
            $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
            $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
            $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 

            $this->template
                            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                            ->build('pendataan/pengolahan/show',$data);
        }
    public function detail($id)
    {
        $this->load->vars(array(
            'page_title' => 'Detail Data Pengolahan',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan').'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $data['desa'] = $this->desa_model->get_all();
        $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
        $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
        $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
        $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 

        $data['alat_produksi_master'] = $this->Pengolahan_alat_produksi_model->get_all();
        $data['bahan_lainnya_master'] = $this->Pengolahan_bahan_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $data['nilai_produksi_master'] = $this->Pengolahan_nilai_produksi_model->get_all();
        $data['jenis_perijinan'] = $this->Pengolahan_perijinan_model->get_all();

        
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js?v=' . time()))
                        ->build('pendataan/pengolahan/detail',$data);
    }

    public function edit_alat_produksi($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Biaya Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat($id);
        $data['alat_produksi_master'] = $this->Pengolahan_alat_produksi_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_alat_produksi',$data);
    }


    public function edit_bahan_utama($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Bahan Utama',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama($id);
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_bahan_utama',$data);
    }

    public function edit_bahan_lain($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Bahan Lain',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['bahan_lain'] = $this->pengolahan_model->get_by_bahan($id);
        $data['bahan_lainnya_master'] = $this->Pengolahan_bahan_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_bahan_lain',$data);
    }

    public function edit_nilai_produksi($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Nilai Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai($id);
        $data['nilai_produksi_master'] = $this->Pengolahan_nilai_produksi_model->get_all();
        $data['bahan_utama_master'] = $this->Pengolahan_bahan_utama_model->get_all();

        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_nilai_produksi',$data);
    }

    public function edit_perijinan($id,$pengolahan_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Perijinan',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/pengolahan/detail/').$pengolahan_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/pengolahan/datail',
        ));
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan($id);
        $data['jenis_perijinan'] = $this->Pengolahan_perijinan_model->get_all();
        // var_dump($data['perijinan']) or die;
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/pengolahan/detail.js'))
                        ->build('pendataan/pengolahan/edit/edit_perijinan',$data);
    }

    public function pdf($id){

        $data['pengolahan'] = $this->pengolahan_model->get_by_id($id);
        $data['pengolahan_identitas'] = $this->identitas_pengolahan_model->get_by_id($id);
        $data['pengolahan_ket_umum'] = $this->pengolahan_model->get_by_ket_id($id);
        $data['alat_produksi'] = $this->pengolahan_model->get_by_alat_id($id);
        $data['bahan_lainnya'] = $this->pengolahan_model->get_by_bahan_lain_id($id);
        $data['bahan_utama'] = $this->pengolahan_model->get_by_bahan_utama_id($id);
        $data['nilai_produksi'] = $this->pengolahan_model->get_by_nilai_produksi_id($id);
        $filename = $data['pengolahan_identitas']->nik.'_'.$data['pengolahan_identitas']->nama;
        $data['perijinan'] = $this->pengolahan_model->get_by_perijinan_id($id); 
        
        $html = $this->load->view('documents/kuesioner_pengolahan',$data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle($filename);
        $mpdf->SetFooter('Sikandung|'.date("d F Y").'|{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename.'.pdf', 'I');
        
    }

     function delete_alat_produksi($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_alat_produksi($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_bahan_utama($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_bahan_utama($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_bahan_lain($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_bahan_lain($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

    function delete_nilai_produksi($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_nilai_produksi($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }
    function delete_perijinan($id,$pengolahan_id)
	{
        $this->pengolahan_model->delete_perijinan($id);
		redirect('pendataan/pengolahan/detail/'.$pengolahan_id);
    }

}