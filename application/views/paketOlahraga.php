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

    <title>Paket Olahraga</title>
  </head>

  <body>

    <div class="wrapper">

        <!-- Navigation -->
        <nav id="sidebar">
            <div class="sidebar-header mt-4 mb-5 d-flex justify-content-center">
                <img src="<?php echo base_url('image/icon.png');?>" width="36" height="36" alt="">
                <h4 class="ml-2 my-auto">Fitness Web</h4>
            </div>

            <div class="profile d-flex justify-content-center">
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
        <div class="contentContainer d-flex">
        <div class="float-left" id="card">
          <div class="card shadow-style mb-3" style="max-width: 20rem;">
            <div class="card-header">Workout</div>
              <div class="card-body">
              <h4 class="card-title"><?php echo $pOlahraga->nama_paket ?></h4>
              <p class="card-text"><?php echo $pOlahraga->deskripsi_paket ?></p>
              <form method="post" class="text-center">
                <button type="submit" class="btn btn-primary btn-style" value="addworkout" name="addworkout" style="width: 200px">Add New Workout</button>
              </form>
              </div>
            </div>

        </div>
          <div class="float-right ml-5" id="instruction">
              <legend>Instruction</legend>
          <ul class="list-group shadow-style">
            <?php foreach($instruksi->result() as $row){
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                '.$row->nama_instruksi.'
              <span class="badge badge-primary badge-pill btn-stylenohv ml-5" style="height:30px; width:100px; line-height:27px">'.$row->lama_instruksi.' s</span>
            </li>';
          }?>
          </ul>
          </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
