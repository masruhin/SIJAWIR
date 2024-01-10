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
        <section id="faq-search-filter">
          <div class="card faq-search" style="background-image: url('../vendor/app-assets/images/banner/banner.png')">
            <div class="card-body text-center">
              <!-- main title -->
              <h2 class="text-primary">Pencarian Dokumen Universitas</h2>

              <!-- subtitle -->
              <p class="card-text mb-2">Pilih Tahun untuk melakukan pencarian data</p>

              <!-- search input -->
              <form class="faq-search-input">
                <div class="col-md-4 col-12 mb-1">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-sm btn-info" type="button">
                        <i data-feather="search"></i>
                      </button>
                    </div>
                    <input type="text" name="tahun" id="tahun" class="form-control flatpickr-basic"
                      placeholder="YYYY-MM-DD" />
                    <div class="input-group-append">
                      <input class="btn btn-sm btn-primary" type="submit" value="FILTER">Cari !</input>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </section>
        <section class="app-user-list">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Dokumen Universitas</h4>
            </div>
            <div class="card-body table-responsive">
              <table id="dok_univ" class="table table-striped">
                <thead>

                  <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Jenis Dokumen</th>
                    <th>Tahun Dokumen</th>
                    <!-- <th>Fakultas</th>
                    <th>Prodi</th> -->
                    <th style="text-align:center ;">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  include "../koneksi.php";
                  $no = 1;
                  if (isset($_GET['tahun'])) {
                    $thn = $_GET['tahun'];
                    $data = mysqli_query($kon, "SELECT a.id_dok, a.id_univ,a.kd_dok,a.nm_dok,a.id_jenis,
                                                      a.id_prodi,a.thn_dok, a.ket_dok,b.nm_jenis,c.nm_fakultas,
                                                      d.nm_prodi 
                                                    FROM
                                                    dokumen a
                                                    LEFT JOIN dok_jenis b ON b.id_jenis = a.id_jenis
                                                    LEFT JOIN fakultas c ON c.id_fakultas = a.id_fakultas
                                                    LEFT JOIN prodi d ON d.id_prodi = a.id_prodi
                                                    WHERE thn_dok = '$thn' OR a.id_univ = 1");
                  }else {
                    $data = mysqli_query($kon, "SELECT a.id_dok,
                    a.id_univ,
                    a.kd_dok,
                    a.nm_dok,
                    a.id_jenis,
                    a.id_fakultas,
                    a.id_prodi,
                    a.thn_dok,
                    a.ket_dok,
                    b.nm_jenis,
                    c.nm_fakultas,
                    d.nm_prodi 
                  FROM
                    dokumen a
                    LEFT JOIN dok_jenis b ON b.id_jenis = a.id_jenis
                    LEFT JOIN fakultas c ON c.id_fakultas = a.id_fakultas
                    LEFT JOIN prodi d ON d.id_prodi = a.id_prodi
                    WHERE a.id_univ = 1");
                  }
                   
                    if (!$data) {
                      printf("Error: %s\n", mysqli_error($kon));
                      exit();
                    }
                    while($hasil = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td><?php echo $hasil ['nm_dok'];?></td>
                    <td><?php echo $hasil ['nm_jenis'];?></td>
                    <td><?php echo $hasil ['thn_dok'];?></td>
                    <!-- <td><?php echo $hasil ['nm_fakultas'];?></td>
                    <td><?php echo $hasil ['nm_prodi'];?></td> -->
                    <td>
                      <button type="button" class="open_modal btn btn-sm btn-relief-primary round" data-toggle="modal"
                        data-target="#view<?php echo $hasil['id_dok']; ?>">Lihat</button>
                      <a class="btn btn-sm btn-relief-info round"
                        href="kerjasama_edit.php?id_dok=<?php echo $hasil['id_dok']?>" role="button">Edit</a>
                      <!-- <button type="button" class="open_modal btn btn-sm btn-relief-danger round" data-toggle="modal"
                        data-target="#deleteEmployeeModal<?php echo $hasil['id_dok']; ?>">Hapus</button> -->
                    </td>
                  </tr>
                  <?php } ?>
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
