<?php

class Tangkap extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendataan/tangkap_model');
        $this->load->model('personal_data/identitas_tangkap_model');
        $this->load->model('master/kabupaten_model');
        $this->load->model('master/kecamatan_model');
        $this->load->model('master/tangkap/Tangkap_jenis_model');
        $this->load->model('master/tangkap/Tangkap_biaya_produksi_model');
        $this->load->model('master/tangkap/Tangkap_nilai_produksi_model');
        $this->load->model('master/tangkap/Tangkap_perijinan_model');

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
            'page_title' => 'Data Kelompok Perikanan Tangkap',
            'site_title' => 'Pendataan',
            'ui_controller' => 'pendataan/tangkap',
        ));
        $buttons = '';
        if($this->acl->is_allowed('pendataan/tangkap/add')):
            $buttons .= '<button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd"><i class="fa fa-plus"></i> Tambah</button> ';
        endif;
        $buttons .= '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalExport"><i class="fa fa-file-excel-o"></i> Export Excel</button>';
        
        $this->load->vars(array(
            'page_icon' => $buttons,
        ));
        $data['list_tahun'] = $this->tangkap_model->get_list_tahun();

        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                    ->set_js(assets_url('datatables_responsive/datatables.bundle', true)) 
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('select2/dist/js/select2.min'))
                    ->build('pendataan/tangkap/index', $data);
    }

    public function export()
    {
        $userId = $this->session->userdata('id');
        $roleId = $this->session->userdata('role_id');
        $tahun = $this->input->get('tahun') ?: $this->input->post('tahun');

        $dataIdentitas = $this->tangkap_model->get_export_data($userId, $roleId, $tahun);
        $dataBiaya     = $this->tangkap_model->get_export_biaya_produksi($userId, $roleId, $tahun);
        $dataNilai     = $this->tangkap_model->get_export_nilai_produksi($userId, $roleId, $tahun);
        $dataPerijinan = $this->tangkap_model->get_export_perijinan($userId, $roleId, $tahun);

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

        $sheet1->mergeCells('A1:Q1');
        $sheet1->mergeCells('A2:Q2');
        $sheet1->mergeCells('A3:Q3');
        $sheet1->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet1->setCellValue('A1', 'DATA HASIL KUISIONER PERIKANAN TANGKAP' . $titleTahun);
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
            'L5' => 'Jenis Perairan',
            'M5' => 'Luas PU (m2)',
            'N5' => 'Pengelola PU',
            'O5' => 'Trip Penangkapan (Bulan)',
            'P5' => 'Petugas Enumerator',
            'Q5' => 'Status Kuisioner'
        ];

        foreach ($headers1 as $cell => $text) {
            $sheet1->setCellValue($cell, $text);
        }
        $sheet1->getStyle('A5:Q5')->applyFromArray($headerStyle);

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
            $sheet1->setCellValue('L' . $row, $item->tangkap_jenis_perairan ?? '-');
            $sheet1->setCellValue('M' . $row, (float)($item->luas_pu_m2 ?? 0));
            $sheet1->setCellValue('N' . $row, $item->pengelola_pu ?? '-');
            $sheet1->setCellValue('O' . $row, (int)($item->jumlah_trip_penangkapan_sebulan ?? 0));
            $sheet1->setCellValue('P' . $row, $item->petugas_enumerator ?? '-');
            $sheet1->setCellValue('Q' . $row, $item->submit ?? 'Draft');
            $row++;
            $no++;
        }

        $colWidths1 = [
            'A' => 6, 'B' => 8, 'C' => 18, 'D' => 20, 'E' => 25, 'F' => 25, 'G' => 15,
            'H' => 30, 'I' => 20, 'J' => 20, 'K' => 18, 'L' => 18, 'M' => 15, 'N' => 18,
            'O' => 22, 'P' => 20, 'Q' => 15
        ];
        foreach ($colWidths1 as $col => $w) {
            $sheet1->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 2: BIAYA PRODUKSI
        // -------------------------------------------------------------------------
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Biaya Produksi');

        $sheet2->mergeCells('A1:M1');
        $sheet2->mergeCells('A2:M2');
        $sheet2->mergeCells('A3:M3');
        $sheet2->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet2->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - BIAYA PRODUKSI PER SEKALI SIKLUS' . $titleTahun);
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
            'I5' => 'Jenis',
            'J5' => 'Kategori',
            'K5' => 'Volume',
            'L5' => 'Harga (Rp)',
            'M5' => 'Nilai (Rp)'
        ];

        foreach ($headers2 as $cell => $text) {
            $sheet2->setCellValue($cell, $text);
        }
        $sheet2->getStyle('A5:M5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataBiaya as $item) {
            $sheet2->setCellValue('A' . $row, $no);
            $sheet2->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet2->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet2->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet2->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet2->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet2->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet2->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet2->setCellValue('I' . $row, $item->jenis ?? '-');
            $sheet2->setCellValue('J' . $row, $item->kategori ?? '-');
            $sheet2->setCellValue('K' . $row, (float)($item->volume ?? 0));
            $sheet2->setCellValue('L' . $row, (float)($item->harga ?? 0));
            $sheet2->setCellValue('M' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        $colWidths2 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 30, 'I' => 25, 'J' => 20, 'K' => 15, 'L' => 18, 'M' => 20
        ];
        foreach ($colWidths2 as $col => $w) {
            $sheet2->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 3: NILAI PRODUKSI
        // -------------------------------------------------------------------------
        $sheet3 = $spreadsheet->createSheet();
        $sheet3->setTitle('Nilai Produksi');

        $sheet3->mergeCells('A1:M1');
        $sheet3->mergeCells('A2:M2');
        $sheet3->mergeCells('A3:M3');
        $sheet3->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet3->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - NILAI PRODUKSI' . $titleTahun);
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
            'I5' => 'Jenis',
            'J5' => 'Kategori',
            'K5' => 'Volume',
            'L5' => 'Harga (Rp)',
            'M5' => 'Nilai (Rp)'
        ];

        foreach ($headers3 as $cell => $text) {
            $sheet3->setCellValue($cell, $text);
        }
        $sheet3->getStyle('A5:M5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataNilai as $item) {
            $sheet3->setCellValue('A' . $row, $no);
            $sheet3->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet3->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet3->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet3->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet3->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet3->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet3->setCellValue('H' . $row, $item->uraian ?? '-');
            $sheet3->setCellValue('I' . $row, $item->jenis ?? '-');
            $sheet3->setCellValue('J' . $row, $item->kategori ?? '-');
            $sheet3->setCellValue('K' . $row, (float)($item->volume ?? 0));
            $sheet3->setCellValue('L' . $row, (float)($item->harga ?? 0));
            $sheet3->setCellValue('M' . $row, (float)($item->nilai ?? 0));
            $row++;
            $no++;
        }

        foreach ($colWidths2 as $col => $w) {
            $sheet3->getColumnDimension($col)->setWidth($w);
        }

        // -------------------------------------------------------------------------
        // SHEET 4: SERTIFIKAT & PERIJINAN
        // -------------------------------------------------------------------------
        $sheet4 = $spreadsheet->createSheet();
        $sheet4->setTitle('Sertifikat & Perijinan');

        $sheet4->mergeCells('A1:J1');
        $sheet4->mergeCells('A2:J2');
        $sheet4->mergeCells('A3:J3');
        $sheet4->getStyle('A1:A3')->getFont()->setSize(13)->setBold(true);
        $sheet4->setCellValue('A1', 'BAGIAN II. ASPEK TEKNIS - SERTIFIKAT DAN PERIJINAN' . $titleTahun);
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
            'H5' => 'Jenis Perijinan',
            'I5' => 'Nomor Perijinan',
            'J5' => 'Tanggal Perijinan'
        ];

        foreach ($headers4 as $cell => $text) {
            $sheet4->setCellValue($cell, $text);
        }
        $sheet4->getStyle('A5:J5')->applyFromArray($headerStyle);

        $row = 6;
        $no = 1;
        foreach ($dataPerijinan as $item) {
            $sheet4->setCellValue('A' . $row, $no);
            $sheet4->setCellValue('B' . $row, $item->tahun ?? date('Y'));
            $sheet4->setCellValueExplicit('C' . $row, (string)($item->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet4->setCellValue('D' . $row, $item->nama ?? '-');
            $sheet4->setCellValue('E' . $row, $item->nama_kelompok ?? '-');
            $sheet4->setCellValue('F' . $row, $item->Nama_Kecamatan ?? '-');
            $sheet4->setCellValue('G' . $row, $item->Nama_Desa ?? '-');
            $sheet4->setCellValue('H' . $row, $item->jenis_perijinan ?? '-');
            $sheet4->setCellValueExplicit('I' . $row, (string)($item->no_perijinan ?? '-'), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet4->setCellValue('J' . $row, $item->tgl_perijinan ? date('d-m-Y', strtotime($item->tgl_perijinan)) : '-');
            $row++;
            $no++;
        }

        $colWidths4 = [
            'A' => 6, 'B' => 8, 'C' => 20, 'D' => 25, 'E' => 25, 'F' => 20, 'G' => 20,
            'H' => 25, 'I' => 25, 'J' => 20
        ];
        foreach ($colWidths4 as $col => $w) {
            $sheet4->getColumnDimension($col)->setWidth($w);
        }

        // Set active sheet back to sheet 1
        $spreadsheet->setActiveSheetIndex(0);

        $filename = 'Kuisioner_Tangkap_Lengkap_' . date('Ymd_His') . '.xlsx';
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
                'page_title' => 'Tambah Kuisioner Data Perikanan Tangkap',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap').'"><i class=""></i> Kembali</a>',
            ));
            
            $data['tanggal_kuesioner'] = $this->input->post('tanggal_kuesioner');
            $data['nama_responden'] = $this->input->post('nama_responden');
            $data['petugas_enumelator'] = $this->input->post('petugas_enumelator');
            $data['user_id'] = $this->input->post('user_id');
            $data['kecamatan'] = $this->kecamatan_model->get_all();
            $data['kabupaten'] = $this->kabupaten_model->get_data();
            $data['desa'] = $this->desa_model->get_all();
            $data['biaya_produksi'] = $this->Tangkap_biaya_produksi_model->get_all();
            $data['jenis_biaya'] = $this->Tangkap_jenis_model->get_data();
            $data['nilai_produksi'] = $this->Tangkap_nilai_produksi_model->get_all();
            $data['perijinan'] = $this->Tangkap_perijinan_model->get_all();
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
                        ->set_js(assets_url('js/app/pendataan/tangkap/add.js'))
                        ->build('pendataan/tangkap/add',$data);
    }
    public function view($id)
        {
            $this->load->vars(array(
                'page_title' => 'Detail Data Perikanan Tangkap',
                'site_title' => 'Pendataan',
                'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap').'"><i class=""></i> Kembali</a>',
                'ui_controller' => 'pendataan/tangkap/datail',
            ));
            $data['tangkap'] = $this->tangkap_model->get_by_id($id);
            $data['tangkap_identitas'] = $this->identitas_tangkap_model->get_by_id($id);
            $data['tangkap_ket_umum'] = $this->tangkap_model->get_by_ket_id($id);
            $data['biaya_produksi'] = $this->tangkap_model->get_by_biaya_id($id);
            $data['nilai_produksi'] = $this->tangkap_model->get_by_nilai_produksi_id($id);
            $data['perijinan'] = $this->tangkap_model->get_by_perijinan_id($id);

            $this->template
                            ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                            ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                            ->build('pendataan/tangkap/show',$data);
        }
    public function detail($id)
    {
        $this->load->vars(array(
            'page_title' => 'Detail Data Perikanan Tangkap',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap').'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/tangkap/datail',
        ));
        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $data['desa'] = $this->desa_model->get_all();
        $data['tangkap'] = $this->tangkap_model->get_by_id($id);
        $data['tangkap_identitas'] = $this->identitas_tangkap_model->get_by_id($id);
        $data['tangkap_ket_umum'] = $this->tangkap_model->get_by_ket_id($id);
        $data['biaya_produksi'] = $this->tangkap_model->get_by_biaya_id($id);
        $data['nilai_produksi'] = $this->tangkap_model->get_by_nilai_produksi_id($id);
        $data['perijinan'] = $this->tangkap_model->get_by_perijinan_id($id);

        $data['biaya_produksi_master'] = $this->Tangkap_biaya_produksi_model->get_all();
        $data['jenis_biaya_master'] = $this->Tangkap_jenis_model->get_data();
        $data['nilai_produksi_master'] = $this->Tangkap_nilai_produksi_model->get_all();
        $data['jenis_perijinan'] = $this->Tangkap_perijinan_model->get_all();
        
        // var_dump($data['perijinan']) or die;
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/tangkap/detail.js'))
                        ->build('pendataan/tangkap/detail',$data);
    }

    public function edit_biaya_produksi($id,$tangkap_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Biaya Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap/detail/').$tangkap_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/tangkap/datail',
        ));
        $data['biaya_produksi'] = $this->tangkap_model->get_by_biaya($id);
        $data['biaya_produksi_master'] = $this->Tangkap_biaya_produksi_model->get_all();
        $data['jenis_biaya_master'] = $this->Tangkap_jenis_model->get_data();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/tangkap/detail.js'))
                        ->build('pendataan/tangkap/edit/edit_biaya_produksi',$data);
    }

    public function edit_nilai_produksi($id,$tangkap_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Nilai Produksi',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap/detail/').$tangkap_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/tangkap/datail',
        ));
        $data['nilai_produksi'] = $this->tangkap_model->get_by_nilai($id);
        $data['nilai_produksi_master'] = $this->Tangkap_nilai_produksi_model->get_all();
        $data['jenis_biaya_master'] = $this->Tangkap_jenis_model->get_data();

        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/tangkap/detail.js'))
                        ->build('pendataan/tangkap/edit/edit_nilai_produksi',$data);
    }

    public function edit_perijinan($id,$tangkap_id){
        $this->load->vars(array(
            'page_title' => 'Edit Data Perijinan',
            'site_title' => 'Pendataan',
            'page_icon' => '<a class="btn btn-danger" href="'.site_url('pendataan/tangkap/detail/').$tangkap_id.'"><i class=""></i> Kembali</a>',
            'ui_controller' => 'pendataan/tangkap/datail',
        ));
        $data['perijinan'] = $this->tangkap_model->get_by_perijinan($id);
        $data['jenis_perijinan'] = $this->Tangkap_perijinan_model->get_all();
        $this->template
                        ->set_js(bower_url('lodash/dist/lodash.min.js'))
                        ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                        ->set_css(bower_url('select2/dist/css/select2.min'))
                        ->set_js(bower_url('select2/dist/js/select2.min'))
                        ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                        ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                        ->set_js(assets_url('js/app/pendataan/tangkap/detail.js'))
                        ->build('pendataan/tangkap/edit/edit_perijinan',$data);
    }

    public function pdf($id){

        $data['tangkap'] = $this->tangkap_model->get_by_id($id);
        $data['tangkap_identitas'] = $this->identitas_tangkap_model->get_by_id($id);
        $data['tangkap_ket_umum'] = $this->tangkap_model->get_by_ket_id($id);
        $data['biaya_produksi'] = $this->tangkap_model->get_by_biaya_id($id);
        $data['nilai_produksi'] = $this->tangkap_model->get_by_nilai_produksi_id($id);
        $data['perijinan'] = $this->tangkap_model->get_by_perijinan_id($id);

        $filename = $data['tangkap_identitas']->nik.'_'.$data['tangkap_identitas']->nama;
        
        $html = $this->load->view('documents/kuesioner_tangkap',$data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetTitle($filename);
        $mpdf->SetFooter('Sikandung|'.date("d F Y").'|{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename.'.pdf', 'I');
    }

     function delete_biaya_produksi($id,$tangkap_id)
	{
        $this->tangkap_model->delete_biaya_produksi($id);
		redirect('pendataan/tangkap/detail/'.$tangkap_id);
    }

    function delete_bahan_lain($id,$tangkap_id)
	{
        $this->tangkap_model->delete_bahan_lain($id);
		redirect('pendataan/tangkap/detail/'.$tangkap_id);
    }

    function delete_nilai_produksi($id,$tangkap_id)
	{
        $this->tangkap_model->delete_nilai_produksi($id);
		redirect('pendataan/tangkap/detail/'.$tangkap_id);
    }

    function delete_perijinan($id,$tangkap_id) 
	{
        $this->tangkap_model->delete_perijinan($id);
		redirect('pendataan/tangkap/detail/'.$tangkap_id);
    }

}