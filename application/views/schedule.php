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

    <!--calendar-->
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar.min.css" />
               <script src="<?php echo base_url() ?>scripts/lib/moment.min.js"></script>
               <script src="<?php echo base_url() ?>scripts/fullcalendar.min.js"></script>
               <script src="<?php echo base_url() ?>scripts/gcal.js"></script>

    <title>Schedule</title>
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
              <legend>Schedule</legend>
              <?php if($this->session->flashdata('new_schedule') != ''){
                echo '<div class="alert alert-success">'.$this->session->flashdata('new_schedule').'</div>';
              } ?>
              <button type="submit" name="addschedules" class="btn btn-primary btn-style" onClick="window.location.href='<?php echo base_url('index.php/user_controller/setschedule');?>'">New Schedule</button>
              <br>
              <div class="row">
                <div class="col-md-12">

                  <div id="calendar">
                  </div>


                </div>
              </div>
              </fieldset>

        </div>
        </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
                $('#calendar').fullCalendar({
                    eventSources: [
        {
            events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo site_url('user_controller/get_events') ?>',
                    dataType: 'json',
                    data: {
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
           }
        },
        ],
                });
    });
    </script>
  </body>
</html>
