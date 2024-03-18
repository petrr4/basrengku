<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'basreng';

$conn = mysqli_connect($host, $user, $pass, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$new_password = $_POST['new_password'];
$id = $_POST['id'];

$new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
$query = "UPDATE akun SET password = '$new_password_hashed' WHERE id = $id";
$result = mysqli_query($conn, $query);

$test = mysqli_affected_rows($conn);

if ($test > 0) {
    echo "
    <script>
        alert('Password berhasil diubah');
        document.location.href = 'login.html';
    </script>";
}
else {
    echo "
    <script>
        alert('Password gagal diubah');
        document.location.href = 'reset_password.html';
    </script>";
    echo mysqli_error($conn);
}

?>