<?php
require_once "../koneksi.php";

if (isset($_POST['btnTambah'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $berat = $_POST['berat'];
    $foto_produk = $_POST['foto_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];

    $sql = "INSERT INTO produk (nama_produk, harga_produk, berat, foto_produk, deskripsi_produk) VALUES ('$nama_produk', '$harga_produk', '$berat', '$foto_produk', '$deskripsi_produk')";

    if (mysqli_query($koneksi, $sql)) {
        echo '<script>alert("Produk berhasil ditambahkan.");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($koneksi) . '");</script>';
    }
}

header("Location: index.php"); // Redirect back to the product list page
?>
