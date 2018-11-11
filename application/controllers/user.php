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
  public function home(){
    $this->load->view('home');
  }
  public function statistic()
  {
    $this->load->view('statistic');
  }
  public function schedule()
  {
    $this->load->view('schedule');
  }
  public function logout(){
    //untuk redirect
    $this->load->helper('url');
    $this->session->unset_userdata('user_logged');
    $this->session->sess_destroy();
    redirect('/auth/login','refresh'); //redirect ke page login
  }
}
 ?>
