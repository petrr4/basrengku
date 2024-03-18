<?php
session_start();
require_once "../koneksi.php";

if (isset($_SESSION["keranjang"])) {
    // Load TCPDF library
    require_once('../tcpdf/tcpdf.php');

    // Fetch the latest order details from the database
    $query = "SELECT * FROM pesan ORDER BY tanggal_order DESC LIMIT 1";
    $result = $koneksi->query($query);
    $order = $result->fetch_assoc();

    $totalHarga = 0;

    // Create PDF
    $pdf = new TCPDF();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    // Add content to PDF
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Detail Pemesanan', 0, 1, 'C');

    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
        // Fetch product information from the database
        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();

        $subtotal = $perproduk['harga_produk'] * $jumlah;
        $totalHarga += $subtotal;

        $pdf->Cell(0, 10, 'Nama Produk: ' . $perproduk['nama_produk'], 0, 1);
        $pdf->Cell(0, 10, 'Jumlah Produk: ' . $jumlah, 0, 1);
        $pdf->Ln();
    }

    $pdf->Cell(0, 10, 'Detail Pesanan', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Kode Pesanan: ' . $order['kode_pesanan'], 0, 1);
    $pdf->Cell(0, 10, 'Tanggal Order: ' . $order['tanggal_order'], 0, 1);
    $pdf->Cell(0, 10, 'Nama Pembeli: ' . $order['nama_order'], 0, 1);
    $pdf->Cell(0, 10, 'Email Pembeli: ' . $order['email'], 0, 1);
    $pdf->Cell(0, 10, 'Alamat Pengantaran: ' . $order['alamat_produk'], 0, 1);
    $pdf->Cell(0, 10, 'Nomor HP Pembeli: ' . $order['nomorhp_order'], 0, 1);
    $pdf->Cell(0, 10, 'Total Harga: Rp. ' . $totalHarga, 0, 1);
    $pdf->Cell(0, 10, 'Status Order: ' . $order['status_order'], 0, 1);

    // Output PDF to browser
    $pdf->Output('tagihan_' . $order['kode_pesanan'] . '.pdf', 'I');
    exit();
} else {
    // Redirect to the homepage or handle the case when there is no order
    header("Location: index.php");
    exit();
}
?>
