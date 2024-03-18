<?php 
require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <?php
      $username = $_POST['username'];
      $password = $_POST['password'];
      $phone_number = $_POST['phone_number'];
      $email = $_POST['email'];
      $password = password_hash($password,PASSWORD_DEFAULT);
     

      $sql = "INSERT INTO akun(username,password,phone_number,email) VALUES('$username','$password','$phone_number','$email')";



      if($koneksi->query($sql)===TRUE){
        header("Location: login.html");
        exit;
      }
      else{
        echo "Terjadi kesalahan".$sql."<br>".$koneksi->error;
      }

      ?>
    </div>
  </body>
</html>



//  <?php 
// require_once 'koneksi.php';
// 
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $username = $_POST['username'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // $phone_number = $_POST['phone_number'];
    // $email = $_POST['email'];
    // $level = $_POST['level'];
// 
    // $sql = "INSERT INTO akun(username, password, phone_number, email, level) VALUES (?, ?, ?, ?, ?)";
    // 
    // $stmt = $koneksi->prepare($sql);
    // $stmt->bind_param("sssss", $username, $password, $phone_number, $email, $level);
// 
    // if ($stmt->execute()) {
        // header("Location: login.html");
        // exit;
    // } else {
        // echo "Terjadi kesalahan" . $sql . "<br>" . $stmt->error;
    // }
// 
    // $stmt->close();
    // $koneksi->close();
// }
// ?>
