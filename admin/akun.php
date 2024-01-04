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
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Password</th>
                    <th style="text-align:center ;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    include "../koneksi.php";
                    $no = 1;
                    $data = mysqli_query($kon, "SELECT id_user,username,nama,email,level,password
                                                  FROM users ORDER BY id_user ASC");
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
                    <td><?php echo $hasil ['username'];?></td>
                    <td><?php echo $hasil ['nama'];?></td>
                    <td><?php echo $hasil ['email'];?></td>
                    <td>
                      <?php 
                      if ($hasil ['level']==1) {
                       echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">Administrator
                              </div>';
                      }elseif ($hasil ['level']==2) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">Rektor
                              </div>';
                      }elseif ($hasil ['level']==3) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">Wakil Rektor
                        </div>';
                      }elseif ($hasil ['level']==4) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">Dekan
                        </div>';
                      }elseif ($hasil ['level']==5) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">Kaprodi
                        </div>';
                      }elseif ($hasil ['level']==6) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">LPM
                        </div>';
                      }elseif ($hasil ['level']==7) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">BAU
                        </div>';
                      }elseif ($hasil ['level']==8) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">BAAK
                        </div>';
                      }elseif ($hasil ['level']==9) {
                        echo ' <div class="badge badge-pill badge-glow badge-success" style="color:black">LP2M
                        </div>';
                      }
                    ?>

                    </td>
                    <td>*****(passrod ter-encrypt)</td>
                    <td style="text-align:center ;">
                      <a href="#" type="button" class="open_modal btn btn-dark round btn-sm" data-toggle="modal"
                        data-target="#edit<?php echo $hasil['id_user']; ?>">Edit</a> |
                      <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm"
                        data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_user']; ?>">Hapus</a>
                    </td>
                  </tr>
                  <!-- MODAL EDIT -->
                  <div class="modal-size-lg d-inline-block">
                    <div class="modal fade text-left" id="edit<?php echo $hasil['id_user']; ?>" role="dialog"
                      aria-labelledby="myModalLabel17" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel110">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form class="form form-horizontal" action="" method="POST">
                              <?php
                              $id = $hasil['id_user']; 
                              $query_edit = mysqli_query($kon, "SELECT * FROM users WHERE id_user='$id' ");
                              while ($row = mysqli_fetch_array($query_edit)) {  
                              ?>
                              <input type="hidden" name="id_user" id="id_user" value="<?= $row['id_user']?>">

                              <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">
                                  <span class="badge badge-pill badge-light-success mr-1 lg"
                                    style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Username</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan username" value="<?php echo $row['username'];?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">
                                  <span class="badge badge-pill badge-light-success mr-1 lg"
                                    style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Nama</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukan Nama" value="<?php echo $row['nama'];?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="b" class="col-sm-3 col-form-label">
                                  <span class="badge badge-pill badge-light-success mr-1 lg"
                                    style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">E-mail</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="b" name="email"
                                    placeholder="Masukan email" value="<?php echo $row['email'];?>">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="s" class="col-sm-3 col-form-label">
                                  <span class="badge badge-pill badge-light-success mr-1 lg"
                                    style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Level
                                    Pengguna</span>
                                </label>
                                <div class="col-sm-9">
                                  <select name="level" id="s" class="js-example-basic-single form-select form-control"
                                    required>
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

                              <div class="form-group row">
                                <label for="c" class="col-sm-3 col-form-label">
                                  <span class="badge badge-pill badge-light-success mr-1 lg"
                                    style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Password</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="c" name="password"
                                    placeholder="Masukan Password" value="*****">
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-12 offset-sm-12 modal-footer">
                                  <button type="submit" class="btn btn-info mr-1 btn-sm" name="ubah">Simpan</button>
                                  <button type="close" class="btn btn-outline-danger btn-sm">Batal</button>
                                </div>
                              </div>
                              <?php 
                              }
                              ?>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END MODAL EDIT -->
                  <!-- MODAL HAPUS -->
                  <div id="deleteEmployeeModal<?php echo $hasil['id_user']; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="">
                          <?php
                            $id = $hasil['id_user']; 
                            $query_edit = mysqli_query($kon, "SELECT * FROM users WHERE id_user='$id'");
                            //$result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($query_edit)) {  
                            ?>
                          <input type="hidden" class="form-control" value="<?php echo $hasil['id_user']; ?>"
                            name="id_user" required>

                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Kamu akan menghapus Nama Situs <?php echo $hasil['username']; ?>?</p>
                          </div>
                          <div class="col-sm-12 offset-sm-12 modal-footer">
                            <button type="submit" class="btn btn-danger mr-1 btn-sm" name="delete">Hapus</button>
                            <button type="submit" class="btn btn-info mr-1 btn-sm" name="hapus" value="Batal"
                              data-dismiss="modal">Batal</button>
                          </div>
                          <?php 
                          }
                          //mysql_close($host);
                          ?>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- END MODAL HAPUS -->
                  <?php               
									} 
									?>
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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script> -->

  <?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="sijawir";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_user']) ? $_GET['id_user'] : null;
$id = $_POST['id_user'];
$user = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$level = $_POST['level'];
$password = md5($_POST['password']);
//query update
$query = mysqli_query($kon,"UPDATE users SET username='$user', nama='$nama', email='$email', level='$level', password='$password' WHERE id_user='$id' ") ;
echo "<input type='hidden'/>";
if ($query) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Data Berhasil Diubah!',
            timer: 3000,
            showCancelButton: false,
            showConfirmButton: false
          });
        </script>";
}else{
  echo "<script type='text/javascript'>
  Swal.fire({
    type: 'error',
    icon: 'error',
    title: 'Oops...',
    text: 'Data Gagal Diubah!',
  })
  .then(function() {
    window.location.href = 'akun.php';
  });
  
</script>";
}

}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_user']) ? $_GET['id_user'] : null;
  $id = $_POST['id_user'];
	//delete
	$sql = mysqli_query($kon,"DELETE FROM users WHERE id_user = '$id'");
  echo "<input type='hidden'/>";
	if($sql)
	{
    echo "<script type='text/javascript'>
    Swal.fire({
      position: 'top-end',
      type: 'success',
      title: 'Data Berhasil Dihapus!',
      timer: 3000,
      showCancelButton: false,
      showConfirmButton: false
    }) .then(function() {
      window.location.href = 'akun.php';
    });
  </script>";
	}else{
    echo "<script type='text/javascript'>
    Swal.fire({
      type: 'error',
      icon: 'error',
      title: 'Oops...',
      text: 'Data Gagal Dihapus!',
    });
    
  </script>";
	}

}

?>
