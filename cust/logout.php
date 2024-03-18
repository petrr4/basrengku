<?php
session_start(); 
session_destroy(); // menghancurkan semua data sesi

// Redirect ke halaman login atau halaman utama setelah logout
header("Location: ../index.html");
exit();
?>
