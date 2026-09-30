<?php

class Report_pembenihan extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report/pembenihan_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
    }

	
    public function index()
	{
		$this->load->vars(array(
            'page_title' => 'Laporan Budidaya Pembenihan',
            'site_title' => 'Laporan',
            'ui_controller' => 'dashboard/home',
		));
            $data['kelompok_pembenihan'] = $this->pembenihan_model->get_kelompok_pembenihan();
            $data['kecamatan_pembenihan'] = $this->pembenihan_model->get_kecamatan_pembenihan();
            $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                    ->set_js(assets_url('datatables_responsive/datatables.bundle', true)) 
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('select2/dist/js/select2.min'))
                    ->set_js(assets_url('js/app/report/pembenihan.js'))
					->build('report/pembenihan',$data);
	}

    public function pdf($a="0",$b="0"){
        @ini_set('pcre.backtrack_limit', '5000000');
        @ini_set('memory_limit', '512M');
        $a = preg_replace('/%20/', ' ',$a);
        $data['pembenihan'] = $this->pembenihan_model->cetak_pdf($a,$b);
        $data['kelompok'] = $a;
        $data['kecamatan'] = $b;
        $filename = "Budidaya Pembenihan";
        
        $html = $this->load->view('report/Pdf_pembenihan',$data, TRUE);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->SetTitle($filename);
        $mpdf->SetFooter('Sikandung|'.date("d F Y").'|{PAGENO}');
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename.'.pdf', 'I');
    }

    public function excel($a="0",$b="0"){
        $a = preg_replace('/%20/', ' ',$a);
        $data_excel = $this->pembenihan_model->cetak_pdf($a,$b);
        
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->mergeCells('A1:J1');
        $sheet->mergeCells('A2:J2');
        $sheet->mergeCells('A3:J3');
        $sheet->mergeCells('A4:C4');
        $sheet->mergeCells('A5:C5');

        $sheet->getStyle('A1:A3')->getFont()->setSize(14)->setBold(true);
        $sheet->setCellValue('A1', 'LAPORAN DATA BUDIDAYA PEMBENIHAN');
        $sheet->setCellValue('A2', 'DINAS KETAHANAN PANGAN DAN PERIKANAN');
        $sheet->setCellValue('A3', 'KABUPATEN BANDUNG');

        $sheet->setCellValue('A4', 'KELOMPOK : ' . ($a != "0" ? $a : '-'));
        $sheet->setCellValue('A5', 'KECAMATAN : ' . ($b != "0" ? $b : '-'));
        
        $sheet->setCellValue('A7', 'No')
            ->setCellValue('B7', 'NIK')
            ->setCellValue('C7', 'Nama')
            ->setCellValue('D7', 'Kelompok')
            ->setCellValue('E7', 'Kecamatan')
            ->setCellValue('F7', 'Desa')
            ->setCellValue('G7', 'Luas Lahan (m2)')
            ->setCellValue('H7', 'Biaya Produksi')
            ->setCellValue('I7', 'Volume Produksi')
            ->setCellValue('J7', 'Nilai Produksi'); 
        
        $sheet->getStyle('A7:J7')->getFont()->setBold(true);

        $rowCount = 8;
        $no = 1;
        foreach ($data_excel as $list) {
            $sheet->setCellValue('A' . $rowCount, $no);
            $sheet->setCellValueExplicit('B' . $rowCount, (string)($list->nik ?? ''), \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('C' . $rowCount, $list->nama ?? '');
            $sheet->setCellValue('D' . $rowCount, $list->nama_kelompok ?? '');
            $sheet->setCellValue('E' . $rowCount, $list->Nama_Kecamatan ?? '');
            $sheet->setCellValue('F' . $rowCount, $list->Nama_Desa ?? '');
            $sheet->setCellValue('G' . $rowCount, $list->luas_kolam_m2 ?? 0);
            $sheet->setCellValue('H' . $rowCount, $list->harga_produksi ?? 0);
            $sheet->setCellValue('I' . $rowCount, $list->volume_produksi ?? 0);
            $sheet->setCellValue('J' . $rowCount, $list->nilai_produksi ?? 0);
            $rowCount++;
            $no++;
        }

        foreach(range('A','J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $sheet->setTitle(date('Y-m-d').' - Pembenihan');

        $filename = date('Y-m-d').' - Pembenihan.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}