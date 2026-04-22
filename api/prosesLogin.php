<?php
ini_set('session.save_path', '/tmp');
session_start();
require __DIR__ . '/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telp = htmlspecialchars($_POST['telp']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE telp = '$telp'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['role'] = $row['role'];

            // DEBUG - lihat role dan session
            echo "Role: " . $row['role'] . "<br>";
            echo "Session ID: " . session_id() . "<br>";
            echo "Session data: <pre>" . print_r($_SESSION, true) . "</pre>";
            echo "<a href='/api/beranda.php'>Klik ke Beranda</a> | ";
            echo "<a href='/api/dashboardAdmin.php'>Klik ke Dashboard Admin</a>";
            die();
        }
    }
}
?>