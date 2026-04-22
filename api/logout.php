<?php
ini_set('session.save_path', '/tmp');
session_start();
session_destroy();

// Hapus semua cookie
setcookie('user_id',   '', time() - 3600, '/');
setcookie('user_nama', '', time() - 3600, '/');
setcookie('user_role', '', time() - 3600, '/');

header("Location: /api/login.php");
exit();
?>