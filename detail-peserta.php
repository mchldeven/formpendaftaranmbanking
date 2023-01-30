<?php
session_start();
include 'koneksi.php';

if ($_SESSION['stat_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$peserta = mysqli_query($conn, "SELECT * from tb_pendaftaraan WHERE id_pendaftaran = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($peserta);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Admin</title>
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
                        <a class="nav-link" href="data-peserta.php">Data Pendaftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- body -->
        <div class="my-5">
            <h1>Detail Pendaftar</h1>

            <table class="fontsize table">
               <tr>
                    <td>
                        <img src="img/<?= $p->file ?>" width="150">
                    </td>
                </tr>
                <tr>
                    <td>Kode Pendaftaran</td>
                    <td>:</td>
                    <td><?= $p->id_pendaftaran ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $p->tgl_daftar ?></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><?= $p->nama ?></td>
                </tr>
                
                <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td><?= $p->norek ?></td>
                </tr>
                <tr>
                    <td>Nomor Telpon</td>
                    <td>:</td>
                    <td><?= $p->no_tlp ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?= $p->email ?></td>
                </tr>
                <tr>
                    <td>device</td>
                    <td>:</td>
                    <td><?= $p->device ?></td>
                </tr>
                <tr>
                    <td>Cabang</td>
                    <td>:</td>
                    <td><?= $p->cabang ?></td>
                </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?= $p->jabatan ?></td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>