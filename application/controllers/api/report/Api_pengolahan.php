<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_pengolahan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('report/pengolahan_model');
    }

    public function pengolahan($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->pengolahan_model->datatables($a,$b);
        echo $data;
    }
}