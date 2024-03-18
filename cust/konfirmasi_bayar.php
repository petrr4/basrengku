<?php
session_start();
require_once "../koneksi.php";

if (isset($_POST['kode_pesanan'])) {
    $kode_pesanan = $koneksi->real_escape_string($_POST['kode_pesanan']); // Use real_escape_string to prevent SQL injection
    $status_order = "Lunas";

    $query = "UPDATE pesan SET status_order=? WHERE kode_pesanan=?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $status_order, $kode_pesanan);
    
    if ($stmt->execute()) {
        header("Location: sukses.php");
    } else {
        echo "Error updating status order: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
?>