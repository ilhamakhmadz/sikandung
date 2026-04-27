<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_tangkap_kategori extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/tangkap/tangkap_kategori_model');
    }
     public function index()
    {
        $data = $this->tangkap_kategori_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->tangkap_kategori_model->add(array(
            'tangkap_kategori_nama' => $this->input->post('tangkap_kategori_nama'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->tangkap_kategori_model->delete($id));

        redirect(site_url('master/tangkap/tangkap_kategori'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->tangkap_kategori_model->edit($id, array(
                'tangkap_kategori_nama' => $this->input->post('tangkap_kategori_nama'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}