<?php
$hostname = "localhost";
$database = "penjualan";
$username = "root";
$password = "";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

?> 