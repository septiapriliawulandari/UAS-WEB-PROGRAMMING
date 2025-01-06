<?php
// Informasi koneksi database
$host = 'localhost'; // Host database
$user = 'root';      // Username MySQL, default biasanya 'root'
$password = '';      // Password MySQL, kosong jika default
$database = 'lokerin'; // Nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Jika koneksi berhasil
// echo "Koneksi berhasil!";

?>

