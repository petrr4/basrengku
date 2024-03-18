<?php
  require_once("../koneksi.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
                @import url(https://fonts.google.com/specimen/Sen);
        
        /* Gaya untuk card */
        .card {
            background-color: #FFFFFF; /* Warna latar belakang card */
            border: 1px solid #ddd; /* Border card */
            border-radius: 10px; /* Sudut card membulat */
            margin: 30px;
        }

        .img {
            border-radius: 10px;
        }

        .card-title {
            color: #333; /* Warna judul card */
            font-size: 1.5rem; /* Ukuran judul card */
        }

        .card-text {
            color: #555; /* Warna teks pada card */
        }

        .p {
          margin: 30px;
          color: grey;
        }

    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card img {
        width: 100%;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card .card-body {
        text-align: center;
    }

    </style>
</head>
<body>
        <div class="container">
        <a type="button" class="btn btn-success mt-5" href="home.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg>
        </a>
        </div>

        <div class="container">
        <h2 class="text-center mx auto">Your Shopping Cart</h2>
        </div>

        <!-- Ini adalah card -->
        <section class="konten">
    <div class="container">
        <div class="row">
            <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
            <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="../assets/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-fluid">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $perproduk['nama_produk']; ?></h3>
                            <h5 class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


        <!-- Footer Website -->
        <div class="container">
        <div class="row">
            <p class="p mx-auto"><i>E-commerce, Basrengku;</i></p>
        </div>
        </div>
    </section>
    <script src="../jquery.js"></script>
    <script src="../bootstrap.js"></script>
    
</body>
</html>