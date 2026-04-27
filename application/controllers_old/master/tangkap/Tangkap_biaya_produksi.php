<?php

class Tangkap_biaya_produksi extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/tangkap/tangkap_biaya_produksi_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                    ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
		            ->set_js(bower_url('select2/dist/js/select2.min'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Biaya Produksi Tangkap',
            'site_title' => 'Perikanan Tangkap',
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('master/tangkap/tangkap_biaya_produksi/add') . '"> <i class="fa fa-plus"></i> Tambah</a><br>',
            'ui_controller' => 'jenis_bantuan',
        ));
        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->build('master/tangkap/tangkap_biaya_produksi/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Biaya Produksi Tangkap',
            'site_title' => 'Perikanan Tangkap',
        ));
        $this->template
        ->set_js(assets_url('js/app/master/tangkap/tangkap_biaya_produksi/add.js'))
            ->build('master/tangkap/tangkap_biaya_produksi/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Edit Data Biaya Produksi Tangkap',
            'site_title' => 'Perikanan Tangkap',
        ));
        $data['tangkap_biaya_produksi'] = $this->tangkap_biaya_produksi_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/tangkap/tangkap_biaya_produksi/edit.js'))
            ->build('master/tangkap/tangkap_biaya_produksi/edit',$data);
    }

}