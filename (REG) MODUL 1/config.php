<?php
$host = "localhost";
$user = "root"; // Default user XAMPP
$pass = ""; // Kosongkan jika tidak ada password
$db = "car_sales";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
