<?php include 'layout/header.php';?>
<!-- BEGIN: Body-->
<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='../index.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}

$id_user=$_SESSION["id_user"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
$email=$_SESSION["email"];

?>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
  data-menu="vertical-menu-modern" data-col="">
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>

  <?php include 'layout/nav.php'?>

  <?php include 'layout/menu.php'?>
  <?php
  include '../koneksi.php';
  //query univ
  $q_u = "SELECT * FROM dokumen WHERE id_univ LIKE 1";
  $result_univ = mysqli_query($kon, $q_u);
  $hasil_u = $result_univ->num_rows;

  //query fikes
  $q_f = "SELECT * FROM dokumen WHERE id_fakultas LIKE 1";
  $result_fikes = mysqli_query($kon, $q_f);
  $hasil_f = $result_fikes->num_rows;

  //query fikom
  $q_fikom = "SELECT * FROM dokumen WHERE id_fakultas LIKE 2";
  $result_fikom = mysqli_query($kon, $q_fikom);
  $hasil_fikom = $result_fikom->num_rows;

  //query feb
  $q_feb = "SELECT * FROM dokumen WHERE id_fakultas LIKE 3";
  $result_feb = mysqli_query($kon, $q_feb);
  $hasil_feb = $result_feb->num_rows;

  
  ?>
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
          <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>Universitas</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen
                      <?php if ($hasil_u) {?>
                      <span class="badge badge-pill badge-light-dark mr-1 lg"> <?php echo $hasil_u ?></span>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </a>
                  </h5>
                  <a href="dok_univ.php" type="button" class="btn btn-primary">Lihat</a>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>FIKES</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen
                      <?php if ($hasil_f) {?>
                      <span class="badge badge-pill badge-light-dark mr-1 lg"> <?php echo $hasil_f ?></span>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>FIKOM</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen
                      <?php if ($hasil_fikom) {?>
                      <span class="badge badge-pill badge-light-dark mr-1 lg"> <?php echo $hasil_fikom ?></span>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>FEB</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen
                      <?php if ($hasil_feb) {?>
                      <span class="badge badge-pill badge-light-dark mr-1 lg"> <?php echo $hasil_feb ?></span>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->
          </div>
        </section>
        <!-- Dashboard Ecommerce ends -->

        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
          <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>LPM</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen</a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>LP2M</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen</a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>BAU</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen</a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Medal Card -->
            <div class="col-xl-3 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h3>BAAK</h3>
                  <h5 class="mb-75 mt-2 pt-50">
                    <a href="javascript:void(0);">Total Dokumen</a>
                  </h5>
                  <button type="button" class="btn btn-primary">Lihat</button>
                  <!-- <img src="vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal"
                      alt="Medal Pic" /> -->
                </div>
              </div>
            </div>
            <!--/ Medal Card -->
          </div>
        </section>
        <!-- Dashboard Ecommerce ends -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include 'layout/footer.php'?>
