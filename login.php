<?php
session_start();

if (isset($_SESSION['login'])) {
    header('location: home.php');
    exit;
}

require 'fungsi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");

    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location: home.php');
        exit;
    }

    $error = true;
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
    <link rel="stylesheet" href="css/login.css">
    <title>MyUniv</title>
</head>

<body>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MyUniv | Kelompok 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">

                <?php if(isset($error)) : ?>
                <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
                <?php endif; ?>

                <form action="" method="POST">
                    <h4 class="my-5 text-center">Login</h4>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="username" placeholder="Masukkan password Anda" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->
</body>

</html>