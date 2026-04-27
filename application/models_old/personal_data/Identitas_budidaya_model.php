<?php

class Identitas_budidaya_model extends MY_Model {

    protected $table = 'budidaya_identitas';
    // protected $role_table = 'acl_roles';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".budidaya_identitas_id, ";
    $select .= $this->table.".budidaya_id, ";
    $select .= $this->table.".nama_kelompok, ";
    $select .= $this->table.".nama, ";
    $select .= $this->table.".nik, ";
    $select .= $this->table.".jabatan, ";
    $select .= $this->table.".umur, ";
    $select .= $this->table.".pendidikan, ";
    $select .= $this->table.".jumlah_anggota_keluarga, ";
    $select .= $this->table.".telepon, ";
    $select .= $this->table.".email, ";
    $select .= $this->table.".kd_prov, ";
    $select .= $this->table.".kd_kab, ";
    $select .= $this->table.".kd_kec, ";
    $select .= $this->table.".kd_desa, ";
    $select .= $this->table.".rw, ";
    $select .= $this->table.".rt, ";
    $select .= $this->table.".alamat_jalan, ";
    $select .= $this->table.".alamat_desa, ";
    $select .= $this->table.".alamat_kecamatan, ";
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
      $this->db->where($this->table.'.visible',1);
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
      $this->db->where($this->table.'.budidaya_id',$id);
      $this->db->join('master_kecamatan','master_kecamatan.Kd_Kec = budidaya_identitas.kd_kec', 'left');
      $this->db->join('master_desa','master_desa.Kd_Desa = budidaya_identitas.kd_desa', 'left');
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
