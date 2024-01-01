<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<?php include 'layout/header.php';?>
<?php include '../koneksi.php';?>
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



if (isset($_POST['upload'])) {
  $user = $_POST['username'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $level = $_POST['level'];
  $password = md5($_POST['password']);
  $tambah = mysqli_query($kon, "INSERT INTO users (username, nama, email, level, password) 
                                VALUES ('$user',
                                        '$nama',
                                        '$email',
                                        '$level',
                                        '$password')");
  
  echo "<input type='hidden'/>";
  if ($tambah) {
    echo "<script type='text/javascript'>
                  Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Data Berhasil Ditambah!',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then(function() {
                    window.location.href = 'akun.php';
                  });
                </script>";
  }else{
		echo "<script type='text/javascript'>
            Swal.fire({
              type: 'error',
              icon: 'error',
              title: 'Oops...',
              text: 'Data Tidak berhasil disimpan!',
            })
            .then(function() {
              window.location.href = 'akun-tambah.php';
            });
            
    </script>";
	}
}
?>
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
        <div class="col-md-8 col-8">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Form Tambah Akun</h4>
            </div>
            <div class="card-body">
              <form class="form form-vertical" action="" method="POST">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label >Username</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i data-feather="user"></i></span>
                        </div>
                        <input type="text" id="username" class="form-control" name="username"
                          placeholder="Masukan Username untuk login " required/>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label >Nama</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i data-feather="tag"></i></span>
                        </div>
                        <input type="text" id="nama" class="form-control" name="nama"
                          placeholder="Masukan Nama Pengguna" required/>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Email</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i data-feather="mail"></i></span>
                        </div>
                        <input type="email" id="email" class="form-control" name="email"
                          placeholder="Masukan Email aktif pengguna" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label >Level User</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i data-feather="chevrons-down"></i></span>
                        </div>
                        <div class="col-10">
                        <select name="level" class="js-example-basic-single form-select form-control" required>
                          <option value="1">1 | Admin</option>
                          <option value="2">2 | Rektor</option>
                          <option value="3">3 | Wakil Rektor</option>
                          <option value="4">4 | Dekan</option>
                          <option value="5">5 | KAPRODI</option>
                          <option value="6">6 | LPM</option>
                          <option value="7">7 | BAU</option>
                          <option value="8">8 | BAAK</option>
                          <option value="9">9 | LP2M</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label >Password</label>
                      <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i data-feather="lock"></i></span>
                        </div>
                        <input type="text" id="password-icon" class="form-control" name="password"
                          placeholder="Password" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-1" name="upload">Kirim</button>
                    <a type="button" href="akun.php" class="btn btn-info">Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-4">

        </div>
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include 'layout/footer.php'?>
