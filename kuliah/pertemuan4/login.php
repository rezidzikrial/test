<?php
session_start();
require 'functions.php';

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit;
}

//jika tombol login ditekan
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
  <?php if (isset($login['error'])) : ?>
    <p style="color:red; font-style: italic;"><?= $login['pesan']; ?></p>
  <?php endif; ?>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          password :
          <input type="password" name="password" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
      </li>
      <li>
        <button type="submit" name="login">Login </button>
      </li>
      <li>
        <a href="registrasi.php">Registrasi</a>
      </li>


    </ul>

</body>

</html>