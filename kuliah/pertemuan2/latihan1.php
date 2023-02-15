<<?php
  //koneksi ke database dan pilih database
  $conn = mysqli_connect('localhost', 'root', '', 'smt4_2023');

  //query isi tabel mahasiswa
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa");


  //ubah data ke dalam array
  //$row = mysqli_fetch_row($result); //array numeric
  //$row = mysqli_fetch_assoc($result); //array assocciative
  //$row = mysqli_fetch_array($result); //array keduanya
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  //tampung ke variabel mahasiswa
  $mahasiswa = $rows;


  ?> <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>


  <body>
    <h3>Daftar Mahasiswa</h3>

    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>

      <?php $i = 1;
      foreach ($mahasiswa as $m) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $m['nim']; ?></td>
          <td><?= $m['nama']; ?></td>
          <td><?= $m['email']; ?></td>
          <td><?= $m['jurusan']; ?></td>
          <td>
            <a href=""> ubah </a> | <a href=""> hapus </a>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>



  </body>


  </html>