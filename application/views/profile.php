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

    <title>Profile</title>
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
          <?php echo form_open('user_controller/editDataDiri') ?>

          <fieldset>
              <legend>Profile</legend>
              <?php if($this->session->flashdata('new_datadiri') != ''){
                echo '<div class="alert alert-success">'.$this->session->flashdata('new_datadiri').'</div>';
              }else if($this->session->flashdata('edit_datadiri') != ''){
                echo '<div class="alert alert-success">'.$this->session->flashdata('edit_datadiri').'</div>';
              } ?>
              <div class="form-group row">
                <label for="staticName" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" readonly="" class="form-control-plaintext" id="staticName" value="<?php echo $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang')?>">
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" readonly="" class="form-control-plaintext" id="email" name="email" value="<?php echo $this->session->userdata('email')?>">
                </div>

                <?php foreach($datadiri as $row): ?>

                  <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="umur" name="umur" value="<?php echo $row->umur ?>">
                  </div>
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="gender" name="gender" value="<?php echo $row->jenis_kelamin ?>">
                  </div>
                  <label for="berat_badan" class="col-sm-2 col-form-label">Berat Badan</label>
                  <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="weight" name="weight" value="<?php echo $row->berat_badan ?> kg">
                  </div>
                  <label for="tinggi_badan" class="col-sm-2 col-form-label">Tinggi Badan</label>
                  <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="height" name="height" value="<?php echo $row->tinggi_badan ?> cm">
                  </div>
                  <button type="submit" class="btn btn-primary btn-style mt-3 ml-3">Edit Profile</button>
              </div>
              <?php endforeach; ?>
              </fieldset>
              <?php form_close(); ?>
        </div>

    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
