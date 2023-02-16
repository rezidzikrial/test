<<?php

  function koneksi()
  {
    return mysqli_connect('localhost', 'root', '', 'smt4_2023');
  }

  function query($query)
  {
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    //jika hasilnya hanya 1 sdata
    if (mysqli_num_rows($result) == 1) {
      return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;
  }

  function tambah($data)
  {
    $conn = koneksi();


    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    $query = "INSERT INTO mahasiswa 
    VALUES
    (null, '$nim', '$nama', '$email', '$jurusan' )
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  ?>