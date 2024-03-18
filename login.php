<?php
					require_once("koneksi.php");

					if (isset($_POST['btnlogin'])) {
						$email = $_POST['email'];
						$pass_login = $_POST['password'];

						$sql = "SELECT * FROM akun WHERE email = '$email'";
						$query = mysqli_query($koneksi, $sql);
						$data = mysqli_fetch_assoc($query);
						$cek = mysqli_num_rows($query);

						if ($cek == 1) {
							if (!empty($data) && (password_verify($pass_login, $data['password']) || password_verify($pass_login, $new_password))) 
								{
								// Proses login sukses
								if ($data['email'] == 'admin@7') {
									$_SESSION['username'] = $data['username'];
									$_SESSION['phone_number'] = $data['phone_number'];
									$_SESSION['email'] = $data['email'];
									header('location:./admin/index.php');
									exit();
								} else {
									$_SESSION['username'] = $data['username'];
									$_SESSION['phone_number'] = $data['phone_number'];
									$_SESSION['email'] = $data['email'];
									header('location:./cust/home.php');
									exit();
								}
							} else {
								// Password salah
								echo "
            <script>
                alert('Password salah. Silahkan login kembali');
                document.location.href = 'login.html';
            </script>
            ";
							}
						} else {
							// Username tidak ditemukan
							echo "
        <script>
            alert('email tidak ditemukan. Silakan login kembali');
            document.location.href = 'login.html';
        </script>
        ";
						}
					}
					?>