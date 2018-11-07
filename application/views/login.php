<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <h1>Login</h1>
    <?php echo validation_errors(); ?>
    <form method="post">
      <div class="form">
        <input type="text" name="email" id="email" placeholder="Email"/><br>
        <input type="password" name="password" id="password" placeholder="Password"/><br>
        <input type="submit" name="login" value="Login"/>
      </div>
    </form>
  </body>
</html>
