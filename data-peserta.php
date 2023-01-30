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
                        <a class="nav-link" href="data-peserta.php">Data Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php">Keluar</a>
                    </li>
                </ul>
            </div>
            <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">cari</button>
  </form>
</nav>
        </nav>

        <!-- body -->
        <div class="mt-5">
            <h2>Data Peserta</h2>
            
           
            <a href="cetak-peserta.php" class="btn btn-info my-2" target="_blank">Cetak</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Pendaftaran</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Nomor Telpon</th>
                         <th scope="col">Email</th>
                         <th scope="col">Device</th>
                         <th scope="col">Cabang</th>
                         <th scope="col">Jabatan</th>
                         <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $listPeserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaraan");
                    while ($row = mysqli_fetch_array($listPeserta)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $row['id_pendaftaran'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['norek'] ?></td>
                            <td><?= $row['no_tlp'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['device'] ?></td>
                            <td><?= $row['cabang'] ?></td>
                              <td><?= $row['jabatan'] ?></td>
                            <td>
                                <a href="detail-peserta.php?id=<?= $row['id_pendaftaran'] ?>" class="btn btn-primary">Detail</a>
                                <a href="hapus-peserta.php?id=<?= $row['id_pendaftaran'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>