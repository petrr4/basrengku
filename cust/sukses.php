<?php
session_start();
require_once "../koneksi.php";

if(isset($_SESSION["keranjang"])) {
    // Fetch the latest order details from the database
    $query = "SELECT * FROM pesan ORDER BY tanggal_order DESC LIMIT 1";
    $result = $koneksi->query($query);
    $order = $result->fetch_assoc();

    $totalHarga = 0;


    // Output the invoice details
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Tagihan</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .invoice {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            max-width: 600px;
            display: flex;
            flex-direction: column; /* Ubah menjadi column agar elemen rata ke tengah */
            align-items: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px; /* Tambahkan margin agar terlihat lebih rapi */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        header {
        position: fixed;
        top: 45px;
        left: 0;
        right: 0;
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        transform: translateY(-50%);
}

    </style>
    </head>
    <body>
    <header>
        <h1>Detail Pemesanan</h1>
    </header>
        <div class="invoice">
            <h2>Detail Produk</h2>
            <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { 
                    // Ambil informasi produk dari database
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perproduk = $ambil->fetch_assoc();

                    $subtotal = $perproduk['harga_produk'] * $jumlah;
                    $totalHarga += $subtotal;
                ?>
            <table>
                
                <tr>
                    <td>Nama Produk</td>
                    <td><?php echo $perproduk['nama_produk']; ?></td>
                </tr>
                
                <tr>
                    <td>Jumlah Produk</td>
                    <td><?php echo $jumlah; ?></td>
                </tr>            
            </table>
            <?php } ?>
        </div>

        <div class="invoice">
            <h2>Detail Pesanan</h2>
                <table>
                <tr>
                    <td>Kode Pesanan</td>
                    <td><?php echo $order['kode_pesanan']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Order</td>
                    <td><?php echo $order['tanggal_order']; ?></td>
                </tr>
                <tr>
                    <td>Nama Pembeli</td>
                    <td><?php echo $order['nama_order']; ?></td>
                </tr>
                <tr>
                    <td>Email Pembeli</td>
                    <td><?php echo $order['email']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Pengantaran</td>
                    <td><?php echo $order['alamat_produk']; ?></td>
                </tr>
                <tr>
                    <td>Nomor HP Pembeli</td>
                    <td><?php echo $order['nomorhp_order']; ?></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>Rp. <?php echo $totalHarga; ?></td>
                </tr>
                <tr>
                    <td>Status Order</td>
                    <td><?php echo $order['status_order']; ?></td>
                </tr>
                </table>
                <div style="text-align: center; margin-top: 20px;">
                <a href="download_tagihan.php" style="text-decoration: none; padding: 10px 20px; background-color: #3498db; color: #fff; border-radius: 5px;">Unduh Tagihan</a>
                <a href="home.php" style="text-decoration: none; padding: 10px 20px; background-color: #4CAF50; color: #fff; border-radius: 5px;">Back To Home</a>
</div>
    </body>
    </html>
    <?php
} else {
    // Redirect to the homepage or handle the case when there is no order
    header("Location: index.php");
    exit();
}
?>
