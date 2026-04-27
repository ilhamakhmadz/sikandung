<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 *
 * @package App
 * @category Model
 * @author Ardi Soebrata
 */
class User_model extends MY_Model {


	
	protected $table = 'auth_users';
	protected $role_table = 'acl_roles';
	protected $kecamatan = 'master_kecamatan';
	protected $desa = 'master_desa';
        protected  $table_unit='master_unit';
        private $ci;

	function __construct()
	{
		parent::__construct();
		$this->ci = & get_instance();
		$this->ci->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));
	}

	/**
	 * Insert data to User Model
	 *
	 * @param array $data
	 * @return boolean
	 */
	public function insert($data)
	{
		$data['registered'] = date('Y-m-d H:i:s');
		return parent::insert($this->prep_data($data));
	}

	/**
	 * Update data to User Model
	 *
	 * @param int $id
	 * @param array $data
	 * @return boolean
	 */
	public function update($id, $data)
	{
            
		return parent::update($id, $this->prep_data($data));
	}

	/**
	 * Prepare input data
	 *
	 * @param array $data
	 * @return array
	 */
	private function prep_data($data)
	{
		// Remove confirm-password field
		unset($data['confirm-password']);

		// Hash password field if not empty
		if (isset($data['password']))
		{
			if (strlen(trim($data['password'])) > 0)
				$data['password'] = $this->ci->passwordhash->HashPassword($data['password']);
			else
				unset($data['password']);
		}
		return $data;
	}

	/**
	 * Compare user input password to stored hash
	 *
	 * @param string $password
	 * @param string $userpass
	 * @return boolean
	 */
	public function check_password($password, $userpass)
	{
		// check password
		return $this->ci->passwordhash->CheckPassword($password, $userpass);
	}

	/**
	 * Get user by id
	 *
	 * @param int $id
	 * @return array|boolean
	 */
	function get_by_id($id)
	{
            $this->db->select($this->table . '.id, '               
                            .$this->table . '.nip, '
                            .$this->table . '.first_name, '
                            .$this->table . '.last_name, '
                            .$this->table . '.email, '
                            .$this->table . '.username, '
                            .$this->table . '.password, '
                             .$this->table . '.lang, '
                     .$this->table . '.level_id, '
                            . $this->role_table . '.name AS role_name,'
                            . $this->role_table . '.id AS role_id,'
                            . $this->table_unit . '.kd_unit as kd_unit,'
                            . $this->table_unit . '.nm_unit as nm_unit')
                ->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left')
                ->join($this->table_unit, $this->table . '.id_unit = ' . $this->table_unit . '.kd_unit', 'left');
        return parent::get_by_id($id);
    }

	/**
	 * Get user by username
	 *
	 * @param string $username
	 * @return object user
	 */
	function get_by_username($username)
	{
		$this->db->select($this->table . '.*, ' . $this->role_table . '.name AS role_name')
				->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');
		$query = $this->db->get_where($this->table, array($this->table . '.username' => $username));
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return FALSE;
	}

	/**
	 * Check if username is available
	 *
	 * @param string $username
	 * @param int $id
	 * @return boolean
	 */
	function is_username_unique($username, $id = 0)
	{
		$this->db->where('username', $username);
		if ($id > 0)
			$this->db->where($this->id_field . ' <>', $id);
		$query = $this->db->get($this->table);
		return ($query->num_rows() == 0);
	}

	/**
	 * Check if email is available
	 *
	 * @param string $email
	 * @param int $id
	 * @return boolean
	 */
	function is_email_unique($email, $id = 0)
	{
		$this->db->where('email', $email);
		if ($id > 0)
			$this->db->where($this->id_field . ' <>', $id);
		$query = $this->db->get($this->table);
		return ($query->num_rows() == 0);
	}

	function datatable()
	{
		$this->datatables->select($this->table .'.id, first_name, last_name, username, email, name AS role, registered')
				->from($this->table)
				->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');
                
		return $this->datatables->generate();
	}


	function get_kecamatan(){
		$this->db->select('*');
		$this->db->from('master_kecamatan');
		$this->db->where('visible', '1');
		if($this->session->userdata['level_id'] == 2){
			$this->db->where('master_kecamatan.Kd_Kec',$this->session->userdata['kec_id']);
		}else if($this->session->userdata['level_id'] == 3){
			$this->db->where('master_kecamatan.Kd_Kec',$this->session->userdata['kec_id']);
		}
		$this->db->order_by('Nama_Kecamatan', 'ASC');
		$data = $this->db->get()->result();
        return $data;
	}
        
        

	function get_kecamatan_user(){
		$this->db->select('*');
		$this->db->from('master_kecamatan');
		$this->db->where('visible', '1');
		$this->db->order_by('Nama_Kecamatan', 'ASC');
		$data = $this->db->get()->result();
        return $data;
	}
        
        function get_master_unit(){
		$this->db->select('*');
		$this->db->from('master_unit');
		$this->db->where('1', '1');
		$this->db->order_by('nm_unit', 'ASC');
		$data = $this->db->get()->result();
        return $data;
	}

	function get_desa($id){
		$this->db->select('*');
		$this->db->from('master_desa');
		$this->db->where('Kd_Kec', $id);
		$this->db->where('visible', '1');

		$this->db->order_by('Nama_Desa', 'ASC');
		$data = $this->db->get()->result();
        return $data;
	}
	public function get_all_data()
	{
        // $this->db->select(')','jumlah');
		$this->db->select('count(auth_users.id) as jumlah_user');
		$this->db->from('auth_users');
		$data = $this->db->get()->row();
		return $data;
    }
    
    
    Public function  data_user(){
        $this->datatables->select('auth_users.email,
auth_users.id,
auth_users.nip,
auth_users.first_name,
auth_users.last_name,
auth_users.username,
auth_users.`password`,
auth_users.registered,
auth_users.role_id,
auth_users.level_id,
auth_users.lang,' . $this->role_table . '.name AS role_name,'
                                                . $this->role_table . '.id AS role_id,'
                                                . $this->table_unit . '.id_unit as id_unit,'
                                                . $this->table_unit . '.nm_unit as nm_unit')
                                                . $this->datatables->from($this->table)
                        ->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left')
                        ->join($this->table_unit, $this->table . '.id_unit = ' . $this->table_unit . '.id_unit', 'left');

        
         return $this->datatables->generate();
         
         
     
        
    }
}
