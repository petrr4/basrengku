<?php
require_once "../koneksi.php";

// Fungsi untuk mengambil kode pesanan terakhir dari database
function getLastKodePesanan() {
    global $koneksi;
    $query = "SELECT kode_pesanan FROM pesan ORDER BY tanggal_order DESC LIMIT 1";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['kode_pesanan'];
    } else {
        return "";
    }
}

echo getLastKodePesanan();
?>
