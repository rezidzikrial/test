<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: Login.php");
  exit;
}

require 'functions.php';

//ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}




?>

<!DOCTYPE html>
<html>

<head>
  <title> Halaman Login </title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>
  <h3>Form Login</h3>
  <?php //jika kondisi login error maka akan menampilkan pesan 
  ?>
  <?php if (isset($login['error'])) : ?>
    <p style="color:red; font-style: italic;"><?= $login['pesan']; ?></p>
  <?php endif; ?>

  <form action="" method="post">
    <ul>
      <li>
        <label>
          username :
          <input type="text" name="username" required>
        </label>
      </li>
      <li>
        <label>
          password :
          <input type="text" name="password" required>
        </label>
      </li>
      <li>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
      </li>
      <li>
        <button type="login" name="login">login </button>
      </li>


    </ul>

</body>

</html>