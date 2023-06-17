<?php
include "fungsi.php";

$nim = $_GET['nim'];
$sqlGet = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$queryGet = mysqli_query($koneksi, $sqlGet);
$data = mysqli_fetch_assoc($queryGet);

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
                <h2><i class="bi bi-pencil-square"></i>&nbsp;Edit Data Mahasiswa</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-md">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" name="nim" value="<?php echo $data['nim']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas Mahasiswa</label>
                            <input type="text" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label>Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenjang</label>
                            <input type="text" class="form-control" name="jenjang" value="<?php echo $data['jenjang']; ?>" autocomplete="off" required>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h4>Biodata Pribadi</h4>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="tmp" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmp" value="<?php echo $data['tmp']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="ttl" value="<?php echo $data['ttl']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" value="<?php echo $data['jk']; ?>" autocomplete="off" required>
                        </div>
                        <button class="btn btn-success" name="edit" type="submit">Edit Data</button>
                        <a href="index.php" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Container -->


    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $jenjang = $_POST['jenjang'];
        $tmp = $_POST['tmp'];
        $ttl = $_POST['ttl'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        // //jurusan
        // $jurusanSelect = $_POST['jurusan'];
        // if ($jurusanSelect = 'Teknik Informasi') {
        //     $jurusanSelect = 'Teknik Informasi';
        // }
        // if ($jurusanSelect = 'Sistem Informasi') {
        //     $jurusanSelect = 'Sistem Informasi';
        // }
        // if ($jurusanSelect = 'Rekayasa Perangkat Lunak') {
        //     $jurusanSelect = 'Rekayasa Perangkat Lunak';
        // }
        // if ($jurusanSelect = 'Ilmu Komputer') {
        //     $jurusanSelect = 'Ilmu Komputer';
        // }
        // if ($jurusanSelect = 'Sistem Informasi Akuntansi') {
        //     $jurusanSelect = 'Sistem Informasi Akuntansi';
        // }
        // if ($jurusanSelect = 'Teknologi Komputer') {
        //     $jurusanSelect = 'Teknologi Komputer';
        // }

        // //jenjang
        // $jenjangSelect = $_POST['jenjang'];
        // if ($jenjangSelect = 'D3') {
        //     $jenjangSelect = 'D3';
        // }
        // if ($jenjangSelect = 'S1') {
        //     $jenjangSelect = 'S1';
        // }

        // //jenis kelamin
        // $jkSelect = $_POST['jk'];
        // if ($jkSelect = 'Laki-Laki') {
        //     $jkSelect = 'Laki-Laki';
        // }
        // if ($jkSelect = 'Perempuan') {
        //     $jkSelect = 'Perempuan';
        // }

        $sqlUpdate = "UPDATE mahasiswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan', jenjang='$jenjang', tmp='$tmp', ttl='$ttl', alamat='$alamat', jk='$jk' WHERE nim='$nim'";
        $queryUpdate = mysqli_query($koneksi, $sqlUpdate);
        // $cek = mysqli_num_rows($queryUpdate);

        if (isset($sqlUpdate)) {
            echo "
            <div class='alert alert-success'>Data berhasil diubah!<a href='index.php'>Lihat Data</a></div>
            ";
        } elseif ($sqlUpdate > 0) {
            echo "
            <div class='alert alert-danger'>Data tidak berhasil diubah!</div>
            ";
        }
        // header("location: 'index.php'");
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