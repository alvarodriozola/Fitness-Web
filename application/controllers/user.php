<?php
class user extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //mengatur authorize page user jika sudah/belum login
    if(!$this->session->userdata('user_logged')){
      echo 'belum login';
      redirect('/auth/login','refresh'); //redirect ke page login
    }
  }
  public function profile()
  {
    $this->load->view('profile');
  }
}
 ?>
