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

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
  }

  function hapus($id)
  {
    $conn = Koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  function ubah($data)
  {
    $conn = Koneksi();

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "UPDATE mahasiswa SET
          nim = '$nim',
          nama = '$nama',
          email = '$email',
          jurusan = '$jurusan'
          WHERE id = $id
          ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }

  function cari($keyword)
  {
    $conn = Koneksi();

    $query = "SELECT * FROM mahasiswa
    WHERE
    nim LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;


    return query($query);
  }

  function Login($data)
  {
    $conn = Koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    if ($username == 'admin' && $password == '123') {

      //set session
      $_SESSION['login'] = true;

      header("location: index.php");
      exit;
    } else {
      return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
      ];
    }
  }

  ?> ?>