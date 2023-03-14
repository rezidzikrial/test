<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

//ambil id dari URL
$id = $_GET['id'];

//query mahasiswa bedasarkan id
$m = query("SELECT * FROM mahasiswa WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li>NIM : <?= $m['nim']; ?></li>
    <li>Nama : <?= $m['nama']; ?></li>
    <li>Email : <?= $m['email']; ?></li>
    <li>Jurusan : <?= $m['jurusan']; ?></li>
    <li>
      <a href="ubah.php?id=<?= $m['id']; ?>"> ubah </a> | <a href="hapus.php?id=<?= $m['id'];
                                                                                ?>" onclick="return confirm('anda yakin ingin menghapus?');"> hapus </a>
      <br>
      <a href="index.php"> Kembali </a>
    </li>
  </ul>

</body>

</html>
