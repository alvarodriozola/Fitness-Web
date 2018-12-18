<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/homepage_style.css'); ?>">

    <title>Add Schedule</title>
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
          <fieldset>
              <legend>Add Schedule</legend>
              <form method="post">
              <div class="form-group">
                <label for="lb_workout">My Workout</label>
                <select class="form-control" name="workout" id="workout">
                  <option disabled selected value>--- Choose Your Workout ---</option>
                  <?php foreach($scheduler as $rows){
                    echo '<option value="'.$rows->kode_paket.'">'.$rows->nama_paket.'</option>';
                    }
                  ?>
                </select>
                <?php echo form_error('workout'); ?>
              </div>
              <div class="form-group">
                <label for="lb_bb">Tanggal Mulai</label>
                <input type="datetime-local" class="form-control" name="tgl_mulai" id="tgl_mulai">
                <?php echo form_error('tgl_mulai'); ?>
              </div>
              <div class="form-group">
                <label for="lb_bb">Tanggal Selesai</label>
                <input type="datetime-local" class="form-control" name="tgl_selesai" id="tgl_selesai">
                <?php echo form_error('tgl_selesai'); ?>
              </div>
              </fieldset>
              <button type="submit" name="newschedule" value="newschedule" class="btn btn-primary">Save</button>
            </form>
              <button name="cancel" value="cancel" class="btn btn-danger" onClick="window.location.href='<?php echo base_url('index.php/user_controller/schedule');?>'">Cancel</button>
            </div>

        </div>
        </div>

    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
