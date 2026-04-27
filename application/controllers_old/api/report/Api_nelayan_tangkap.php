<?php

/**
 * User: Didik Kurniawan
 * Date: 11/14/17
 * Time: 07:26
 */
class Api_nelayan_tangkap extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
         $this->load->model('report/nelayan_tangkap_model');
    }

    public function tangkap($a="0",$b="0")
    {
        $a = preg_replace('/%20/', ' ',$a);
        $data = $this->nelayan_tangkap_model->datatables($a,$b);
        echo $data;
    }
}