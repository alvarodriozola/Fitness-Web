<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/landing_style.css'); ?>">
      
    <title>Fitness Web</title>
  </head>
  <body>
      <nav class="navbar">
        <a class="navbar-brand" href="#">
            <a href="<?php echo base_url()?>"><img src="<?php echo base_url('image/icon.png');?>" width="50" height="50" alt="Fitnes Web" class="d-inline-block align-top"></a>
        </a>
          <div class="ml-auto ">
            <a class="btn btnLogin my-2 my-sm-0" href="<?php echo site_url('auth_controller/login') ?>">SignIn</a>
            <a class="btn btnReg my-2 my-sm-0" href="<?php echo site_url('auth_controller/register') ?>">SignUp</a>
          </div>
      </nav>
      
    <div class="container" style="margin-left:2%;">
        <img class="landingBg" src="<?php echo base_url('image/landingPageBg.png');?>" alt=""/>
        <div class="webDetail" style="margin-top:20%;">
            <h1 class="font-weight-normal">Fitness Web</h1>
            <p>Push harder than yesterday if you want a different tomorrow.</p>
        </div>
        <div class="btn-noHovWh">
            <a href="<?php echo site_url('auth_controller/register') ?>" class="mt-4 btn btn-lg btn-block btn-getStarted">Get Started</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>