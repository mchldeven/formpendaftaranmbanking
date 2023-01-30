<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . htmlspecialchars($_POST['user']) . "' AND password = '" . MD5(htmlspecialchars($_POST['pass'])) . "' ");

    if (mysqli_num_rows($cek) > 0) {
        $a = mysqli_fetch_object($cek);
        $_SESSION['stat_login'] = true;
        $_SESSION['id'] = $a->id_admin;
        $_SESSION['nama'] = $a->nm_admin;

        echo '<script>window.location="beranda.php"</script>';
    } else {
        echo '<script>alert("Username atau Password Salah")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        .atasbawah {
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mx-auto atasbawah" style="width: 18rem;">
            <h2 class="card-title mx-auto">Login Admin</h2>
            <hr>
            <div class="card-body">
                <form method="POST">
                    <div>
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" name="user">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <input type="submit" name="login" class="btn btn-primary w-100" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>