<?php
  require '../koneksi.php';

  // Mendapatkan id produk dari URL
  $id_produk = $_GET['id'];

  // Jika parameter 'action' ada dan bernilai 'add', tambahkan 1 ke jumlah produk
  if(isset($_GET['action']) && $_GET['action'] == 'add'){
    if(isset($_SESSION['keranjang'][$id_produk])){
      $_SESSION['keranjang'][$id_produk] += 1;
    } else {
      $_SESSION['keranjang'][$id_produk] = 1;
    }
  }

  // Jika parameter 'action' ada dan bernilai 'remove', kurangkan 1 dari jumlah produk
  if(isset($_GET['action']) && $_GET['action'] == 'remove'){
    if(isset($_SESSION['keranjang'][$id_produk])){
      // Kurangkan 1 dari jumlah produk
      $_SESSION['keranjang'][$id_produk] -= 1;

      // Jika jumlah produk menjadi 0, hapus dari keranjang
      if ($_SESSION['keranjang'][$id_produk] == 0) {
        unset($_SESSION['keranjang'][$id_produk]);
      }
    }
  }

  // Pindah Halaman 
  echo "<script>location='keranjang.php'</script>";
?>