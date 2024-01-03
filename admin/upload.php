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
<link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/file-uploaders/dropzone.min.css">
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
      <div class="row match-height">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-bottom">
              <h4 class="card-title">Form Input Kerjasama</h4>
            </div>
            <div class="card-body">
              <form action="kerjasama_proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-header">
                        <div class="accordion list-group-item list-group-item-action active" type="button"
                          data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                          aria-controls="accordionTwo"><span>Tanggal Dokumen</span>
                        </div>
                        <div class="card-body list-group-item" id="accordionTwo">
                          <div class="row">
                            <!-- <input type="date" id="negara_ket" class="form-control" name="negara_ket" required /> -->
                            <div class="col-12">
                              <div class="mb-1">
                                <p class="form-p" for="tanggal_awal">Pilih Tanggal Dokumen</p>
                                <div class="input-group  ">
                                  <span class="input-group-text"><i data-feather="calendar"></i></span>
                                  <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal"
                                    required />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="col-md-12 col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                  <label for="fname-icon">Fakultas</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i data-feather="user"></i></span>
                                    </div>
                                    <input type="text" id="fname-icon" class="form-control" name="fname-icon"
                                      placeholder="Produ" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                  <label for="email-icon">Prodi</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i data-feather="mail"></i></span>
                                    </div>
                                    <input type="email" id="email-icon" class="form-control" name="email-id-icon"
                                      placeholder="Email" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                  <label for="contact-icon">Jenis Dokumen</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                    </div>
                                    <div class="col-10">
                                      <select class="select2 form-control form-control-md" name="id_jenis_dok">
                                        <option value="" selected="selected">-- Pilih Dokumen Kerjasama --</option>
                                        <?php
                                      $no = 1;
                                      $query =
                                          'SELECT * FROM jenis_dok ORDER BY id_jenis_dok';
                                      $hasil = mysqli_query($kon, $query);
                                      while ($row = mysqli_fetch_array($hasil)) { ?>
                                        <option value="<?php echo $row[
                                          'id_jenis_dok'
                                      ]; ?>">
                                          <?php echo $row['id_jenis_dok'] .
                                            ' | ' .
                                            $row['jenis_dok']; ?></option>
                                        <?php }
                                      ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                  <label for="pass-icon">Dokumen</label>
                                </div>
                                <div class="col-sm-9">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i data-feather="lock"></i></span>
                                    </div>
                                    <input type="file" id="pass-icon" class="form-control" name="contact-icon"
                                      placeholder="Password" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-9 offset-sm-3">
                              <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                  <label class="custom-control-label" for="customCheck2">Remember me</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 offset-sm-12 modal-footer">
                    <button type="submit" class="btn btn-info mr-1 btn-sm" name="upload">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include 'layout/footer.php'?>
