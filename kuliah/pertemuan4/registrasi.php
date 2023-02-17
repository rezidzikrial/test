<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
          alert('user baru berhasil ditambahkan, silahkan login!');
          document.location.href = 'login.php';
          </script>";
  } else {
    echo 'user gagal ditambahkan!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
</head>

<body>

  <h1>Registrasi</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password :
          <input type="password" name="password1" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Konfirmasi Password :
          <input type="password" name="password2" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <button type="submit" name="registrasi">Registrasi </button>
      </li>


    </ul>


</body>

</html>