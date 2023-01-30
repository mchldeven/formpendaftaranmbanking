<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $getmaxid = mysqli_query($conn, "SELECT max(right(id_pendaftaran , 5)) as id FROM tb_pendaftaraan");
    $d = mysqli_fetch_object($getmaxid);
    $generateid = 'P' . date('Y') . sprintf('%05s', $d->id + 1);

    function upload()
    {
        $namaFile = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];

        //mengecek file nya gambar atau bukan
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo '<script>
                alert("File yang anda upload bukan gambar");
                window.location="index.php";
            </script>';
            return false;
        }

        //generate nama file baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    $foto = upload();
    if (!$foto) {
        return false;
    }
    $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaraan VALUES (
            '" . $generateid . "',
            '" . date('Y-m-d') . "',
            '" . $_POST['nama'] . "',
            '" . $_POST['norek'] . "',
            '" . $_POST['no_telp'] . "',
            '" . $_POST['email'] . "',
            '" . $_POST['device'] . "',
            '" . $_POST['cabang'] . "',
            '" . $_POST['jabatan'] . "',
            '$foto'
        )");

    // var_dump($_POST);
    // var_dump($_FILES);
    // die;

    if ($insert) {
        echo '<script>window.location="berhasil.php?id=' . $generateid . '"</script>';
    } else {
        echo "gagal" . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>UNIVERSAL BPR</title>
</head>

<body class="bg-light">
    <div class="container my-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mx-auto">
                        <div class=" card-body">
                            <h5 class="card-title text-center">Formulir Pendaftaran Mobile Banking Universal</h5>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tahunajar">KHUSUS KARYAWAN AKTIF</label>
                                    <input type="text" class="form-control text-center" name="name" value="2023" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mx-auto" style="width: 30rem;">
                        <div class="card-body">
                            <h5 class="card-title">Data Diri</h5>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="norek">Nomor Rekening</label>
                                   <input type="text" id="noree" name="norek" required minlength="10" maxlength="10">
                                </div>
                            </div>
                               <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="no_telp">Nomor Telpon AKTIF</label>
                                    <input type="tel" class="form-control" name="no_telp" required><p style="color:red;">Harap isi dengan nomor yang aktif untuk pengiriman <b>OTP</b</p></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tgl_daftar">Tanggal Daftar</label>
                                    <input type="date" class="form-control" name="tgl_daftar" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="device">Device yang digunakan:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" value="Android" checked>
                                        <label class="form-check-label" for="android">
                                            Android
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="device" value="IOS">
                                        <label class="form-check-label" for="ios">
                                            IOS
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="cabang">Cabang</label>
                                    <select class="form-control" name="cabang">
                                        <option value="" class="text-center">-- Pilih --</option>
                                        <option value="Bintaro">Bintaro</option>
                                        <option value="Tambun">Tambun</option>
                                        <option value="Bekasi">Bekasi</option>
                                        <option value="Bsd">Bsd</option>
                                        <option value="Pik">Pik</option>
                                        <option value="Bogor">Bogor</option>
                                         <option value="Cibinong">Cibinong</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type"email" textarea class="form-control" name="email" required><p style="color:red;">Harap isi dengan nomor yang aktif</p>
                                </div>
                            </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" required>
                                </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="file">Upload Gambar Buku Tabungan</label>
                                    <input type="file" class="form-control-file" name="file" required><p style="color:red;">Foto Buku Tabungan pada tampilan nomor rekening dan nama nasabah </p>
                                </div>
                            </div>
                  
          <div class="question-answer checkbox-item">
            <div>
              <input type="checkbox" value="none" id="check_1" name="check" required/>
              <label for="check_1" class="check"><span>I agree to the <a href="https://universalbpr.co.id/">privacy policy.</a></span></label>
            </div>
          </div>
        </div>
        <div class="btn-block">
                        <input type="submit" name="submit" class="btn btn-primary" value="Daftar Sekarang" />
                    </div>
                </div>
            </div>
        </form>
    </div>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>