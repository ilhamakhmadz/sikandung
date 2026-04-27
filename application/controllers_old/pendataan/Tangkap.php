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
        if($this->acl->is_allowed('pendataan/tangkap/add')):
            $this->load->vars(array(
            'page_icon' => '<button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd"><i class=""></i> Tambah</button>',
        ));
        endif;
        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_css(assets_url('datatables_responsive/datatables.bundle'))
                    ->set_js(assets_url('datatables_responsive/datatables.bundle', true)) 
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('select2/dist/js/select2.min'))
                    ->build('pendataan/tangkap/index');
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