<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Page</title>
  </head>
  <body>
    <h1>Register</h1>
    <?php echo validation_errors(); ?>
    <form method="post">
      <div class="form">
        <input type="text" name="email" id="email" placeholder="Email"/><br>
        <input type="text" name="names" id="name" placeholder="Name"/><br>
        <select id="gender" name="gender" placeholder="Gender">
          <option value="" selected disabled hidden>Choose gender here</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <br><br>
        <input type="date" name="bdate" id="bdate" placeholder="Birth Date"/><br>
        <input type="password" name="password" id="password" placeholder="Password"/><br>
        <input type="password" name="password2" id="password" placeholder="Re-Password"/><br>
        <input type="submit" name="register" value="Register"/>
      </div>
    </form>
  </body>
</html>
