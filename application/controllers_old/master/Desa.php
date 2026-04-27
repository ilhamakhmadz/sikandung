<?php

class Desa extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');
        $this->load->model('master/desa_model');
        $this->load->language('auth');
        $this->template->set_js(bower_url('sweetalert/dist/sweetalert.min.js'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Desa',
            'site_title' => 'Alamat',
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('master/desa/add') . '"> <i class="fa fa-plus"></i> Tambah</a><br>',
            'ui_controller' => 'desa',
        ));
        $this->template
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->build('master/desa/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Desa',
            'site_title' => 'Alamat',
        ));
        $this->load->model('auth/user_model');
        $data['kecamatan'] = $this->user_model->get_kecamatan();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/master/desa/add.js'))
            ->build('master/desa/add',$data);
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Edit Data Desa',
            'site_title' => 'Alamat',
        ));
        $this->load->model('auth/user_model');

        $data['desa'] = $this->desa_model->get_by_id($id);
        $data['kecamatan'] = $this->user_model->get_kecamatan();
        $this->template
            ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
            ->set_js(assets_url('js/app/master/desa/edit.js'))
            ->build('master/desa/edit',$data);
    }

}