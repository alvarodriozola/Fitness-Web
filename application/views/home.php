<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home | FitnessWeb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <li>Hello, <?php echo $_SESSION['email'] ?></li>
          <li><a href="<?php echo site_url('user/home') ?>" class="btnHome">Home</a></li>
          <li><a href="<?php echo site_url('user/schedule') ?>" class="btnSchedule">Schedule</a></li>
          <li><a href="<?php echo site_url('user/statistic') ?>" class="btnStatistic">Statistic</a></li>
          <li><a href="<?php echo site_url('user/logout') ?>" class="btnLogout">Logout</a></li>
        </ul>
      </nav>
    </header>
    <h3>Workout Plan</h3>
    <div class="workoutplan-class">
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
      <div><img src="https://cdn3.iconfinder.com/data/icons/rest/30/add_order-512.png" height="110px" id="image-logo"></div>
    </div>
    <h3>Current Workout</h3>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.workoutplan-class').slick({
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 4
      });
    });
    </script>
  </body>
</html>
