<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$id = $_GET['id'];

//query mahasiswa bedasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id=$id");

//cek apakah tombol ubah sudah ubah sudah ditekan atau belum
if (isset($_POST['ubah'])) {

  //cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
  } else {
    echo "
    <script>
        alert('data gagal diubah!');
        document.location.href = 'index.php';
    </script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Form ubah data mahasiswa</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $m["id"]; ?>">

    <ul>
      <li>
        <label>
          NIM :
          <input type="text" name="nim" autofocus required value="<?= $m['nim']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $m['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" autofocus required value="<?= $m['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" autofocus required value="<?= $m['jurusan']; ?>">
        </label>
      </li>
      <li>
        <button type="ubah" name="ubah">Ubah Data </button>
      </li>


    </ul>

</body>

</html>