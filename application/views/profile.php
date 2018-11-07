<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    Hello, <?php echo $_SESSION['email'] ?>
    <a href="<?php
    $this->load->helper('url');
    echo base_url('index.php/auth/logout'); ?>">Logout</a>
  </body>
</html>
