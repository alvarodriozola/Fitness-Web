<?php
class user_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //mengatur authorize page user jika sudah/belum login
    if(!$this->session->userdata('user_logged')){
      echo 'belum login';
      redirect('/auth_controller/login','refresh'); //redirect ke page login
    }
  }
  public function home(){
    $this->load->model('user_model');
    $iduser = $this->session->userdata('id');
    $records = $this->user_model->getPaketOlahraga();
    $current = $this->user_model->getCurrentPaketOlahraga($iduser);
    $datadiri = $this->user_model->getDataDiri($iduser);
    $data = array(
      'records' => $records,
      'current' => $current
    );
    $this->load->view('homepage', $data);
  }
  public function paketOlahraga($id){
    $this->load->helper('url');
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');
    $pOlahraga = $this->user_model->getPaketOlahragaDetail($id);
    $instruksi = $this->user_model->getInstruksiDetail($id);
    $data = array(
      'pOlahraga' => $pOlahraga,
      'instruksi' => $instruksi
    );

    if($this->input->post('addworkout')){
        //add ke database
        $dataInsert = array(
          'id_user'=>$iduser,
          'kode_paket'=>$id
        );
        $this->user_model->getTambahPaketOlahraga($dataInsert);

        $this->session->set_flashdata("new_workout", "Workout has been added");
        redirect('/user_controller/home','refresh'); //redirect ke page login
      }
    $this->load->view('paketOlahraga.php', $data);
  }

  public function currentWorkout($id){
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');
    $cWorkout = $this->user_model->getCurrentPaketOlahragaDetail($id);
    $cInstruksi = $this->user_model->getInstruksiDetail($id);

    $data = array(
      'cWorkout' => $cWorkout,
      'cInstruksi' => $cInstruksi
    );
    if($this->input->post('startworkout')){
        $timezone = new DateTimeZone('Asia/Bangkok');
        $datetime = new DateTime();
        $datetime->setTimezone($timezone);
        $date = $datetime->format('Y\-m\-d');
        $time = $datetime->format('H:i:s');
        //add ke database
        $dataInsert = array(
          'id_user'=>$iduser,
          'kode_paket'=>$id,
          'tanggal'=>$date,
          'waktu'=>$time
        );
        $this->user_model->getStartCurrentWorkout($dataInsert);

        $this->session->set_flashdata('exercise_start', 'Lets start Exercise!');
        redirect('/user_controller/currentWorkout/'.$id,'refresh'); //redirect ke page login
      }
    $this->load->view('currentWorkout.php', $data);
  }

  public function profile(){
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');
    $datadiri = $this->user_model->getDataDiri($iduser);
    $this->load->view('profile', ['datadiri'=>$datadiri]);
  }

  public function newDataDiri(){
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');

      $this->form_validation->set_rules('umur', 'Umur', 'required');
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
      $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
      if($this->form_validation->run() == TRUE){
        //add ke database
        $dataInsert = array(
          'id_datadiri'=>null,
          'umur'=>$_POST['umur'],
          'jenis_kelamin'=>$_POST['jenis_kelamin'],
          'berat_badan'=>$_POST['berat_badan'],
          'tinggi_badan'=>$_POST['tinggi_badan'],
          'id_user'=>$iduser
        );
        $this->user_model->getInsertDataDiri($dataInsert);
        $this->session->set_flashdata('new_datadiri', "Your data has been saved");
        redirect('/user_controller/profile','refresh'); //redirect ke page login
      }
    $this->load->view('newDataDiri.php');
  }
  public function editDataDiri(){
    $iduser = $this->session->userdata('id');
    $iddatadiri = $this->session->userdata('id_datadiri');
    $this->load->model('user_model');
    $editdatadiri = $this->user_model->getDataDiri($iduser);

    if($this->input->post('editdatadiri')){
      $this->form_validation->set_rules('umur', 'Umur', 'required');
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
      $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
      if($this->form_validation->run() == TRUE){
        //add ke database
        $dataUpdate = array(
          'umur'=>$_POST['umur'],
          'jenis_kelamin'=>$_POST['jenis_kelamin'],
          'berat_badan'=>$_POST['berat_badan'],
          'tinggi_badan'=>$_POST['tinggi_badan']
        );
        $this->user_model->getUpdateDataDiri($dataUpdate, $iddatadiri);

        $this->session->set_flashdata("edit_datadiri", "Your data has been saved");
        redirect('/user_controller/profile','refresh'); //redirect ke page login
      }
    }

    $this->load->view('editDataDiri.php', ['editdatadiri'=>$editdatadiri]);
  }

  public function statistic()
  {
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');
    $historyexercise = $this->user_model->getExerciseHistory($iduser);

    $berat = $this->session->userdata('berat_badan');
    $tinggi_cm = $this->session->userdata('tinggi_badan');
    if($berat != '' && $tinggi_cm != ''){
      $tinggi_m = $tinggi_cm/100;
      $BMI = round($berat/($tinggi_m*$tinggi_m),2);
      if($BMI > 27){
        $categoryBMI = '<font color="red">Obesitas</font>';
      }else if($BMI <= 27 && $BMI >= 25){
        $categoryBMI = '<font color="orange">Overweight</font>';
      }else if($BMI <= 25 && $BMI >= 18.5){
        $categoryBMI = '<font color="green">Normal</font>';
      }else if($BMI <= 18.5 && $BMI >= 17){
        $categoryBMI = '<font color="brown">Kurus</font>';
      }else{
        $categoryBMI = '<font color="brown">Sangat Kurus</font>';
      }
    }else{
      $BMI = '-';
      $categoryBMI = '-';
    }
    $data = array(
      'historyexercise' => $historyexercise,
      'BMI' => $BMI,
      'categoryBMI' => $categoryBMI
    );
    $this->load->view('statistic.php', $data);
  }

  public function schedule()
  {
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');
    $schedule = $this->user_model->getSchedule($iduser);
    $myworkout = $this->user_model->getSchedule($iduser);
    $data = array(
      'schedule'=> $schedule,
      '$myworkout' => $myworkout
    );
    $this->load->view('schedule.php', $myworkout);
  }
  public function setSchedule(){
    $this->load->helper('url');
    $iduser = $this->session->userdata('id');
    $this->load->model('user_model');

    $scheduler = $this->user_model->getSchedule($iduser);
      $this->form_validation->set_rules('workout', 'Work Out', 'required');
      $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
      $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');
      if($this->form_validation->run() == TRUE){
        //add ke database
        $dataUpdate = array(
          'tgl_mulai'=>$_POST['tgl_mulai'],
          'tgl_selesai'=>$_POST['tgl_selesai']
        );
        $where = $_POST['workout'];
        $this->user_model->getSetSchedule($dataUpdate, $iduser, $where);
        $this->session->set_flashdata("new_schedule", "Your schedule has been saved");
        redirect('/user_controller/schedule','refresh');
    }
    $this->load->view('addschedule', ['scheduler'=>$scheduler]);
  }
  public function logout(){
    //untuk redirect
    $this->load->helper('url');
    $this->session->unset_userdata('user_logged');
    $this->session->sess_destroy();
    redirect(base_url(),'refresh'); //redirect ke page login
  }
  public function get_events()
 {
    $this->load->model('user_model');
     // Our Start and End Dates
     $start = $this->input->get("start");
     $end = $this->input->get("end");

     $startdt = new DateTime('now'); // setup a local datetime
     $startdt->setTimestamp($start); // Set the date based on timestamp
     $start_format = $startdt->format('Y-m-d');

     $enddt = new DateTime('now'); // setup a local datetime
     $enddt->setTimestamp($end); // Set the date based on timestamp
     $end_format = $enddt->format('Y-m-d');

     $events = $this->user_model->get_events($start_format, $end_format);

     $data_events = array();

     foreach($events->result() as $r) {

         $data_events[] = array(
           "title" => $r->nama_paket,
           "end" => $r->end,
            "start" => $r->start
         );
     }

     echo json_encode(array("events" => $data_events));
     exit();
 }

}
 ?>
