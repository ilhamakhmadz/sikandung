<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya_kategori extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/budidaya/budidaya_kategori_model');
    }
     public function index()
    {
        $data = $this->budidaya_kategori_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->budidaya_kategori_model->add(array(
            'budidaya_kategori_nama' => $this->input->post('budidaya_kategori_nama'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->budidaya_kategori_model->delete($id));

        redirect(site_url('master/budidaya/budidaya_kategori'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->budidaya_kategori_model->edit($id, array(
                'budidaya_kategori_nama' => $this->input->post('budidaya_kategori_nama'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}