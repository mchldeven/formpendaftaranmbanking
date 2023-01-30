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
    <title>Cetak </title>
    <style>
        h1 {
            font-size: 50px;
        }

        .fontsize {
            font-size: 20px;
        }
    </style>

    <script>
        window.print();
    </script>
</head>

<body>
    <div class="container">
        <div class="my-5">
            <h1>Laporan Pendaftaran</h1>

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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>