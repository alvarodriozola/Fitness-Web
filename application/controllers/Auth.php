<?php
class Auth extends CI_Controller
{
  public function __construct(){
		parent::__construct();
    if($this->session->userdata('user_logged')){
      redirect('/user/home'); //redirect ke page login
    }
		$this->load->model('Auth_model');
	}
  public function login()
  {
      $this->load->helper('url');

      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      if($this->form_validation->run() == TRUE){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $where = array('email'=>$email, 'password'=>$password);

        //cek data login lewat model
        $check = $this->Auth_model->check_login("users",$where)->num_rows();

        //jika user ada di database
        if($check > 0){
          echo "Berhasil Login";

          //set session sudah Login
          $this->session->set_userdata('user_logged',true);
          $this->session->set_userdata('email',$email);

          redirect('/user/home','refresh'); //redirect ke page dashboard
        }else{
          echo "Username atau password salah !";
           //redirect ke page login
           redirect('/auth/login','refresh'); //redirect ke page login
        }
      }
    $this->load->view('login');
  }

  public function register()
  {
    //untuk redirect
    $this->load->helper('url');

    //jika klik submit register
    if($this->input->post('register')){
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('names', 'Name', 'trim|required');
      $this->form_validation->set_rules('gender', 'Gender', 'required');
      $this->form_validation->set_rules('bdate', 'Birth Date', 'required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
      $this->form_validation->set_rules('password2', 'Re-enter Password', 'trim|required|min_length[5]|matches[password]');
      if($this->form_validation->run() == TRUE){
        //add ke database
        $data = array(
          'email'=>$_POST['email'],
          'name'=>$_POST['names'],
          'password'=>md5($_POST['password']),
          'gender'=>$_POST['gender'],
          'dateofbirth'=>$_POST['bdate']
        );
        //insert data ke tabel users lewat model
        $this->Auth_model->register($data);

        $this->session->set_flashdata("success", "Your account has been registered. You can login now");
        redirect('/auth/login','refresh'); //redirect ke page login
      }
    }
    //load view page register
    $this->load->view('register');
  }
}
 ?>
