<?php

include('fungsi.php');

$nim = $_GET['nim'];

$delete = "DELETE FROM mahasiswa WHERE nim='$nim'";
mysqli_query($koneksi, $delete);
header("location:index.php")


?>