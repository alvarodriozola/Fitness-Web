# Fitness-Web

Pertama dowload sample sql terlebih dahulu,
+ Link download sql : https://drive.google.com/file/d/1ElRAUK2KgYA25LKNUc_XqpdX-Ldi84k1/view

- Import sql sample ke phpmyadmin, dengan membuat database baru terlebih dahulu bernama db_fitnessapp
- Clone repository ini (Fitness-Web) ke file htdocs xampp
- Setting phpmyadmin pada folder FitnessApp/application/config/ edit file database.php, cari $db['default']
  ganti settingan, sesuaikan (username phpmyadmin/password/dll)
========================================================================
- Akses page REGISTER -> localhost/FitnessApp/index.php/auth/register
- Akses page LOGIN -> localhost/FitnessApp/index.php/auth/login
- Akses page PROFILE -> localhost/FitnessApp/index.php/user/profile
========================================================================
- File coding View -> direktori application/views (login, profile, register)
- File coding Model -> direktori application/models (Auth_model)
- File coding Controller -> direktori application/controllers (Auth)

