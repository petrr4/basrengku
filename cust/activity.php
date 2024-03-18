<?php
session_start();

require_once "../koneksi.php";

// Cek apakah pengguna sudah login
if (empty($_SESSION['username'])) {
    header("Location:error.php");
    exit(); // Ensure script stops execution after redirection
}

$email_pengguna = $_SESSION['email']; // Mengambil email dari sesi

// Lakukan koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'basreng');

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mendapatkan histori pesanan berdasarkan email pengguna dari tabel akun
$sql = "SELECT pesan.id, pesan.id_produk, pesan.nama_produk, pesan.jumlah_produk, pesan.tanggal_order, pesan.total_harga, pesan.status_order 
        FROM pesan 
        INNER JOIN akun ON pesan.email = akun.email 
        WHERE akun.email = '$email_pengguna'";
$hasil = mysqli_query($koneksi, $sql);
if (!$hasil) {
    die("Error: " . mysqli_error($koneksi)); // Menampilkan pesan error
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>

    <!-- Bootstrap CSS (Assuming you have Bootstrap included) -->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .title-container {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #007bff;
        }

        .table {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            margin-top: 20px;
            color: #555;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title-container">
        <h1>History Pemesanan Anda</h1>
    </div>

    <?php if ($hasil && mysqli_num_rows($hasil) > 0) { ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Id Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($data = mysqli_fetch_assoc($hasil)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['id_produk']; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td><?php echo $data['jumlah_produk']; ?></td>
                            <td><?php echo $data['tanggal_order']; ?></td>
                            <td><?php echo $data['total_harga']; ?></td>
                            <td><?php echo $data['status_order']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="home.php" class="btn btn-primary back-btn">Back to Home</a>
            </div>
        </div>
    <?php } else { ?>
        <p class="no-data">Tidak ada histori pesanan untuk email tersebut.</p>
        <div class="row">
            <div class="col-12 text-center">
                <a href="home.php" class="btn btn-primary back-btn">Back to Home</a>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
