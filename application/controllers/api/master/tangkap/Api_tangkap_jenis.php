<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_tangkap_jenis extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/tangkap/tangkap_jenis_model');
    }
     public function index()
    {
        $data = $this->tangkap_jenis_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->tangkap_jenis_model->add(array(
            'tangkap_jenis_nama' => $this->input->post('tangkap_jenis_nama'),
            'tangkap_kategori_id' => $this->input->post('kategori'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->tangkap_jenis_model->delete($id));

        redirect(site_url('master/tangkap/tangkap_jenis'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->tangkap_jenis_model->edit($id, array(
                'tangkap_jenis_nama' => $this->input->post('tangkap_jenis_nama'),
                'tangkap_kategori_id' => $this->input->post('kategori'),

         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}