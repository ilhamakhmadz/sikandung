<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pengolahan_perijinan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/pengolahan/pengolahan_perijinan_model');
    }
     public function index()
    {
        $data = $this->pengolahan_perijinan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->pengolahan_perijinan_model->add(array(
            'pengolahan_perijinan_uraian_ket' => $this->input->post('pengolahan_perijinan_uraian_ket'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->pengolahan_perijinan_model->delete($id));

        redirect(site_url('master/pengolahan/pengolahan_perijinan'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->pengolahan_perijinan_model->edit($id, array(
                'pengolahan_perijinan_uraian_ket' => $this->input->post('pengolahan_perijinan_uraian_ket'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}