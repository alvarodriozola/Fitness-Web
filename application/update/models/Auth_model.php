<?php
class Auth_model extends CI_Model
{
  public function __construct(){
    parent::__construct();
  }
  public function check_login($table, $where){
    return $this->db->get_where($table, $where);
  }
  public function register($data){
    return $this->db->insert('user', $data);
  }
}
 ?>
