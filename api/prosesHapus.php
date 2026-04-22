<?php
ini_set('session.save_path', '/tmp');
    session_start();
    require __DIR__ . '/koneksi.php';
    $id = $_GET['id'];

    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: /api/dashboardAdmin.php");
    }
?>