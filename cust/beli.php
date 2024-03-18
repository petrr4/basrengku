<?php
  require '../koneksi.php';

  //Mendapatkan id produk dari url
  $id_produk = $_GET['id'];

  //Apabila sudah ada produk di keranjang, maka jumlah produk +1
  if(isset($_SESSION['keranjang'][$id_produk])){
    $_SESSION['keranjang'][$id_produk]+=1;
  }

  //Apabila belum ada maka produk dibeli 1
  else {
    $_SESSION['keranjang'][$id_produk] = 1;
  }

  //Pindah Halaman 
  echo "<script>alert('Produk telah masuk ke keranjang belanja!!');</script>";
  echo "<script>location='keranjang.php'</script>";
?>