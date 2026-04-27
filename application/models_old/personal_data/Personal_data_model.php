<?php

class personal_data_model extends MY_Model {

    protected $table = 'personal_data';
    // protected $role_table = 'acl_roles';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".id_personal_data, ";
    $select .= $this->table.".no_kk, ";
    $select .= $this->table.".nik, ";
    $select .= $this->table.".npwp, ";
    $select .= $this->table.".nama_lengkap, ";
    $select .= $this->table.".no_telp, ";
    $select .= $this->table.".agama, ";
    $select .= $this->table.".pekerjaan, ";
    $select .= $this->table.".tempat_lahir, ";
    $select .= $this->table.".tanggal_lahir, ";
    $select .= $this->table.".pendidikan, ";
    $select .= $this->table.".status_kawin, ";
    $select .= $this->table.".gol_darah, ";
    $select .= $this->table.".jenis_kelamin, ";
    $select .= $this->table.".prov_nama, ";
    $select .= $this->table.".kab_nama, ";
    $select .= $this->table.".kec_nama, ";
    $select .= $this->table.".kel_nama, ";
    $select .= $this->table.".no_prov, ";
    $select .= $this->table.".no_kab, ";
    $select .= $this->table.".no_kec, ";
    $select .= $this->table.".no_kel, ";
    $select .= $this->table.".no_rw, ";
    $select .= $this->table.".no_rt, ";
    $select .= $this->table.".alamat, ";
    $select .= $this->table.".created_date, ";
    $select .= $this->table.".created_at, ";
    $select .= $this->table.".visible, ";
    return $select;
}

  function datatables()
  {
    $this->datatables->select($this->_get_select());
    $this->datatables->from($this->table);
    $this->datatables->where($this->table.'.visible',1);
    return $this->datatables->generate();
  }

  public function validNik($nik){
      $this->db->select($this->_get_select());
      $this->db->from($this->table);
      $this->db->where($this->table.'.nik',$nik);
      return $this->db->get()->row();;
  }

    public function add($data)
    {
      $this->db->insert($this->table, $data);
      $inserted = $this->db->get_where($this->table, array('nik' => $data['nik']))->row();

      return $inserted;
    }

    public function delete($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('visible' => 0), array('id_personal_data' => $idString));
      $id = $this->db->insert_id();
      $updated = $this->db->get_where($this->table, array('id_personal_data' =>  $idString))->row();
      return $updated;
    }

    public function get_by_id($id){
      $this->db->select('*');
      $this->db->where($this->table.'.id_personal_data',$id);
      $query = $this->db->get($this->table)->row();

      return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id_personal_data' => $id));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('id_personal_data' => $id))->row();
        return $updated;

    }

    

}
