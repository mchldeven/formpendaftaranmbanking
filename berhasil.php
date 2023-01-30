<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Pendaftaran Universal Mobile</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="my-5">
            <h2 class="text-center">Pendaftaran Berhasil</h2>
            <div class="card mx-auto" style="width: 30rem; height:5rem;">
                <h5 class="text-center">Kode Pendaftaran Anda Adalah <?= $_GET['id'] ?></h5>
                <div class="row mx-2">
                    <div class="col-md-6"><a href="cetak.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn btn-primary w-100">Cetak Bukti Daftar</a></div>
                    <div class="col-md-6"><a href="index.php" class="btn btn-danger w-100">Kembali</a></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>