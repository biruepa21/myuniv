<?php
include 'fungsi.php';

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
                <h2 class="text-center fw-bold">Daftar Data Mahasiswa</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-md">
                    <a href="tambah.php" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill"></i>&nbsp; Tambah Data Mahasiswa</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md">
                    <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenjang</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>ALamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <?php 
                            $sqlGet = "SELECT * FROM mahasiswa";
                            $query = mysqli_query($koneksi, $sqlGet);

                            while($data = mysqli_fetch_array($query)){
                               echo "
                               <tbody>
                                    <tr>
                                        <td>$data[nim]</td>
                                        <td>$data[nama]</td>
                                        <td>$data[kelas]</td>
                                        <td>$data[jurusan]</td>
                                        <td>$data[jenjang]</td>
                                        <td>$data[tmp]</td>
                                        <td>$data[ttl]</td>
                                        <td>$data[alamat]</td>
                                        <td>$data[jk]</td>
                                        <td>
                                        <div class='d-grid gap-2 d-md-flex justify-content-center'> 
                                            <a href='edit.php?nim=$data[nim]' class='btn btn-sm btn-warning'>Edit</a>
                                            <a href='hapus.php?nim=$data[nim]' class='btn btn-sm btn-danger'>Hapus</a>
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                               "; 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Footer -->
    <footer class="bg-dark text-white container-fluid">
        <div class="col">
            <p>Created by Kelompok 3</p>
        </div>
    </footer>

    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>