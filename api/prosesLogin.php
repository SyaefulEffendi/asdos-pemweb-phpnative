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

            setcookie('user_id', $row['id'], time() + (86400 * 30), "/");
            setcookie('user_nama', $row['nama'], time() + (86400 * 30), "/");
            setcookie('user_role', $row['role'], time() + (86400 * 30), "/");

            // Redirect berdasarkan role
            if ($row['role'] == 'admin') {
                header("Location: /api/dashboardAdmin.php");
            } else {
                header("Location: /api/beranda.php");
            }
            exit(); // Selalu gunakan exit() setelah header redirect
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: /api/login.php");
            exit();
        }
    }
}
?>