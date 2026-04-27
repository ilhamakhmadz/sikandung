<?php

class Budidaya_kategori extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/budidaya/budidaya_kategori_model');
        if ($this->input->post('cancel-button'))
            redirect('auth/user/index');

        $this->load->language('auth');
        $this->template
                    ->set_css(bower_url('select2/dist/css/select2.min'))
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->set_js(bower_url('sweetalert/dist/sweetalert.min.js'))
                    ->set_js(bower_url('jquery-validation/dist/jquery.validate.min.js'))
                    ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
		            ->set_js(bower_url('select2/dist/js/select2.min'));
    }

    public function index()
    {
        $this->load->vars(array(
            'page_title' => 'Master Data Kategori Budidaya',
            'site_title' => 'Perikanan Budidaya',
            'page_icon' => '<a class="btn btn-primary" href="' . site_url('master/budidaya/budidaya_kategori/add') . '"> <i class="fa fa-plus"></i> Tambah</a><br>',
            'ui_controller' => 'jenis_bantuan',
        ));
        $this->template
                    ->set_css(bower_url('datatables/media/css/dataTables.bootstrap'))
                    ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
                    ->build('master/budidaya/budidaya_kategori/index');
    }


    public function add()
    {
        $this->load->vars(array(
            'page_title' => 'Tambah Data Kategori Budidaya',
            'site_title' => 'Perikanan Budidaya',
        ));
        $this->template
        ->set_js(assets_url('js/app/master/budidaya/budidaya_kategori/add.js'))
            ->build('master/budidaya/budidaya_kategori/add');
    }

    public function edit($id)
    {
        $this->load->vars(array(
            'page_title' => 'Edit Data Kategori Budidaya',
            'site_title' => 'Perikanan Budidaya',
        ));
        $data['budidaya_kategori'] = $this->budidaya_kategori_model->get_by_id($id);
        $this->template
            ->set_js(assets_url('js/app/master/budidaya/budidaya_kategori/edit.js'))
            ->build('master/budidaya/budidaya_kategori/edit',$data);
    }

}