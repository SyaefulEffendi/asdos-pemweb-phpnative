<?php
session_start();
require __DIR__ . '/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telp = htmlspecialchars($_POST['telp']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE telp = '$telp'";
    $result = mysqli_query($koneksi, $query);

    // DEBUG SEMENTARA - hapus setelah selesai
    echo "Telp input: " . $telp . "<br>";
    echo "Jumlah user ditemukan: " . mysqli_num_rows($result) . "<br>";
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        echo "Password di DB: " . $row['password'] . "<br>";
        echo "Verify result: " . (password_verify($password, $row['password']) ? 'TRUE' : 'FALSE') . "<br>";
        die(); // stop dulu
    } else {
        echo "User tidak ditemukan!";
        die();
    }
}
?>