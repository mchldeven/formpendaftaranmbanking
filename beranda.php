<?php
session_start();
include 'koneksi.php';

if ($_SESSION['stat_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Pendaftaran Mobile Banking Universal</title>
</head>

<body>
    <div class="container">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-peserta.php">Data Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- body -->
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title">Beranda</h1>
                <p class="card-text">Selamat Datang,
                    <?= $_SESSION['nama'] ?>
                </p>
            </div>
        </div>


    </div>
</body>

</html>