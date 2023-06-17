<?php

include "fungsi.php";

session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Data tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <title>MyUniv</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">MyUniv | Kelompok 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-3">
            <div class="col-md">
                <h2><i class="bi bi-file-earmark-plus-fill"></i>&nbsp;Tambah Data Mahasiswa</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-md">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM Mahasiswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas Mahasiswa</label>
                            <input type="text" class="form-control" name="kelas" placeholder="Masukkan Kelas Mahasiswa" required>
                        </div>
                        <div class="mb-3">
                            <label>Jurusan</label>
                            <select class="form-select" name="jurusan" required>
                                <option selected disabled>Pilih Jurusan </option>
                                <option value="Teknik Informasi">Teknik Informasi</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Ilmu Komputer">Ilmu Komputer</option>
                                <option value="Sistem Informasi Akuntansi">Sistem Informasi Akuntansi</option>
                                <option value="Teknologi Komputer">Teknologi Komputer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Jenjang</label>
                            <select class="form-select" name="jenjang" required>
                                <option selected disabled>Pilih Jenjang Pendidikan</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h4>Biodata Pribadi</h4>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="tmp" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmp" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="ttl" placeholder="Masukkan Tanggal Lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <select class="form-select" name="jk" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <button class="btn btn-success" name="tambah">Tambah Data</button>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <?php
    if(isset($_POST['tambah'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $jenjang = $_POST['jenjang'];
        $tmp = $_POST['tmp'];
        $ttl = $_POST['ttl'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        //jurusan
        $jurusanSelect = $_POST['jurusan'];
        if ($jurusanSelect = 'Teknik Informasi') {
            $jurusanSelect= 'Teknik Informasi';
        }
        if ($jurusanSelect = 'Sistem Informasi') {
            $jurusanSelect = 'Sistem Informasi';
        }
        if ($jurusanSelect = 'Rekayasa Perangkat Lunak') {
            $jurusanSelect = 'Rekayasa Perangkat Lunak';
        }
        if ($jurusanSelect = 'Ilmu Komputer') {
            $jurusanSelect = 'Ilmu Komputer';
        }
        if ($jurusanSelect = 'Sistem Informasi Akuntansi') {
            $jurusanSelect = 'Sistem Informasi Akuntansi';
        }
        if ($jurusanSelect = 'Teknologi Komputer') {
            $jurusanSelect = 'Teknologi Komputer';
        }

        //jenjang
        $jenjangSelect = $_POST['jenjang'];
        if ($jenjangSelect = 'D3') {
            $jenjangSelect = 'D3';
        }
        if ($jenjangSelect = 'S1') {
            $jenjangSelect = 'S1';
        }

        //jenis kelamin
        $jkSelect = $_POST['jk'];
        if ($jkSelect = 'Laki-Laki') {
            $jkSelect = 'Laki-Laki';
        }
        if ($jkSelect = 'Perempuan') {
            $jkSelect = 'Perempuan';
        }

        $sqlGet = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $queryGet = mysqli_query($koneksi, $sqlGet);
        $cek = mysqli_num_rows($queryGet);

        $sqlInsert = "INSERT INTO mahasiswa(nim, nama, kelas, jurusan, jenjang, tmp, ttl, alamat, jk) VALUES ('$nim', '$nama', '$kelas', '$jurusan', '$jenjang', '$tmp', '$ttl', '$alamat', '$jk')";

        $queryInsert =  mysqli_query($koneksi, $sqlInsert);

        if(isset($sqlInsert) && $cek <= 0) {
            echo "
            <div class='alert alert-success'>Data berhasil ditambahkan!<a href='index.php'>Lihat Data</a></div>
            ";
        } elseif ($cek > 0) {
            echo "
            <div class='alert alert-danger'>Data tidak berhasil ditambahkan!</div>
            ";
        }

        //header("location: index.php");
    }
    ?>

    <!-- Footer -->
    <footer class="container-fluid bg-dark text-white">
        <div class="col">
            <p>Created by Kelompok 3</p>
        </div>
    </footer>

    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>