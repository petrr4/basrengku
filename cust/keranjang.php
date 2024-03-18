<?php
  session_start();
  require_once("../koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout</title>
  <link rel="stylesheet" href="../css/checkout.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  
</head>
<body>
  <header>
    <h1>Checkout</h1>
  </header>
  <main>
    
    <section class="review-order">
    <div class="container">    
    <h2>Review your order</h2>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $nomor = 1;
              $totalbelanja = 0;
              foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
              
              <?php 
              $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $pecah = $ambil->fetch_assoc();
              $totalharga = $pecah["harga_produk"]*$jumlah;
              ?>

              <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $pecah["nama_produk"]; ?></td>
                <td>Rp. <?php echo number_format ($pecah["harga_produk"]); ?></td>
                <td>
                  <?php echo $jumlah; ?>&nbsp;
                  <a class="btn btn-primary" style="padding:5px;" href="update-cart.php?action=add&id=<?php echo $id_produk; ?>">+</a>&nbsp;
                  <a class="btn btn-danger" style="padding:5px;" href="update-cart.php?action=remove&id=<?php echo $id_produk; ?>">-</a>
                </td>

                <td><?php echo $totalharga;?></td>
              </tr>
              <?php $nomor++; ?>
              <?php $totalbelanja += $totalharga;?>
              <?php endforeach?>
            </tbody>
        </table>

        <section class="shipping-address">
          <form action="order.php" method="POST">
          <h2>Shipping Address</h2>
          <input type="text" name="nama_order" placeholder="Full name" required>
          <input type="text" name="alamat_produk" placeholder="Address line" required>
          <input type="number" name="nomorhp_order" placeholder="active phone number" required>
          <input type="submit" name="submit" value="Submit Order">
          </form>
        </section>
        
        </div>
        <p id="totalAmount">Total: Rp. <?php echo number_format($totalbelanja)?></p>
        <ul id="orderedItems"></ul>
        <form method="POST">
        <a href="cart.php" class="btn btn-primary">Kembali ke Produk</a>
        <?php
         if(isset($_SESSION['username'])) {
            echo '<a href="thankyou.php" class="btn btn-success">Place Order</a>';
          }
          

          else {
            echo '<a href="login.html" class="btn btn-danger">Login</a>';
          }
          ?>
        </form>
      </section>
  </main>
  

  <script src="../js/jquery.js"></script>
  <script src="../js/cart.js"></script>
</body>
</html>