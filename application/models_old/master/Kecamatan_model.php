<?php

class kecamatan_model extends MY_Model {

    protected $table = 'master_kecamatan';
    // protected $role_table = 'acl_roles';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".Kd_Kec, ";
    $select .= $this->table.".id, ";
    $select .= $this->table.".Nama_Kecamatan, ";
    return $select;
}

  function datatables()
  {
    $this->datatables->select($this->_get_select());
    $this->datatables->from($this->table);
    $this->datatables->where($this->table.'.visible',1);
    return $this->datatables->generate();
  }


    public function add($data)
    {
      $this->db->insert($this->table, $data);
      $inserted = $this->db->get_where($this->table, array('Kd_Kec' => $data['Kd_Kec']))->row();

      return $inserted;
    }

    public function delete($id)
    {
      $this->db->update($this->table, array('visible' => 0), array('id' => $id));
      $updated = $this->db->get_where($this->table, array('id' =>  $id))->row();

      return $updated;
    }

    public function get_by_id($id){
      $this->db->select('*');
      $this->db->where($this->table.'.id',$id);
      $query = $this->db->get($this->table)->row();

      return $query;
    }

    public function edit($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));

        $updated = $this->db->get_where($this->table, array('id' => $id))->row();

        return $updated;

    }

    

}
