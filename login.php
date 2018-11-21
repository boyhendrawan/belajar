

<?php 
session_start();

require('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/apple.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="Nomor" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="simpan">
							Login
						</button>
					</div>

					<?php 
              if (isset($_POST['simpan'])) {

                $user=$_POST['username'];
                $nomor=$_POST['Nomor'];


                $ambil=$koneksi->query("SELECT * FROM DISTRIBUTOR WHERE NAMA_DISTRIBUTOR ='$user' AND PASSWORD = '$nomor'");

                $akunygcocok=$ambil->num_rows;
                
                $ambil1=$koneksi->query("SELECT * FROM DISTRI WHERE  USERNAME='$user' AND PASSWORD='$nomor'");
                $akunyg=$ambil1->num_rows;  

                if ($akunygcocok==1) 
                { 
                  $akun =$ambil->fetch_assoc();
                  $_SESSION["DISTRIBUTOR"]= $akun;

                  echo "<script>alert('anda telah login');</script>";
                  echo "<script>location='checkout.php';</script>";
                }
                 elseif ($akunyg==1) {
                    $akunZ =$ambil1->fetch_assoc();
                    $_SESSION["DISTRI"]= $akunZ;
                    echo "<script>alert('anda telah login');</script>";
                    echo "<script>location='key.php';</script>";
                    
                }
                else
                {
                  echo "<script>alert('anda gagal login, periksa akun anda');</script>";
                  echo "<script>location='login.php';</script>";
                }

              }
              ?>

					<div class="text-center p-t-136">
						<a class="txt2" href="index.php">
							Back To Home
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

