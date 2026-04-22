<?php
ini_set('session.save_path', '/tmp');
session_start();

// Cek dari SESSION dulu, kalau tidak ada cek dari COOKIE
if (!isset($_SESSION['id'])) {
    if (isset($_COOKIE['user_id'])) {
        $_SESSION['id']   = $_COOKIE['user_id'];
        $_SESSION['nama'] = $_COOKIE['user_nama'];
        $_SESSION['role'] = $_COOKIE['user_role'];
    } else {
        header("Location: /api/login.php");
        exit();
    }
}
?>