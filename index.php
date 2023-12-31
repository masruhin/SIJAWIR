<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<?php
		 function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			session_start();
			include "koneksi.php";
			$username = input($_POST["username"]);
			$p = input(md5($_POST["password"]));

			$sql = "select * from users where username='".$username."' and password='".$p."' limit 1";
			$hasil = mysqli_query ($kon,$sql);
			$jumlah = mysqli_num_rows($hasil);

			if ($jumlah>0) {
 
				$row = mysqli_fetch_assoc($hasil);
				$_SESSION["id_user"]=$row["id_user"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["nama"]=$row["nama"];
				$_SESSION["email"]=$row["email"];
				$_SESSION["level"]=$row["level"];
		
        
		
        echo "<input type='hidden'/>";
				if ($_SESSION["level"]=$row["level"]==1)
				{
          echo "<script type='text/javascript'>
                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam beberapa saat',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then(function() {
                    window.location.href = 'admin/beranda.php';
                  });
                </script>";
				} else if ($_SESSION["level"]=$row["level"]==2)
				{
				  echo "<script type='text/javascript'>
                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam beberapa saat',
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then(function() {
                    window.location.href = 'rektor/beranda.php';
                  });
                </script>";
				}else if ($_SESSION["level"]=$row["level"]==3){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'warek/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==4){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'dekan/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==5){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'kaprodi/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==6){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'lpm/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==7){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'bau/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==8){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'baak/beranda.php';
          });
        </script>";
				}else if ($_SESSION["level"]=$row["level"]==9){
          echo "<script type='text/javascript'>
          Swal.fire({
            type: 'success',
            title: 'Login Berhasil!',
            text: 'Anda akan di arahkan dalam beberapa saat',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
          })
          .then(function() {
            window.location.href = 'lp2m/beranda.php';
          });
        </script>";
				}
      }else {
        echo "<input type='hidden'/>";
        echo "<script type='text/javascript'>
        Swal.fire({
          type: 'error',
          title: 'Login Gagal!',
          text: 'Username dan Password salah!'
        });
      </script>";
			}

		}
	
	?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
      content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
      content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Lembaga Penjamin Mutu Universitas Bhamada Slawi</title>
    <link rel="apple-touch-icon" href="img/lpm.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/lpm.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="vendor/assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->

  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
              <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                <img src="" alt="">
                <h2 class="brand-text text-success ml-1">Lembaga Penjamin Mutu</h2>
              </a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                    src="vendor/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <h2 class="card-title font-weight-bold mb-1"><strong>Selamat Datang👋</strong> </h2>
                  <form class="auth-login-form mt-2" action="" method="POST">
                    <div class="form-group">
                      <label class="form-label" for="username"><strong>Username</strong> </label>
                      <input class="form-control" id="username" type="text" name="username"
                        placeholder="Masukan Username dengan benar.!" aria-describedby="username" autofocus=""
                        tabindex="1" />
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="login-username"><strong>Password</strong> </label>
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" name="password"
                          placeholder="············" aria-describedby="password" tabindex="2" />
                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                              data-feather="eye"></i></span></div>
                      </div>
                    </div>
                    <button type="submit" value="Login" class="btn btn-success btn-block" tabindex="4">Masuk</button>
                  </form>
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="vendor/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="vendor/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="vendor/app-assets/js/core/app-menu.js"></script>
    <script src="vendor/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- <script src="vendor/app-assets/js/scripts/pages/page-auth-login.js"></script> -->
    <!-- END: Page JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
    </script>
  </body>
  <!-- END: Body-->

</html>
