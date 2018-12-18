<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <title>Register</title>
  </head>
  <body>
    <!-- Container -->
      <section class="section mt-5">
      <div class="container">
        <div class="row justify-content-md-center shadow-style">
            <div class="col-md-5 col-md-auto text-center login-box">
                <a href="<?php echo base_url()?>"><img src="<?php echo base_url('image/icon.png');?>" width="72" height="72" alt="Fitnes Web" class="mb-3"></a>
                <h1 class="text-center color-blue font-weight-light">Register</h1>
                <?php echo $this->session->flashdata('success_register'); ?>
                <form method="post">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" name="fname" id="fname" class="form-control form-control-lg flat-input" placeholder="First Name">
                            <?php echo form_error('fname'); ?>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="lname" id="lname" class="form-control form-control-lg flat-input" placeholder="Last Name">
                            <?php echo form_error('lname'); ?>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" class="form-control form-control-lg flat-input" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" class="form-control form-control-lg flat-input" placeholder="Password">
                            <?php echo form_error('password'); ?>
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="repassword" id="repassword" class="form-control form-control-lg flat-input" placeholder="Re-Password">
                            <?php echo form_error('repassword'); ?>
                        </div>
                        <button type="submit" class="mt-4 btn btn-lg btn-block btn-style" value="Register" name="register">Register</button>
                        <a href="<?php echo site_url('auth_controller/login') ?>" class="mt-3 text-center col color-blue">Already have an account? Login</a>
                    </div>
                </form>
            </div>
            <div class="col-md-7 bg_login">
                <img class="img-fluid" src="<?php echo base_url('image/registerBg.png');?>" alt=""/>
            </div>
        </div>
      </div>
        </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
