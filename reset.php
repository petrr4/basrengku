<?php
//koneksi ke database (sesuaikan dengan kebutuhan)
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'basreng';

$conn = mysqli_connect($host, $user, $pass, $database);

//cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="./css/reset password.css">
</head>
<body>

<div class="wrapper">
     <div class="container">
         <div class="title-section">

         <?php

$email = $_POST['email'];

$query = "SELECT * FROM akun WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);



if (mysqli_num_rows($result) > 0) : ?>
             <h2 class="title">Reset Password</h2>
             <p class="para">enter your mail send link your mail please check and verify
                 if your mail before account create you have a link inbox. Click link & your New Password
             </p>
         </div>
         <form action="reset_password.php" class="from" method="post">
             <div class="input-group">
                <input type="text" name="id" value="<?= $row['id']?>" hidden>
                 <label for="new_password" class="label-title">Enter New Password</label>
                 <input type="password" name="new_password" placeholder="Enter new password">
                 <span class="icon">&#9993;</span>
             </div>
             <div class="input-group">
                 <button class="submit-btn" type="submit">Send Reset Password</button>
             </div>
         </form>
     </div>
 </div>


    <?php else : ?>

    <h2>Email tidak terdaftar</h2>

    <?php endif; ?>
</body>
</html>