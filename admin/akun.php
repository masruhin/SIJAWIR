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

<?php include 'layout/header.php';?>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
  data-menu="vertical-menu-modern" data-col="">
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>

  <?php include 'layout/nav.php'?>

  <?php include 'layout/menu.php'?>
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Akun</h4>
              <a href="akun-tambah.php" type="button" class="btn btn-success">
                <i data-feather="user-plus" class="mr-25"></i>
                <span>Tambah Akun</span>
              </a>
            </div>
            <div class="card-body table-responsive">
              <table id="dataTables" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Unit</th>
                    <th>Tanggal dibuat</th>
                    <th>Tanggal di upadate</th>
                    <th style="text-align:center ;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>a</td>
                    <td>bb</td>
                    <td>cc</td>
                    <td style="text-align:center ;">
                      <a href="#" type="button" class="open_modal btn btn-outline-dark round btn-sm" data-toggle="modal"
                        data-target="#edit<?php echo $hasil['id_unit']; ?>">Edit</a> |
                      <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm"
                        data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_unit']; ?>">Hapus</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>
        <!-- users list ends -->
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include 'layout/footer.php'?>
