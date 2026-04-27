<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_budidaya_bahan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('master/budidaya/budidaya_bahan_model');
    }
     public function index()
    {
        $data = $this->budidaya_bahan_model->datatables();
        echo $data;
    }
    public function add()
    {
        $data = $this->budidaya_bahan_model->add(array(
            'budidaya_bahan_lain_uraian_ket' => $this->input->post('budidaya_bahan_lain_uraian_ket'),
                ));
            echo json_encode($data);
    }
    public function delete($id)
    {
        echo json_encode($this->budidaya_bahan_model->delete($id));

        redirect(site_url('master/budidaya/budidaya_bahan'));
    }

    public function edit($id)
    {
        if ($this->input->method('post')) {
            echo json_encode($this->budidaya_bahan_model->edit($id, array(
                'budidaya_bahan_lain_uraian_ket' => $this->input->post('budidaya_bahan_lain_uraian_ket'),
         )));
        } else {
           throw new Exception('Method not Allowed');
        }
    }


}