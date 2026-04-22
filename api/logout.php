<?php
ini_set('session.save_path', '/tmp');
    session_start();
    session_unset(); // Menghapus semua variabel session
    session_destroy(); // Menghancurkan session
    header("Location: /api/index.php"); // Kembali ke landing page
    exit();
?>