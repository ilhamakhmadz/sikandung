<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya_jenis extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/budidaya/budidaya_jenis_model');
    }
     public function index()
    {
        $data = $this->budidaya_jenis_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->budidaya_jenis_model->add(array(
            'budidaya_jenis_nama' => $this->input->post('budidaya_jenis_nama'),
            'budidaya_kategori_id' => $this->input->post('kategori'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->budidaya_jenis_model->delete($id));

        redirect(site_url('master/budidaya/budidaya_jenis'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->budidaya_jenis_model->edit($id, array(
                'budidaya_jenis_nama' => $this->input->post('budidaya_jenis_nama'),
                'budidaya_kategori_id' => $this->input->post('kategori'),

         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}