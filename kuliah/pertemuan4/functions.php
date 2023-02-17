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

  function registrasi($data)
  {
    $conn = koneksi();

    //ambil dulu username dan password
    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    //jika username / password kosong
    if (empty($username) || empty($password1) || empty($password2)) {
      echo "<script>
          alert('username / password tidak boleh kosong!');
          document.location.href = 'registrasi.php';
          </script>";
      return false;
    }

    //jika username sudah ada di dalam database
    if (query("SELECT * FROM user WHERE username = '$username'")) {
      echo "<script>
          alert('username sudah terdaftar!');
          document.location.href = 'registrasi.php';
          </script>";

      return false;
    }

    //jika konfirmasi password tidak sesuai 
    if ($password1 !== $password2) {
      echo "<script>
          alert('konfirmasi password tidak sesuai!');
          document.location.href = 'registrasi.php';
          </script>";
      return false;
    }

    //jika password kurang/lebih kecil dari lima || < 5 
    if (strlen($password1) < 5) {
      echo "<script>
      alert('password terlalu pendek!');
      document.location.href = 'registrasi.php';
      </script>";
      return false;
    }

    //jika username dan password sudah sesuai
    //fungsi enkripsi password
    $epassword = password_hash($password1, PASSWORD_DEFAULT);

    //insert ke table user
    $query = "INSERT INTO user
              VALUES
              (null, '$username', '$epassword')
              ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  }

  function login($data1)
  {
    $conn = Koneksi();

    $username = htmlspecialchars($data1['username']);
    $password = htmlspecialchars($data1['password']);

    //cek dulu usernamenya
    if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
      //cek password
      if (password_verify($password, $user['password'])) {
        //set session
        $_SESSION['login'] == true;

        header("Location: index.php");
        exit;
      }
    }
    return [
      'error' => true,
      'pesan' => 'Username / Password Salah!'
    ];
  }

  ?>