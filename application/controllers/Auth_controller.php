<?php
class Auth_controller extends CI_Controller
{
  public function __construct(){
		parent::__construct();
    if($this->session->userdata('user_logged')){
      redirect('/user_controller/home');
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
        $result = $this->Auth_model->check_login("user",$where);

        //jika user ada di database
        if($result->num_rows() == 1){
          foreach ($result->result() as $login)
          {
             $sess_data['id'] = $login->id_user; //tambah menu ini
             $sess_data['email'] = $login->email;
             $sess_data['nama_depan'] = $login->nama_depan;
             $sess_data['nama_belakang'] = $login->nama_belakang;
             $sess_data['user_logged'] = true;

             $this->session->set_userdata($sess_data);
          }
          $this->session->set_flashdata("success_login", "Login Success");
          redirect('/user_controller/home','refresh'); //redirect ke page dashboard
        }else{
           //redirect ke page login
           $this->session->set_flashdata("failed_login", "Wrong email or password");
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
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
      $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
      $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
      $this->form_validation->set_rules('repassword', 'Re-enter Password', 'trim|required|min_length[5]|matches[password]');
      if($this->form_validation->run() == TRUE){
        //add ke database
        $data = array(
          'email'=>$_POST['email'],
          'nama_depan'=>$_POST['fname'],
          'nama_belakang'=>$_POST['lname'],
          'password'=>md5($_POST['password'])
        );
        //insert data ke tabel users lewat model
        $this->Auth_model->register($data);

        $this->session->set_flashdata("success_register", "Your account has been registered. You can login now");
        redirect('/auth_controller/login','refresh'); //redirect ke page login
      }
    }
    //load view page register
    $this->load->view('register');
  }
}
 ?>
