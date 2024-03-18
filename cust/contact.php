<!-- 
// require_once '../koneksi.php';
// 
// if(isset($_POST['btngo']))
// {
    // $nama = $_POST['nama'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    // $rate = $_POST['rate'];
    // $pesan = $_POST['pesan'];
// 
    // $sql = "INSERT INTO review(nama,email,phone,rate,pesan) VALUES ('$nama', '$email', '$phone','$rate', '$pesan')";
// }
// ?> -->



<?php 
require_once '../koneksi.php';
?>

<?php 
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rate = $_POST['rate'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO review(nama,email,phone,rate,pesan) VALUES ('$nama', '$email', '$phone','$rate', '$pesan')";

    if($koneksi->query($sql)===TRUE){
        
      
      }
      else{
        echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terima Kasih</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
        <h1 style="color: green;">Terimakasih Atas Review Anda</h1>
        <button style="margin-top: 20px;" onclick="location.href='home.php'" class="btn" name="btngo">Back To Home</button>
    </div>


</body>
</html>