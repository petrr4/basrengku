<?php
session_start();
require_once "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil kode pesanan dari data yang dikirimkan melalui AJAX
    $kodePesanan = $_POST["kode_pesanan"];

    // Hapus data pesanan dan produk terkait dari database
    $hapusPesanan = $koneksi->query("DELETE FROM pesan WHERE kode_pesanan='$kodePesanan'");
    $hapusDetailPesanan = $koneksi->query("DELETE FROM detail_pesan WHERE kode_pesanan='$kodePesanan'");

    if ($hapusPesanan && $hapusDetailPesanan) {
        // Berhasil menghapus, kirim respons 200
        http_response_code(200);
    } else {
        // Gagal menghapus, kirim respons 500
        http_response_code(500);
    }
} else {
    // Jika tidak ada permintaan POST, kembalikan respons 400 Bad Request
    http_response_code(400);
}
