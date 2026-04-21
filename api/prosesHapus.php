<?php
    session_start();
    require './koneksi.php';
    $id = $_GET['id'];

    $query = "DELETE FROM mahasiswa WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: dashboardAdmin.php");
    }
?>