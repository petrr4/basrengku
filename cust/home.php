<?php
require_once "../koneksi.php";
   if(empty($_SESSION['username'])){
     header("Location:../error.php");
   }
?>

 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="../css/home.css">
        <link href="../admin.vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <title>Home Page</title>
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <style>
            .user-info-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-right: 20px; /* Adjust the margin as needed */
    }
    .user-info {
        text-align: center;
    }

    .username {
        display: block;
        margin-top: 0;
        margin-bottom: 10px;
        font-weight: bold;
        font-family: 'Arial', sans-serif; 
        font-size: 16px;
        color: #455; 
    }
    .button {
        display: flex;
        padding: 10px 20px;
        font-size: 16px;
        text-align: right;
        text-decoration: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #FF0000;
    }

</style>
       
    </head>
    <body>
        <!--home header navbar-->
        <header>
            <a href="#" class="logo">
                <img src="../assets/icon.jpg" alt="Logo" />
            </a>

            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="cart.php">product</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
                <a href="activity.php">Riwayat Pembelian</a>
            </nav>
            <div class="icons">
                <a href="keranjang.php" class="fas fa-shopping-cart"></a>
            </div>
            <div class="user-info-container">
            <a class="button" href="#" onclick="confirmLogout()">Logout</a>
                </div>
                    <script>
                        function confirmLogout() {
                        var confirmation = confirm("Apakah Kamu Yakin Ingin Logout?");
                            if (confirmation) {
                                window.location.href = "logout.php";
                            }
                        }
                    </script>
                <form action="upload_profile_picture.php" method="post" enctype="multipart/form-data">
                <label for="fileInput" class="dropdown-item">
                <i class=""></i>
                </label>

                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-info dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="username">
                        <?php
                        echo $_SESSION['username'];
                        ?>
                    </span>
                    
                    <?php
                    $username = $_SESSION['username'];
                    $query = "SELECT profile_picture FROM akun WHERE username='$username'";
                    $result = mysqli_query($koneksi, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $profilePicturePath = $row['profile_picture'];
                    
                        // Menampilkan gambar profil
                        echo "<img src='$profilePicturePath' alt='Profil Pengguna' style='width: 80px; height: 80px; border-radius: 50%;' class='img-profile rounded-circle'>";
                    } else {
                        echo "Gagal mengambil informasi profil pengguna.";
                    }
                    
                    ?>
                    </a>
                    </div>
                    <form action="upload_profile_picture.php" method="post" enctype="multipart/form-data">
                        <label for="fileInput" class="dropdown-item">
                            <i class="fas fa-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Foto Profil
                            <input type="file" name="profile_picture" accept="image/*" id="fileInput" style="display: none;">
                        </label>
                            <input type="submit" value="Upload" class="dropdown-item">
                    </form>
                    
        </header>

        <section class="home" id="home">

            <div class="content">
                <h3>Welcome To Our Store</h3>
                <span>eat something</span>
                <p>Silahkan Memilih Jajanan Kesukaan Kamuuu</p>
                <a href="cart.php" class="btn">shop now</a>
            </div>

        </section>

        <section class="about" id="about">

            <h1 class="heading">  about  us </h1>
            
            <div class="row">

                <div class="content" id="about">
                    <h3>why chose us?</h3>
                    <p>karena kami adalah website penyedia
                        basreng, kami bisa membuat anda beli secara real time
                        dan diantar dengan cepat setelah membeli makanan</p>
                    <a href="learn more.html" class="btn">learn more</a>
                    </p>
                </div>
            </div>

        </section>

        <section class="product" id="product">
            <h1 class="heading"> <span>Our</span> Products </h1>

            <div class="card">
                <div class="imgBox">
                    <img src="../assets/basreng.jpg" alt="basreng" class="basreng">
                </div>
                <div class="contentBox">
                    <h3>Basreng</h3>
                    <h2 class="price">RP.25.000</h2>
                    <a href="cart.php" class="buy">Add To Cart</a>
                </div>
            </div>
        
            <div class="card">
                <div class="imgBox">
                    <img src="../assets/makaroni.jpg" alt="makaroni" class="makaroni">
                </div>
                <div class="contentBox">
                    <h3>Makaroni</h3>
                    <h2 class="price">RP.30.000</h2>
                    <a href="cart.php" class="buy">Add To Cart</a>
                </div>
            </div>

            <div class="card">
                <div class="imgBox">
                    <img src="../assets/keripik.jpg" alt="keripik" class="keripik">
                </div>
                <div class="contentBox">
                    <h3>Keripik</h3>
                    <h2 class="price">RP.20.000</h2>
                    <a href="cart.php" class="buy">Add To Cart</a>
                </div>
            </div>
        
        </section>

        <section class="review" id="review">
            <h1 class="heading"> <span>Review</span> Customer </h1>

            <?php include('get_review.php'); ?>
            <?php while ($row = $featured_review->fetch_assoc()) { ?>

            <div class="col">
                <div class="reviews">
                    <img src="../assets/<?php echo $row['foto']; ?>" alt="">
                            <div class="name"><?php echo $row['nama']; ?></div>
                            <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            </div>

                            <p>
                            <?php echo $row['pesan']; ?>
                            </p>
                        </div>
                    </div> 
                </div>
                <?php } ?>

              
            
                <div class="col">
                    <div class="reviews" id="review">
                        <img src="../assets/laki2.jpg" alt="">
                        <div class="name">Contact US</div>
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        </div>

                        <p>
                           Kirim review kamu <a href="contact.html">DI SINI YAAA</a>                                                            
                        </p>
                    </div>
                </div> 
            </div>
        
        </section>

        <footer class="footer">
            <div class="container-footer">
             <div class="row-footer">
               <div class="footer-col" id="contact">
                 <h4>Website Contact</h4>
                 <ul>
                   <li><a>snacksales@gmail.com</a></li>
                   <li><a>(+62)85930446417</a></li>
                 </ul>
               </div>
               <div class="footer-col">
                 <h4>online shop</h4>
                 <ul>
                   <li><a>snack</a></li>
                   <li><a>food</a></li>
                 </ul>
               </div>
               <div class="footer-col">
                 <h4>follow us</h4>
                 <div class="social-links">
                   <a href="https://m.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                   <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                   <a href="https://www.instagram.com/basrengku.iid/"><i class="fab fa-instagram"></i></a>
                 </div>
               </div>
             </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>