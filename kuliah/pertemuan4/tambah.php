<?php
require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambah"])) {
  //cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
  } else {
    echo "
    <script>
        alert('data gagal ditambahkan!');
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

  <h1>Tambah data mahasiswa</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label>
          NIM :
          <input type="text" name="nim" required>
        </label>
      </li>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" required>
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" required>
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required>
        </label>
      </li>
      <li>
        <button type="tambah" name="tambah">Tambah Data </button>
      </li>


    </ul>


</body>

</html>