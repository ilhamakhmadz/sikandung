<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_tangkap_perijinan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/tangkap/tangkap_perijinan_model');
    }
     public function index()
    {
        $data = $this->tangkap_perijinan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->tangkap_perijinan_model->add(array(
            'tangkap_perijinan_uraian_ket' => $this->input->post('tangkap_perijinan_uraian_ket'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->tangkap_perijinan_model->delete($id));

        redirect(site_url('master/tangkap/tangkap_perijinan'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->tangkap_perijinan_model->edit($id, array(
                'tangkap_perijinan_uraian_ket' => $this->input->post('tangkap_perijinan_uraian_ket'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}