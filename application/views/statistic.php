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

    <title>Statistic</title>
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
              <legend>Last Exercise</legend>
                <table class="table table-hover shadow-style" style="border-radius: 10px;">
                  <tbody>
                  <?php if(count($historyexercise)):?>
                    <?php $Count = 0; ?>
                    <?php foreach($historyexercise as $row): ?>
                    <tr class="table-info">
                      <td><?php echo $row->tanggal ?></td>
                      <td>
                          <div class="wo-img">
                            <button id="btnWo" class="btnWo btnOverlay" style="height: 100px; width: 300px;">
                              <img id="woImg" style="height: 100px; width: 300px;" src="<?php echo base_url('image/'.$row->pic_paket)?>">
                              <span id="woName" class="button-text"><?php echo $row->nama_paket?></span>
                            </button>
                          </div>
                      </td>
                      <td><?php echo $row->waktu ?></td>
                    </tr>
                    <?php
                    $Count++;
                      if ($Count == 7){
                          break;
                      }
                     ?>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <p>You are not Exercise yet.</p>
                  <?php endif; ?>
                  </tbody>
                </table>
              </fieldset>

                <div class="bmiCount d-flex shadow-style align-items-center">
                   <div class="row text-center" style="width: 100%; margin: 0px; padding-top:30px; padding-bottom: 30px;">
                       <h4 class="col" style="margin-bottom:0px !important;">BMI (kg/m2)</h4>
                       <p class="col" style="margin-bottom: 0px !important;"><?php echo $BMI ?></p>
                       <p class="col" style="margin-bottom: 0px !important;"><?php echo $categoryBMI ?></p>
                   </div>
                </div>
        </div>

    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
