<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login controller.
 *
 * @package App
 * @category Controller
 * @author Ardi Soebrata
 */
class Register extends MY_Controller
{
	protected $user_form = array(
		'first_name' => array(
			'label' => 'Nama Lengkap',
			'rules' => 'trim|required|max_length[50]',
			'helper' => 'form_inputlabel'

		),
		// 'last_name' => array(
		// 	'label'	=> 'lang:last_name',
		// 	'rules' => 'trim|max_length[50]',
		// 	'helper' => 'form_inputlabel'
		// ),
		'id' => array(
			'helper' => 'form_hidden'
		),
		// 'username' => array(
		// 	'label' => 'lang:username',
		// 	'rules' => 'trim|required|max_length[255]|callback_unique_username',
		// 	'helper' => 'form_inputlabel'
		// ),
		'email' => array(
			'label' => 'Email',
			'rules' => 'trim|required|max_length[255]|valid_email|callback_unique_email',
			'helper' => 'form_emaillabel'
		),
		'password' => array(
			'label' => 'Password',
			'rules' => 'trim|required|matches[confirm-password]',
			'helper' => 'form_passwordlabel',
			'value' => ''
		),
		'confirm-password' => array(
			'label' => 'Confirm password',
			'rules' => 'trim',
			'helper' => 'form_passwordlabel',
			'value' => ''
		),
		'role_id' => array(
			'label' => 'lang:Role',
			'rules' => 'trim',
			'helper' => 'form_hidden',
			'value' => '2'
		)
		// 'lang' => array(
		// 	'label'	=> 'lang:language',
		// 	'rules' => 'trim',
		// 	'helper' => 'form_dropdownlabel'
		// )
	);

	/**
	 * Redirect to index if cancel-button clicked.
	 */
	function __construct()
	{
		parent::__construct();

		if ($this->input->post('cancel-button'))
			redirect ('auth/user/index');

		$this->load->language('auth');
		$this->template
        ->set_css(bower_url('select2/dist/css/select2.min'))
        ->set_js(bower_url('datatables/media/js/jquery.dataTables.min'))
        ->set_js(bower_url('datatables/media/js/dataTables.bootstrap4.min'))
		->set_js(bower_url('select2/dist/js/select2.min'));
	}

	/**
	 * Display User list.
	 */
	function index()
	{
		$this->_updatedata();
	}

	/**
	 * Edit User
	 *
	 * @param integer $id
	 */
	function edit($id)
	{
		$this->_updatedata($id);
	}


	/**
	 * Update user data
	 *
	 * @param int $id
	 */
	function _updatedata($id = 0)
	{
		$this->load->library('form_validation');
		$user_form = $this->user_form;

		// Update rules for update data
		if ($id > 0)
		{
			// $user_form['username']['rules']	= "trim|required|max_length[255]|callback_unique_username[$id]";
			$user_form['email']['rules']	= "trim|required|max_length[255]|valid_email|callback_unique_email[$id]";
			$user_form['password']['rules']	= "trim|matches[confirm-password]";
			$user_form['confirm-password']['rules']	= "trim";
		}

		// Add language options
		// $languages = $this->config->item('languages', 'template');
		// foreach($languages as $code => $language)
		// 	$user_form['lang']['options'][$code] = $language['name'];

		// Add role options
		// $role_tree = $this->role_model->get_tree();
		// $user_form['role_id']['options'] = array(0 => '(' . lang('none') . ')') + $this->role_model->generate_options($role_tree);

		$this->form_validation->init($user_form);
		// Set default value for update data
		if ($id > 0)
			$this->form_validation->set_default($this->user_model->get_by_id($id));
		if ($this->form_validation->run())
		{
			if ($id > 0)
			{
				$this->user_model->update($id, $this->form_validation->get_values());
				$this->template->set_flashdata('info', lang('user_updated'));
			}
			else
			{
				$this->user_model->insert($this->form_validation->get_values());
				$this->template->set_flashdata('info', lang('user_added'));

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'cv.infolokertng@gmail.com';
				$config['smtp_pass']    = 'bismillahsemogabarokah';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not

				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->from('cv.infolokertng@gmail.com', 'CV Desain');
				$this->email->to($this->input->post('email'));

				$this->email->subject('Register CV Desain');
				$this->email->message('Terimakasih anda telah mendaftar di Aplikasi Desain CV Creative.');

				$send = $this->email->send();
			}

			if (isset($this->data['redirect']))
				redirect($this->data['redirect']);
			else
				redirect('auth/user');
		}

		$this->data['form'] = $this->form_validation;
        $this->load->helper('form');
		$this->template->set_layout('clean');
		$this->template->build('auth/register', $this->data);
	}

	/**
	 * Delete a User
	 *
	 * @param integer $id
	 */
	// function delete($id)
	// {
	// 	$user = $this->user_model->get_by_id($id);
	// 	if ($user)
	// 		$this->user_model->delete($id);

	// 	redirect('auth/user');
	// }

	/**
	 * Validation callback function to check whether the username is unique
	 *
	 * @param string $value Username to check
	 * @param int $id Don't check if the username has this ID
	 * @return boolean
	 */
	function unique_username($value, $id = 0)
	{
		if ($this->user_model->is_username_unique($value, $id))
			return TRUE;
		else
		{
			$this->form_validation->set_message('unique_username', lang('already_taken'));
			return FALSE;
		}
	}

	/**
	 * Validation callback function to check whether the email is unique
	 *
	 * @param string $value Email to check
	 * @param int $id Don't check if the email has this ID
	 * @return boolean
	 */
	function unique_email($value, $id = 0)
	{
		if ($this->user_model->is_email_unique($value, $id))
			return TRUE;
		else
		{
			$this->form_validation->set_message('unique_email', lang('already_taken'));
			return FALSE;
		}
	}

}

/* End of file user.php */
/* Location: ./application/modules/auth/controllers/user.php */