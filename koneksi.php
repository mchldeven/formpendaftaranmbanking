<?php
$host = 'localhost';
$user = 'root';
$pass = 'developer';
$db = 'db_daftarmb';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo 'Error : ' . mysqli_connect_error($conn);
}
