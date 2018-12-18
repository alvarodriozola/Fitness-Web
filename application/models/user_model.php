<?php
class user_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
  }
  public function getPaketOlahraga(){
    $query = $this->db->get('paket_olahraga');
    if($query->num_rows() > 0){
      return $query->result();
    }
  }
  public function getPaketOlahragaDetail($id){
    $query = $this->db->get_where('paket_olahraga', array('kode_paket'=>$id));
    if($query->num_rows() > 0){
      return $query->row();
    }
  }
  public function getInstruksiDetail($id){
    $this->db->select('*');
    $this->db->from('instruksi');
    $this->db->join('list_instruksi', 'instruksi.kode_instruksi = list_instruksi.kode_instruksi');
    $this->db->where('list_instruksi.kode_paket', $id);
    return $this->db->get();
  }
  public function getTambahPaketOlahraga($data){
    return $this->db->insert('mengambil', $data);
  }

  //current Workout
  public function getCurrentPaketOlahraga($id_user){
    $query = $this->db->select('*')
    ->from('paket_olahraga')
    ->join('mengambil', 'paket_olahraga.kode_paket = mengambil.kode_paket')
    ->where('mengambil.id_user', $id_user)
    ->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }
  public function getCurrentPaketOlahragaDetail($id_user){
    $query = $this->db->select('*')
    ->from('paket_olahraga')
    ->join('mengambil', 'paket_olahraga.kode_paket = mengambil.kode_paket')
    ->where('mengambil.kode_paket', $id_user)
    ->get();
    if($query->num_rows() > 0){
      return $query->row();
    }
  }
  public function getStartCurrentWorkout($data){
    return $this->db->insert('melakukan', $data);
  }
  public function getExerciseHistory($id_user){
    $query=$this->db->select('*')
    ->from('melakukan')
    ->join('paket_olahraga', 'melakukan.kode_paket = paket_olahraga.kode_paket')
    ->where('melakukan.id_user', $id_user)
    ->order_by('id_melakukan', 'desc')
    ->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }

  //Profile
  public function getDataDiri($id){
    $query  =$this->db->select('*')
        ->from('data_diri')
        ->where('id_user', $id)
        ->get();
    if($query->num_rows() > 0){
      foreach ($query->result() as $data_diri)
      {
        $datadiri['id_datadiri'] = $data_diri->id_datadiri;
        $datadiri['berat_badan'] = $data_diri->berat_badan;
        $datadiri['tinggi_badan'] = $data_diri->tinggi_badan;
      }
      $this->session->set_userdata($datadiri);
      return $query->result();
    }else{
      return redirect('/user_controller/newDataDiri','refresh');
    }
  }

  public function getInsertDataDiri($data){
    return $this->db->insert('data_diri', $data);
  }

  public function getUpdateDataDiri($data, $id_datadiri){
    $this->session->set_userdata('berat_badan', $data['berat_badan']);
    $this->session->set_userdata('tinggi_badan', $data['tinggi_badan']);
    $this->db->set('umur', $data['umur']);
    $this->db->set('jenis_kelamin', $data['jenis_kelamin']);
    $this->db->set('berat_badan', $data['berat_badan']);
    $this->db->set('tinggi_badan', $data['tinggi_badan']);
    $this->db->where('id_datadiri', $id_datadiri);
    $this->db->update('data_diri');
    return $this->db->get('data_diri');
  }

  //Schedule
  public function getSchedule($id){
    $query  =$this->db->select('*')
    ->from('mengambil')
    ->join('paket_olahraga', 'mengambil.kode_paket = paket_olahraga.kode_paket')
    ->where('mengambil.id_user', $id)
    ->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }
  public function getSetSchedule($data, $id_user, $where){
    $this->db->set('start', $data['tgl_mulai']);
    $this->db->set('end', $data['tgl_selesai']);
    $this->db->where('id_user', $id_user);
    $this->db->where('kode_paket', $where);
    $this->db->update('mengambil');
    return $this->db->get('mengambil');
  }

  public function get_events($start, $end)
  {
    $id_user = $this->session->userdata('id');
    return $this->db->select('*')
    ->from('mengambil')
    ->join('paket_olahraga', 'mengambil.kode_paket = paket_olahraga.kode_paket')
    ->where("start >=", $start)
    ->where("end <=", $end)
    ->where("id_user",$id_user)
    ->get();
  }

}
 ?>
