<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <title>Login</title>
  </head>
  <body>
    <!-- Container -->
      <section class="section mt-5">
      <div class="container">
        <div class="row justify-content-md-center ">
            <div class="col-md-5 col-md-auto text-center login-box">
                <a href="<?php echo base_url()?>"><img src="<?php echo base_url('image/icon.png');?>" width="72" height="72" alt="Fitnes Web" class="mb-3"></a>
                <h1 class="text-center color-blue font-weight-light">Login</h1>
                <form method="post">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" id="email" name="email" class="form-control form-control-lg flat-input" placeholder="Email">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="col-md-12">
                            <input type="password" id="password" name="password" class="form-control form-control-lg flat-input" placeholder="Password">
                            <?php echo form_error('password'); ?>
                        </div>
                        <button type="submit" class="mt-4 btn btn-lg btn-block btn-style" value="Login" name="login">Login</button>
                        <a href="<?php echo site_url('auth/register') ?>" class="mt-3 text-center col color-blue">Didn't have account? Register</a>
                    </div>
                </form>
            </div>
            <div class="col-md-7 bg_login">
                <img class="img-fluid" src="<?php echo base_url('image/loginBg.png');?>" alt=""/>
            </div>
        </div>
      </div>
        </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>