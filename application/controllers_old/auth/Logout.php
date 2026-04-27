<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Logout controller.
 * 
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Logout extends MY_Controller 
{
	function index()
	{
		// $this->load->library('logs');
		// $this->logs->log_logout($this->session->userdata['id']);
		$this->auth->logout();
		redirect('/');
	}
}
