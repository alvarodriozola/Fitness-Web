<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/homepage_style.css'); ?>">

    <title>Dashboard</title>
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
        <div class="contentContainer">
            <div class="wo-plan">
                <h4>Workout Plan</h4>
                <div class="wo-img">
                  <?php if(count($records)):?>
                    <?php foreach ($records as $record): ?>
                      <button id="btnWo" class="btnWo btnOverlay" onClick="window.location.href='<?php echo base_url('index.php/user_controller/paketOlahraga/'.$record->kode_paket);?>'">
                          <img id="woImg" src="<?php echo base_url('image/'.$record->pic_paket)?>">
                          <span id="woName" class="button-text"><?php echo $record->nama_paket; ?> </span>
                      </button>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <p>Workout not found</p>
                  <?php endif; ?>
                </div>
            </div>
            <div class="wo-cur mt-4">
                <h4>Current Workout</h4>
                <?php if($this->session->flashdata('new_workout') != ''){
                  echo '<div class="alert alert-success">'.$this->session->flashdata('new_workout').'</div>';
                } ?>
                <div class="wo-img">
                  <?php if(count($current)):?>
                    <?php foreach ($current as $cur): ?>
                      <button id="btnWo" class="btnWo btnOverlay" onClick="window.location.href='<?php echo base_url('index.php/user_controller/currentWorkout/'.$cur->kode_paket);?>'">
                          <img id="woImg" src="<?php echo base_url('image/'.$cur->pic_paket)?>">
                          <span id="woName" class="button-text"><?php echo $cur->nama_paket ?> </span>
                      </button>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <p>You haven't selected any workouts.</p>
                  <?php endif; ?>
                </div>
            </div>
        </div>

    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
