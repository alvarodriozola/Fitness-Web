<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/homepage_style.css'); ?>">

    <title>Current Workout</title>
  </head>

  <body>

    <div class="wrapper">

        <!-- Navigation -->
        <nav id="sidebar">
            <div class="sidebar-header mt-4 mb-5 d-flex justify-content-center">
                <img src="<?php echo base_url('image/icon.png');?>" width="36" height="36" alt="">
                <h4 class="ml-2 my-auto">Fitness Web</h4>
            </div>

            <div class="profile  d-flex justify-content-center">
                <div class="align-self-center">
                    <p id='profile-name' class="mb-0"><?php echo $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang')?></p>
                </div>
            </div>
            <div class="ml-4 mt-5 navBtn">
                <ul class="list-unstyled components">
                    <li>
                        <a href="<?php echo site_url('user_controller/home') ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user_controller/profile') ?>">Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user_controller/schedule') ?>">Schedule</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user_controller/statistic') ?>">Statistic</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('user_controller/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- Content -->
        <div class="contentContainer">
          <div class="card row mb-3 shadow-style" style="max-width: 20rem;">
            <div class="card-header text-white" style="background-color: #2CAFE9;">Workout</div>
              <div class="card-body">
              <h4 class="card-title"><?php echo $cWorkout->nama_paket ?></h4>
              <p class="card-text"><?php echo $cWorkout->deskripsi_paket ?></p>
              </div>
            </div>
            <br>

            <legend>Instruction</legend>
            <form method="post">
              <?php if($this->session->flashdata('exercise_start') != ''){
                echo '<div class="alert alert-success">'.$this->session->flashdata('exercise_start').'</div>';
              }else{
                echo '<button type="submit" class="btn btn-primary btn-style mb-3" value="startworkout" name="startworkout">Start Exercise</button>';
              } ?>
            </form>
            <ul class="list-group row shadow-style">
              <?php foreach($cInstruksi->result() as $row){
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                  '.$row->nama_instruksi.'
                <span class="badge badge-primary badge-pill btn-stylenohv" style="height:30px; width:100px; line-height: 27px;">'.$row->lama_instruksi.' s</span>
              </li>';
              echo '<li class="list-group-item list-group-item-action disabled">'.$row->deskripsi_instruksi.'</li>';
            }?>
            </ul>
          <br>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
