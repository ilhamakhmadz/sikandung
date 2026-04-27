<?php

class Identitas_tangkap extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('personal_data/identitas_tangkap_model');
        $this->load->model('master/kabupaten_model');
        $this->load->model('master/kecamatan_model');
        $this->load->model('master/desa_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template
        
                ->set_css(bower_url('select2/dist/css/select2.min'))
                ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
                ->set_js(bower_url('lodash/dist/lodash.min.js'))
                ->set_js(bower_url('select2/dist/js/select2.min'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Peserta',
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('personal_data/identitas_tangkap/add') . '"> <i class="fa fa-plus"></i> Tambah</a><br>',
            'ui_controller' => 'identitas_tangkap',
        ));
        $this->template
                    ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->build('personal_data/identitas_tangkap/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Peserta'
        ));
        $data['kecamatan'] = $this->kecamatan_model->get_all();
        $data['kabupaten'] = $this->kabupaten_model->get_data();
        $data['desa'] = $this->desa_model->get_all();
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));

        $this->template
            ->set_js(assets_url('js/app/personal_data/identitas_tangkap/add.js'))
            ->build('personal_data/identitas_tangkap/add',$data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Ubah Data Peserta',
            'ui_controller' => 'identitas_tangkap',
        ));
        $data['identitas_tangkap'] = $this->identitas_tangkap_model->get_by_id($id);
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));

        $this->template
            ->set_js(assets_url('js/app/personal_data/identitas_tangkap/edit.js'))
            ->build('personal_data/identitas_tangkap/edit',$data);
    }

    public function detail($id)
    {
        $this->load->vars(array(
            'page_title' => 'Detail Data Peserta',
            'ui_controller' => 'identitas_tangkap',
        ));
        $data['identitas_tangkap'] = $this->identitas_tangkap_model->get_by_id($id);
        $data['bidang_usaha'] = $this->bidang_usaha_model->get_all();
        $data['jenis_pendataan'] = $this->jenis_pendataan_model->get_all();
        $data['pendataan'] = $this->personal_perekonomian_model->get_data_by_id($id);
        $data['detail_produk'] = $this->personal_perekonomian_model->detail_pemasaran($id);
        $data['detail_produk_1'] = $this->personal_perekonomian_model->detail_pemasaran_1($id);
        $this->template
            ->set_js(assets_url('js/app/personal_data/identitas_tangkap/detail.js'))
            ->build('personal_data/identitas_tangkap/detail',$data);
    }

}