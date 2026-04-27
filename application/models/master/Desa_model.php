<?php

class desa_model extends MY_Model {

    protected $table = 'master_desa';
    protected $table_relation = 'master_url';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".Kd_Desa, ";
    $select .= $this->table.".Nama_Desa, ";
    $select .= $this->table.".id, ";
    $select .= $this->table.".Kd_Kec, ";
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
      $idString = (int)$id;
      $this->db->update($this->table, array('visible' => 0), array('id' => $idString));
      $id = $this->db->insert_id();
      $updated = $this->db->get_where($this->table, array('id' =>  $idString))->row();

      return $updated;
    }

    

    public function get_by_id($id){
      $this->db->select('*');
      $this->db->where($this->table.'.id',$id);
      $this->db->join('master_kecamatan','master_kecamatan.Kd_Kec = master_desa.Kd_Kec');
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
