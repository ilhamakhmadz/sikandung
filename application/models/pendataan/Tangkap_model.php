<?php

class Tangkap_model extends MY_Model {

    protected $table = 'tangkap';
    protected $table_identitas = 'tangkap_identitas';
    protected $table_ket_umum = 'tangkap_ket_umum';
    protected $table_biaya_produksi = 'tangkap_biaya_produksi';
    protected $table_nilai_produksi = 'tangkap_nilai_produksi';
    protected $table_bahan_lain = 'tangkap_bahan_lain';
    protected $table_perijinan = 'tangkap_perijinan';

    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".tangkap_id, ";
    $select .= $this->table.".tahun, ";
    $select .= $this->table.".tanggal_kuesioner, ";
    $select .= $this->table.".nama_responden, ";
    $select .= $this->table.".petugas_enumerator, ";
    $select .= $this->table.".user_id, ";
    $select .= $this->table.".submit, ";
    $select .= $this->table.".visible, ";
    $select .= $this->table_identitas.".nama_kelompok, ";
    $select .= $this->table_identitas.".alamat_jalan, ";
    $select .= $this->table_identitas.".nik, ";
    return $select;
  }

    // MENAMPILKAN DATA
    function datatables()
    {
      $this->datatables->select($this->_get_select());
      $this->datatables->from($this->table);
      $this->datatables->join('tangkap_identitas', "tangkap_identitas.tangkap_id = tangkap.tangkap_id");
      $this->datatables->where($this->table.'.visible',1);
      if($this->session->userdata('role_id') == 5 || $this->session->userdata('role_id') == 9):
        $this->datatables->where($this->table.'.user_id',$this->session->userdata('id'));
      endif;
      if($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 10){
        $this->db->order_by("tangkap.submit","asc");
      }else{
        $this->db->order_by("tangkap.tanggal_kuesioner","desc");
      }
      return $this->datatables->generate();
    }

    // FUNGSI UNTUK MENAMBAKAN DATA

    public function add($data)
    {
      $this->db->insert($this->table,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    
    public function add_identitas($data)
    {
      $this->db->insert($this->table_identitas,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }
    
    public function add_ket_umum($data)
    {
      $this->db->insert($this->table_ket_umum,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_biaya_produksi($data)
    {
      $this->db->insert($this->table_biaya_produksi,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_bahan_lain($data)
    {
      $this->db->insert($this->table_bahan_lain,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_nilai_produksi($data)
    {
      $this->db->insert($this->table_nilai_produksi,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function add_perijinan($data)
    {
      $this->db->insert($this->table_perijinan,$data);
      $inserted = $this->db->insert_id();
      return $inserted;
    }

    public function delete($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('visible' => 0), array('tangkap_id' => $idString));
      $this->db->update($this->table_identitas, array('visible' => 0), array('tangkap_id' => $idString));
      $updated = $this->db->get_where($this->table, array('tangkap_id' =>  $idString))->row();
      return $updated;
    }

    public function submit($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Publish'), array('tangkap_id' => $idString));
      $updated = $this->db->get_where($this->table, array('tangkap_id' =>  $idString))->row();
      return $updated;
    }

    public function draft($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Draft'), array('tangkap_id' => $idString));
      $updated = $this->db->get_where($this->table, array('tangkap_id' =>  $idString))->row();
      return $updated;
    }


    // FUNGSI UNTUK MENAMPILKAN DATA BY ID
  function get_by_id($id_tangkap)
    {
      $this->db->select("*");
      $this->db->from($this->table);
      $this->db->where($this->table.".tangkap_id",$id_tangkap);
      return $this->db->get()->row();
    }
    
    function get_by_limit($limit)
    {
      $this->db->select("*");
      $this->db->from($this->table);
      $this->db->where('visible',1);
      $this->db->order_by('tanggal_kuesioner','desc');
      $this->db->limit($limit);
      return $this->db->get()->result();
    }
    
    function get_by_ket_id($id_tangkap)
    {
      $this->db->select("*");
      $this->db->from($this->table_ket_umum);
      $this->db->where($this->table_ket_umum.".tangkap_id",$id_tangkap);
      return $this->db->get()->row();
    }
    
    public function get_by_biaya_id($id){
      $this->db->select('*');
      $this->db->where($this->table_biaya_produksi.'.tangkap_id',$id);
      $this->db->join('tangkap_biaya_produksi_uraian',$this->table_biaya_produksi.'.tangkap_biaya_produksi_uraian_id = tangkap_biaya_produksi_uraian.tangkap_biaya_produksi_uraian_id');
      $this->db->join('tangkap_jenis',$this->table_biaya_produksi.'.tangkap_jenis_id = tangkap_jenis.tangkap_jenis_id');
      $this->db->join('tangkap_kategori','tangkap_jenis.tangkap_kategori_id = tangkap_kategori.tangkap_kategori_id');
      $query = $this->db->get($this->table_biaya_produksi)->result();

      return $query;
    }
    public function get_by_biaya($id){
      $this->db->select('*');
      $this->db->where($this->table_biaya_produksi.'.tangkap_biaya_produksi_id',$id);
      $this->db->join('tangkap_biaya_produksi_uraian',$this->table_biaya_produksi.'.tangkap_biaya_produksi_uraian_id = tangkap_biaya_produksi_uraian.tangkap_biaya_produksi_uraian_id');
      $this->db->join('tangkap_jenis',$this->table_biaya_produksi.'.tangkap_jenis_id = tangkap_jenis.tangkap_jenis_id');
      $this->db->join('tangkap_kategori','tangkap_jenis.tangkap_kategori_id = tangkap_kategori.tangkap_kategori_id');
      $query = $this->db->get($this->table_biaya_produksi)->row();

      return $query;
    }

    public function get_by_bahan_lain_id($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.tangkap_id',$id);
      $this->db->join('tangkap_bahan_lain_uraian',$this->table_bahan_lain.'.tangkap_bahan_lain_uraian_id = tangkap_bahan_lain_uraian.tangkap_bahan_lain_uraian_id');
      $query = $this->db->get($this->table_bahan_lain)->result();

      return $query;
    }

    public function get_by_bahan($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.tangkap_bahan_lain_id',$id);
      $this->db->join('tangkap_bahan_lain_uraian',$this->table_bahan_lain.'.tangkap_bahan_lain_uraian_id = tangkap_bahan_lain_uraian.tangkap_bahan_lain_uraian_id');
      $query = $this->db->get($this->table_bahan_lain)->row();

      return $query;
    }

    public function get_by_nilai_produksi_id($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.tangkap_id',$id);
      $this->db->join('tangkap_nilai_produksi_uraian',$this->table_nilai_produksi.'.tangkap_nilai_produksi_uraian_id = tangkap_nilai_produksi_uraian.tangkap_nilai_produksi_uraian_id');
      $this->db->join('tangkap_jenis',$this->table_nilai_produksi.'.tangkap_jenis_id = tangkap_jenis.tangkap_jenis_id');
      $this->db->join('tangkap_kategori','tangkap_jenis.tangkap_kategori_id = tangkap_kategori.tangkap_kategori_id');
      $query = $this->db->get($this->table_nilai_produksi)->result();

      return $query;
    }

    public function get_by_nilai($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.tangkap_nilai_produksi_id',$id);
      $this->db->join('tangkap_nilai_produksi_uraian',$this->table_nilai_produksi.'.tangkap_nilai_produksi_uraian_id = tangkap_nilai_produksi_uraian.tangkap_nilai_produksi_uraian_id');
      $this->db->join('tangkap_jenis',$this->table_nilai_produksi.'.tangkap_jenis_id = tangkap_jenis.tangkap_jenis_id');
      $this->db->join('tangkap_kategori','tangkap_jenis.tangkap_kategori_id = tangkap_kategori.tangkap_kategori_id');
      $query = $this->db->get($this->table_nilai_produksi)->row();

      return $query;
    }

    public function get_by_perijinan_id($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.tangkap_id',$id);
      $this->db->join('tangkap_perijinan_uraian',$this->table_perijinan.'.tangkap_perijinan_uraian_id = tangkap_perijinan_uraian.tangkap_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".tangkap_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->result();

      return $query;
    }

    public function get_by_perijinan($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.tangkap_perijinan_id',$id);
      $this->db->join('tangkap_perijinan_uraian',$this->table_perijinan.'.tangkap_perijinan_uraian_id = tangkap_perijinan_uraian.tangkap_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".tangkap_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->row();

      return $query;
    }
    // FUNGSI UNTUK EDIT DATA
    public function edit_kuesioner($id, $data){

        $this->db->update($this->table, $data, array('tangkap_id' => $id));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('tangkap_id' => $id))->row();

        return $updated;
    }

    public function edit_identitas($id, $data){

      $this->db->update($this->table_identitas, $data, array('tangkap_id' => $id));
      $id = $this->db->insert_id();
      $updated = $this->db->get_where($this->table_identitas, array('tangkap_id' => $id))->row();

      return $updated;
  }

  public function edit_ket_umum($id, $data){

    $this->db->update($this->table_ket_umum, $data, array('tangkap_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table, array('tangkap_id' => $id))->row();

    return $updated;
  }
  public function edit_biaya_produksi($id, $data){

    $this->db->update($this->table_biaya_produksi, $data, array('tangkap_biaya_produksi_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_biaya_produksi, array('tangkap_biaya_produksi_id' => $id))->row();

    return $updated;
  }

  public function edit_bahan_lain($id, $data){

    $this->db->update($this->table_bahan_lain, $data, array('tangkap_bahan_lain_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_bahan_lain, array('tangkap_bahan_lain_id' => $id))->row();

    return $updated;
  }

  public function edit_nilai_produksi($id, $data){

    $this->db->update($this->table_nilai_produksi, $data, array('tangkap_nilai_produksi_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_nilai_produksi, array('tangkap_nilai_produksi_id' => $id))->row();

    return $updated;
  }
  public function edit_perijinan($id, $data){

    $this->db->update($this->table_perijinan, $data, array('tangkap_perijinan_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_perijinan, array('tangkap_perijinan_id' => $id))->row();

    return $updated;
  }
  // FUNGSI UNTUK HAPUS DATA
    public function delete_biaya_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('tangkap_biaya_produksi_id', $idString);
      $updated = $this->db->delete($this->table_biaya_produksi);
      
      return $updated;
    }

    public function delete_bahan_lain($id)
    {
      $idString = (int)$id;
      $this->db->where('tangkap_bahan_lain_id', $idString);
      $updated = $this->db->delete($this->table_bahan_lain);
      
      return $updated;
    }

    public function delete_nilai_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('tangkap_nilai_produksi_id', $idString);
      $updated = $this->db->delete($this->table_nilai_produksi);
      
      return $updated;
    }

    public function delete_perijinan($id)
    {
      $idString = (int)$id;
      $this->db->where('tangkap_perijinan_id', $idString);
      $updated = $this->db->delete($this->table_perijinan);
      
      return $updated;
    }

    public function get_list_tahun()
    {
        $this->db->distinct();
        $this->db->select('tahun');
        $this->db->from($this->table);
        $this->db->where('visible', 1);
        $this->db->where('tahun IS NOT NULL');
        $this->db->where('tahun >', 2000);
        $this->db->order_by('tahun', 'DESC');
        $results = $this->db->get()->result();

        $years = [];
        foreach ($results as $r) {
            if (!empty($r->tahun) && !in_array((int)$r->tahun, $years)) {
                $years[] = (int)$r->tahun;
            }
        }
        $currentYear = (int)date('Y');
        if (!in_array($currentYear, $years)) {
            array_unshift($years, $currentYear);
        }
        rsort($years);
        return $years;
    }

    public function get_export_data($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            t.tangkap_id,
            t.tahun,
            t.tanggal_kuesioner,
            t.nama_responden,
            t.petugas_enumerator,
            t.submit,
            ti.nik,
            ti.nama,
            ti.nama_kelompok,
            ti.jabatan,
            ti.alamat_jalan,
            ti.telepon,
            mk.Nama_Kecamatan,
            md.Nama_Desa,
            tk.tangkap_jenis_perairan,
            tk.luas_pu_m2,
            tk.pengelola_pu,
            tk.jumlah_trip_penangkapan_sebulan
        ');
        $this->db->from('tangkap t');
        $this->db->join('tangkap_identitas ti', 'ti.tangkap_id = t.tangkap_id', 'left');
        $this->db->join('tangkap_ket_umum tk', 'tk.tangkap_id = t.tangkap_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = ti.kd_desa AND md.Kd_Kec = ti.kd_kec', 'left');
        $this->db->where('t.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('t.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('t.tahun', $tahunInt);
            $this->db->or_where('YEAR(t.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('t.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_biaya_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            t.tangkap_id, t.tahun, t.tanggal_kuesioner, ti.nik, ti.nama, ti.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            tbu.tangkap_biaya_produksi_uraian_ket as uraian,
            tj.tangkap_jenis_nama as jenis,
            tk.tangkap_kategori_nama as kategori,
            bp.tangkap_biaya_produksi_volume as volume,
            bp.tangkap_biaya_produksi_harga as harga,
            bp.tangkap_biaya_produksi_nilai as nilai
        ');
        $this->db->from('tangkap_biaya_produksi bp');
        $this->db->join('tangkap t', 't.tangkap_id = bp.tangkap_id');
        $this->db->join('tangkap_identitas ti', 'ti.tangkap_id = t.tangkap_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = ti.kd_desa AND md.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('tangkap_biaya_produksi_uraian tbu', 'tbu.tangkap_biaya_produksi_uraian_id = bp.tangkap_biaya_produksi_uraian_id', 'left');
        $this->db->join('tangkap_jenis tj', 'tj.tangkap_jenis_id = bp.tangkap_jenis_id', 'left');
        $this->db->join('tangkap_kategori tk', 'tk.tangkap_kategori_id = tj.tangkap_kategori_id', 'left');
        $this->db->where('t.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('t.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('t.tahun', $tahunInt);
            $this->db->or_where('YEAR(t.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('t.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_nilai_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            t.tangkap_id, t.tahun, t.tanggal_kuesioner, ti.nik, ti.nama, ti.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            tnu.tangkap_nilai_produksi_uraian_ket as uraian,
            tj.tangkap_jenis_nama as jenis,
            tk.tangkap_kategori_nama as kategori,
            np.tangkap_nilai_produksi_volume as volume,
            np.tangkap_nilai_produksi_harga as harga,
            np.tangkap_nilai_produksi_nilai as nilai
        ');
        $this->db->from('tangkap_nilai_produksi np');
        $this->db->join('tangkap t', 't.tangkap_id = np.tangkap_id');
        $this->db->join('tangkap_identitas ti', 'ti.tangkap_id = t.tangkap_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = ti.kd_desa AND md.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('tangkap_nilai_produksi_uraian tnu', 'tnu.tangkap_nilai_produksi_uraian_id = np.tangkap_nilai_produksi_uraian_id', 'left');
        $this->db->join('tangkap_jenis tj', 'tj.tangkap_jenis_id = np.tangkap_jenis_id', 'left');
        $this->db->join('tangkap_kategori tk', 'tk.tangkap_kategori_id = tj.tangkap_kategori_id', 'left');
        $this->db->where('t.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('t.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('t.tahun', $tahunInt);
            $this->db->or_where('YEAR(t.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('t.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_perijinan($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            t.tangkap_id, t.tahun, t.tanggal_kuesioner, ti.nik, ti.nama, ti.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            tpu.tangkap_perijinan_uraian_ket as jenis_perijinan,
            p.tangkap_perijinan_no as no_perijinan,
            p.tangkap_perijinan_tgl as tgl_perijinan
        ');
        $this->db->from('tangkap_perijinan p');
        $this->db->join('tangkap t', 't.tangkap_id = p.tangkap_id');
        $this->db->join('tangkap_identitas ti', 'ti.tangkap_id = t.tangkap_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = ti.kd_desa AND md.Kd_Kec = ti.kd_kec', 'left');
        $this->db->join('tangkap_perijinan_uraian tpu', 'tpu.tangkap_perijinan_uraian_id = p.tangkap_perijinan_uraian_id', 'left');
        $this->db->where('t.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('t.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('t.tahun', $tahunInt);
            $this->db->or_where('YEAR(t.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('t.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }
}
