<?php
session_start();
require_once "../koneksi.php";

// Fungsi untuk menghasilkan kode alfanumerik acak
function generateRandomCode($length = 15) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['submit'])) {
    $tanggal_order = date("Y-m-d H:i:s", time());
    $nama_order = $_POST['nama_order'];
    $alamat_produk = $_POST['alamat_produk'];
    $nomorhp_order = $_POST['nomorhp_order'];
    $status_order = "Menunggu Pembayaran";

    // Generate random alphanumeric code for kode_order
    $kode_pesanan = generateRandomCode();

    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    // Inisialisasi parameter untuk query SQL
    $params = array();

    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
        // Ambil informasi produk dari database
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();

        // Hitung total harga untuk setiap produk
        $totalharga = $pecah["harga_produk"] * $jumlah;

        // Tambahkan parameter untuk setiap produk
        $params[] = $id_produk;
        $params[] = $tanggal_order;
        $params[] = $pecah["nama_produk"];
        $params[] = $nama_order;
        $params[] = $alamat_produk;
        $params[] = $nomorhp_order;
        $params[] = $totalharga;
        $params[] = $status_order;
        $params[] = $jumlah;
        $params[] = $kode_pesanan;
        $params[] = $email;
    }

    // Menggabungkan parameter ke dalam string untuk digunakan dalam query SQL
    $param_str = str_repeat('s', count($params));

    // Membuat query SQL dengan multiple values
    $query = "INSERT INTO pesan (id_produk, tanggal_order, nama_produk, nama_order, alamat_produk, nomorhp_order, total_harga, status_order, jumlah_produk, kode_pesanan, email) VALUES " . implode(",", array_fill(0, count($params) / 11, "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"));

    $stmt = $koneksi->prepare($query);
    
    // Dynamically bind parameters based on their data types
    $stmt->bind_param($param_str, ...$params);
    
    $stmt->execute();

    header("Location: tagihan.php");
}
?>