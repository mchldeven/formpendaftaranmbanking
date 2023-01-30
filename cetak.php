<?php
include 'koneksi.php';

$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaraan WHERE id_pendaftaran='" . $_GET['id'] . "'");
$p = mysqli_fetch_object($peserta);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Pendaftaran Mobile Banking (Karyawan)</title>
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
            <h1>Bukti Pendaftaran</h1>

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
            </table>
        </div>
    </div>
</body>

</html>