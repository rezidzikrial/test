<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman</title>
</head>

<body>

  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah data mahasiswa</a>
  <br><br>

  <form action="" method="post">

    <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari</button>

  </form>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php //kondisi jika data yang dicari tidak ada 
    ?>
    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="4">
          <p>Data mahasiswa tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $m['id']; ?>"> Lihat detail </a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>



</body>


</html>