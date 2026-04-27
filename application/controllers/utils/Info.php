<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Display Server Info
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Info extends Admin_Controller
{

	function index()
	{
		$this->load->vars(array(
			'site_title' => 'Tentang Aplikasi',
			'page_title' => 'Versi PHP',
			'ui_controller' => 'desa',
		));
		$this->template->build('utils/info');
	}

	function display_info()
	{
		phpinfo();
	}

}
