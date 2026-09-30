<?php

class Budidaya_model extends MY_Model {

    protected $table = 'budidaya';
    protected $table_identitas = 'budidaya_identitas';
    protected $table_ket_umum = 'budidaya_ket_umum';
    protected $table_biaya_produksi = 'budidaya_biaya_produksi';
    protected $table_nilai_produksi = 'budidaya_nilai_produksi';
    protected $table_bahan_lain = 'budidaya_bahan_lain';
    protected $table_perijinan = 'budidaya_perijinan';
    private $ci;

  function __construct()
  {
    parent::__construct();
  }

  private function _get_select(){
    $select = $this->table.".budidaya_id, ";
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
      $this->datatables->join('budidaya_identitas', "budidaya_identitas.budidaya_id = budidaya.budidaya_id");
      $this->datatables->where($this->table.'.visible',1);
      if($this->session->userdata('role_id') == 5 || $this->session->userdata('role_id') == 9):
        $this->datatables->where($this->table.'.user_id',$this->session->userdata('id'));
      endif;
      if($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 4 || $this->session->userdata('role_id') == 10){
        $this->db->order_by("budidaya.submit","asc");
      }else{
        $this->db->order_by("budidaya.tanggal_kuesioner","desc");
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
      $this->db->update($this->table, array('visible' => 0), array('budidaya_id' => $idString));
      $this->db->update($this->table_identitas, array('visible' => 0), array('budidaya_id' => $idString));
      $updated = $this->db->get_where($this->table, array('budidaya_id' =>  $idString))->row();
      return $updated;
    }

    public function submit($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Publish'), array('budidaya_id' => $idString));
      $updated = $this->db->get_where($this->table, array('budidaya_id' =>  $idString))->row();
      return $updated;
    }

    public function draft($id)
    {
      $idString = (int)$id;
      $this->db->update($this->table, array('submit' => 'Draft'), array('budidaya_id' => $idString));
      $updated = $this->db->get_where($this->table, array('budidaya_id' =>  $idString))->row();
      return $updated;
    }


    // FUNGSI UNTUK MENAMPILKAN DATA BY ID
  function get_by_id($id_budidaya)
    {
      $this->db->select("*");
      $this->db->from($this->table);
      $this->db->where($this->table.".budidaya_id",$id_budidaya);
      return $this->db->get()->row();
    }

    function get_by_ket_id($id_budidaya)
    {
      $this->db->select("*");
      $this->db->from($this->table_ket_umum);
      $this->db->where($this->table_ket_umum.".budidaya_id",$id_budidaya);
      $this->db->order_by($this->table_ket_umum.".budidaya_ket_umum_id",'desc');
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
    
    public function get_by_biaya_id($id){
      $this->db->select('*');
      $this->db->where($this->table_biaya_produksi.'.budidaya_id',$id);
      $this->db->join('budidaya_biaya_produksi_uraian',$this->table_biaya_produksi.'.budidaya_biaya_produksi_uraian_id = budidaya_biaya_produksi_uraian.budidaya_biaya_produksi_uraian_id');
      $this->db->join('budidaya_jenis',$this->table_biaya_produksi.'.budidaya_jenis_id = budidaya_jenis.budidaya_jenis_id');
      $this->db->join('budidaya_kategori','budidaya_jenis.budidaya_kategori_id = budidaya_kategori.budidaya_kategori_id');
      $this->db->order_by($this->table_biaya_produksi.".budidaya_biaya_produksi_uraian_id",'desc');
      $query = $this->db->get($this->table_biaya_produksi)->result();

      return $query;
    }
    public function get_by_biaya($id){
      $this->db->select('*');
      $this->db->where($this->table_biaya_produksi.'.budidaya_biaya_produksi_id',$id);
      $this->db->join('budidaya_biaya_produksi_uraian',$this->table_biaya_produksi.'.budidaya_biaya_produksi_uraian_id = budidaya_biaya_produksi_uraian.budidaya_biaya_produksi_uraian_id');
      $this->db->join('budidaya_jenis',$this->table_biaya_produksi.'.budidaya_jenis_id = budidaya_jenis.budidaya_jenis_id');
      $this->db->join('budidaya_kategori','budidaya_jenis.budidaya_kategori_id = budidaya_kategori.budidaya_kategori_id');
      $this->db->order_by($this->table_biaya_produksi.".budidaya_biaya_produksi_uraian_id",'desc');
      $query = $this->db->get($this->table_biaya_produksi)->row();

      return $query;
    }

    public function get_by_bahan_lain_id($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.budidaya_id',$id);
      $this->db->join('budidaya_bahan_lain_uraian',$this->table_bahan_lain.'.budidaya_bahan_lain_uraian_id = budidaya_bahan_lain_uraian.budidaya_bahan_lain_uraian_id');
      $this->db->order_by($this->table_bahan_lain.".budidaya_bahan_lain_uraian_id",'desc');
      $query = $this->db->get($this->table_bahan_lain)->result();

      return $query;
    }

    public function get_by_bahan($id){
      $this->db->select('*');
      $this->db->where($this->table_bahan_lain.'.budidaya_bahan_lain_id',$id);
      $this->db->join('budidaya_bahan_lain_uraian',$this->table_bahan_lain.'.budidaya_bahan_lain_uraian_id = budidaya_bahan_lain_uraian.budidaya_bahan_lain_uraian_id');
      $this->db->order_by($this->table_bahan_lain.".budidaya_bahan_lain_uraian_id",'desc');
      $query = $this->db->get($this->table_bahan_lain)->row();

      return $query;
    }

    public function get_by_nilai_produksi_id($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.budidaya_id',$id);
      $this->db->join('budidaya_nilai_produksi_uraian',$this->table_nilai_produksi.'.budidaya_nilai_produksi_uraian_id = budidaya_nilai_produksi_uraian.budidaya_nilai_produksi_uraian_id');
      $this->db->join('budidaya_jenis',$this->table_nilai_produksi.'.budidaya_jenis_id = budidaya_jenis.budidaya_jenis_id');
      $this->db->join('budidaya_kategori','budidaya_jenis.budidaya_kategori_id = budidaya_kategori.budidaya_kategori_id');
      $this->db->order_by($this->table_nilai_produksi.".budidaya_nilai_produksi_uraian_id",'desc');

      $query = $this->db->get($this->table_nilai_produksi)->result();

      return $query;
    }
    

    public function get_by_nilai($id){
      $this->db->select('*');
      $this->db->where($this->table_nilai_produksi.'.budidaya_nilai_produksi_id',$id);
      $this->db->join('budidaya_nilai_produksi_uraian',$this->table_nilai_produksi.'.budidaya_nilai_produksi_uraian_id = budidaya_nilai_produksi_uraian.budidaya_nilai_produksi_uraian_id');
      $this->db->join('budidaya_jenis',$this->table_nilai_produksi.'.budidaya_jenis_id = budidaya_jenis.budidaya_jenis_id');
      $this->db->join('budidaya_kategori','budidaya_jenis.budidaya_kategori_id = budidaya_kategori.budidaya_kategori_id');
      $this->db->order_by($this->table_nilai_produksi.".budidaya_nilai_produksi_uraian_id",'desc');

      $query = $this->db->get($this->table_nilai_produksi)->row();

      return $query;
    }

    public function get_by_perijinan_id($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.budidaya_id',$id);
      $this->db->join('budidaya_perijinan_uraian',$this->table_perijinan.'.budidaya_perijinan_uraian_id = budidaya_perijinan_uraian.budidaya_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".budidaya_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->result();

      return $query;
    }

    public function get_by_perijinan($id){
      $this->db->select('*');
      $this->db->where($this->table_perijinan.'.budidaya_perijinan_id',$id);
      $this->db->join('budidaya_perijinan_uraian',$this->table_perijinan.'.budidaya_perijinan_uraian_id = budidaya_perijinan_uraian.budidaya_perijinan_uraian_id');
      $this->db->order_by($this->table_perijinan.".budidaya_perijinan_uraian_id",'desc');

      $query = $this->db->get($this->table_perijinan)->row();

      return $query;
    }
    // FUNGSI UNTUK EDIT DATA
    public function edit_kuesioner($id, $data){

        $this->db->update($this->table, $data, array('budidaya_id' => $id));
        $id = $this->db->insert_id();
        $updated = $this->db->get_where($this->table, array('budidaya_id' => $id))->row();

        return $updated;
    }

    public function edit_identitas($id, $data){

      $this->db->update($this->table_identitas, $data, array('budidaya_id' => $id));
      $id = $this->db->insert_id();
      $updated = $this->db->get_where($this->table_identitas, array('budidaya_id' => $id))->row();

      return $updated;
  }

  public function edit_ket_umum($id, $data){

    $this->db->update($this->table_ket_umum, $data, array('budidaya_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table, array('budidaya_id' => $id))->row();

    return $updated;
  }
  public function edit_biaya_produksi($id, $data){

    $this->db->update($this->table_biaya_produksi, $data, array('budidaya_biaya_produksi_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_biaya_produksi, array('budidaya_biaya_produksi_id' => $id))->row();

    return $updated;
  }

  public function edit_bahan_lain($id, $data){

    $this->db->update($this->table_bahan_lain, $data, array('budidaya_bahan_lain_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_bahan_lain, array('budidaya_bahan_lain_id' => $id))->row();

    return $updated;
  }

  public function edit_nilai_produksi($id, $data){

    $this->db->update($this->table_nilai_produksi, $data, array('budidaya_nilai_produksi_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_nilai_produksi, array('budidaya_nilai_produksi_id' => $id))->row();

    return $updated;
  }

  public function edit_perijinan($id, $data){

    $this->db->update($this->table_perijinan, $data, array('budidaya_perijinan_id' => $id));
    $id = $this->db->insert_id();
    $updated = $this->db->get_where($this->table_perijinan, array('budidaya_perijinan_id' => $id))->row();

    return $updated;
  }

  // FUNGSI UNTUK HAPUS DATA
    public function delete_biaya_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('budidaya_biaya_produksi_id', $idString);
      $updated = $this->db->delete($this->table_biaya_produksi);
      
      return $updated;
    }

    public function delete_bahan_lain($id)
    {
      $idString = (int)$id;
      $this->db->where('budidaya_bahan_lain_id', $idString);
      $updated = $this->db->delete($this->table_bahan_lain);
      
      return $updated;
    }

    public function delete_nilai_produksi($id)
    {
      $idString = (int)$id;
      $this->db->where('budidaya_nilai_produksi_id', $idString);
      $updated = $this->db->delete($this->table_nilai_produksi);
      
      return $updated;
    }

    public function delete_perijinan($id)
    {
      $idString = (int)$id;
      $this->db->where('budidaya_perijinan_id', $idString);
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
            b.budidaya_id,
            b.tahun,
            b.tanggal_kuesioner,
            b.nama_responden,
            b.petugas_enumerator,
            b.submit,
            bi.nik,
            bi.nama,
            bi.nama_kelompok,
            bi.jabatan,
            bi.alamat_jalan,
            bi.telepon,
            mk.Nama_Kecamatan,
            md.Nama_Desa,
            bk.kegiatan_usaha,
            bk.jenis_perusahaan,
            bk.frekuensi_panen_setahun,
            bk.mulai_budidaya,
            bk.luas_kolam_m2,
            bk.status_kolam,
            bk.permodalan,
            bk.perijinan_usaha
        ');
        $this->db->from('budidaya b');
        $this->db->join('budidaya_identitas bi', 'bi.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('budidaya_ket_umum bk', 'bk.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = bi.kd_desa AND md.Kd_Kec = bi.kd_kec', 'left');
        $this->db->where('b.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('b.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('b.tahun', $tahunInt);
            $this->db->or_where('YEAR(b.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('b.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_nilai_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            b.budidaya_id, b.tahun, b.tanggal_kuesioner, bi.nik, bi.nama, bi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            npu.budidaya_nilai_produksi_uraian_ket as uraian,
            bj.budidaya_jenis_nama as jenis,
            bk.budidaya_kategori_nama as kategori,
            np.budidaya_nilai_produksi_volume as volume,
            np.budidaya_nilai_produksi_harga as harga,
            np.budidaya_nilai_produksi_nilai as nilai
        ');
        $this->db->from('budidaya_nilai_produksi np');
        $this->db->join('budidaya b', 'b.budidaya_id = np.budidaya_id');
        $this->db->join('budidaya_identitas bi', 'bi.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = bi.kd_desa AND md.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('budidaya_nilai_produksi_uraian npu', 'npu.budidaya_nilai_produksi_uraian_id = np.budidaya_nilai_produksi_uraian_id', 'left');
        $this->db->join('budidaya_jenis bj', 'bj.budidaya_jenis_id = np.budidaya_jenis_id', 'left');
        $this->db->join('budidaya_kategori bk', 'bk.budidaya_kategori_id = bj.budidaya_kategori_id', 'left');
        $this->db->where('b.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('b.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('b.tahun', $tahunInt);
            $this->db->or_where('YEAR(b.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('b.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_biaya_produksi($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            b.budidaya_id, b.tahun, b.tanggal_kuesioner, bi.nik, bi.nama, bi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            bpu.budidaya_biaya_produksi_uraian_ket as uraian,
            bj.budidaya_jenis_nama as jenis,
            bk.budidaya_kategori_nama as kategori,
            bp.budidaya_biaya_produksi_volume as volume,
            bp.budidaya_biaya_produksi_harga as harga,
            bp.budidaya_biaya_produksi_nilai as nilai
        ');
        $this->db->from('budidaya_biaya_produksi bp');
        $this->db->join('budidaya b', 'b.budidaya_id = bp.budidaya_id');
        $this->db->join('budidaya_identitas bi', 'bi.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = bi.kd_desa AND md.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('budidaya_biaya_produksi_uraian bpu', 'bpu.budidaya_biaya_produksi_uraian_id = bp.budidaya_biaya_produksi_uraian_id', 'left');
        $this->db->join('budidaya_jenis bj', 'bj.budidaya_jenis_id = bp.budidaya_jenis_id', 'left');
        $this->db->join('budidaya_kategori bk', 'bk.budidaya_kategori_id = bj.budidaya_kategori_id', 'left');
        $this->db->where('b.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('b.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('b.tahun', $tahunInt);
            $this->db->or_where('YEAR(b.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('b.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_bahan_lain($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            b.budidaya_id, b.tahun, b.tanggal_kuesioner, bi.nik, bi.nama, bi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            blu.budidaya_bahan_lain_uraian_ket as uraian,
            bl.budidaya_bahan_lain_volume as volume,
            bl.budidaya_bahan_lain_harga as harga,
            bl.budidaya_bahan_lain_nilai as nilai
        ');
        $this->db->from('budidaya_bahan_lain bl');
        $this->db->join('budidaya b', 'b.budidaya_id = bl.budidaya_id');
        $this->db->join('budidaya_identitas bi', 'bi.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = bi.kd_desa AND md.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('budidaya_bahan_lain_uraian blu', 'blu.budidaya_bahan_lain_uraian_id = bl.budidaya_bahan_lain_uraian_id', 'left');
        $this->db->where('b.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('b.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('b.tahun', $tahunInt);
            $this->db->or_where('YEAR(b.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('b.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }

    public function get_export_perijinan($userId = null, $roleId = null, $tahun = null)
    {
        $this->db->select('
            b.budidaya_id, b.tahun, b.tanggal_kuesioner, bi.nik, bi.nama, bi.nama_kelompok,
            mk.Nama_Kecamatan, md.Nama_Desa,
            pu.budidaya_perijinan_uraian_ket as jenis_perijinan,
            p.budidaya_perijinan_no as no_perijinan,
            p.budidaya_perijinan_tgl as tgl_perijinan
        ');
        $this->db->from('budidaya_perijinan p');
        $this->db->join('budidaya b', 'b.budidaya_id = p.budidaya_id');
        $this->db->join('budidaya_identitas bi', 'bi.budidaya_id = b.budidaya_id', 'left');
        $this->db->join('master_kecamatan mk', 'mk.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('master_desa md', 'md.Kd_Desa = bi.kd_desa AND md.Kd_Kec = bi.kd_kec', 'left');
        $this->db->join('budidaya_perijinan_uraian pu', 'pu.budidaya_perijinan_uraian_id = p.budidaya_perijinan_uraian_id', 'left');
        $this->db->where('b.visible', 1);

        if ($roleId == 5 || $roleId == 9) {
            $this->db->where('b.user_id', $userId);
        }

        if (!empty($tahun) && $tahun != '0' && $tahun != 'all') {
            $tahunInt = (int)$tahun;
            $this->db->group_start();
            $this->db->where('b.tahun', $tahunInt);
            $this->db->or_where('YEAR(b.tanggal_kuesioner)', $tahunInt);
            $this->db->group_end();
        }

        $this->db->order_by('b.tanggal_kuesioner', 'desc');
        return $this->db->get()->result();
    }
}
