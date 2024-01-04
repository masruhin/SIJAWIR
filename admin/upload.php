<?php
include '../koneksi.php';
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

  // $nm_dok         = $_POST['file'];
  $kd_dok         = $_POST['kd_dok'];
  $thn_dok         = $_POST['thn_dok'];
  $date            = date('Y-m-d');
  $id_fakultas     = $_POST['id_fakultas'];
  $id_prodi        = $_POST['id_prodi'];
  $id_jenis        = $_POST['id_jenis'];
  $ket_dok        = $_POST['ket_dok'];

  
  $ekstensi_diperbolehkan    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
  $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);
  $nama2    = $_FILES['file']['name'];
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['file']['size'];
  $file_tmp    = $_FILES['file']['tmp_name']; 
  
  if ($nama2 == '') {
    $insert    = mysqli_query($kon, "INSERT INTO dokumen (kd_dok,
                                                          id_jenis,
                                                          id_fakultas,
                                                          id_prodi,
                                                          thn_dok,
                                                          ket_dok) 
    VALUES('$kd_dok','$id_jenis','$id_fakultas','$id_prodi','$thn_dok','$ket_dok')");
  //  echo $insert;
  //   die();
    
    if($insert){
      echo "<script type='text/javascript'>
      alert('Berhasil Tambah data.'); 
      document.location = 'beranda.php'; 
    </script>";
    }
    else{
      echo "<script type='text/javascript'>
      alert('Gagal Insert data.'); 
      document.location = 'upload.php'; 
    </script>";
    }
  }else {
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 304407000){ 
            move_uploaded_file($file_tmp, '../file' . $nama);
            $query    = mysqli_query($kon, "INSERT INTO dokumen (kd_dok,
                                                                nm_dok,
                                                                id_jenis,
                                                                id_fakultas,
                                                                id_prodi,
                                                                thn_dok,
                                                                ket_dok ) 
                                            VALUES('$kd_dok','$nama','$id_jenis','$id_fakultas','$id_prodi','$thn_dok','$ket_dok')");
            var_dump($query);
            die();
            if($query){
              echo "<script type='text/javascript'>
              alert('Berhasil Tambah data.'); 
              document.location = 'beranda.php'; 
            </script>";
            }
            else{
              echo "<script type='text/javascript'>
              alert('Gagal Insert data.'); 
              document.location = 'upload.php'; 
            </script>";
            }
        }
        else{
          echo "<script type='text/javascript'>
          alert('File Terlalu Besar'); 
          document.location = 'upload.php'; 
        </script>";
        }
    }
    else{
      echo "<script type='text/javascript'>
      alert('Berhasil'); 
      document.location = 'beranda.php'; 
    </script>";
    }
  }
}
if (isset($_POST['ubah'])) {
  $id = isset($_GET['id_kerjasama']) ? $_GET['id_kerjasama'] : null;
  $id = $_POST['id_kerjasama'];
  $negara_kat = $_POST['negara_kat'];
  $negara = $_POST['id_negara'];
  $status = $_POST['status_kerjasama'];
  $tawal = $_POST['tanggal_awal'];
  $takhir = $_POST['tanggal_akhir'];
  $fak = $_POST['id_fak'];
  $id_dok = $_POST['id_jenis_dok'];
  $judul = $_POST['judul_kerjasama'];
  $deskripsi = $_POST['deskripsi_kerjasama'];
  $ref = $_POST['no_ref_kerjasama'];
  $unit = $_POST['id_unit'];

  $ekstensi_diperbolehkan    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
  $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['file']['size'];
  $file_tmp    = $_FILES['file']['tmp_name']; 
  
  $query = "UPDATE instansi SET instansi_nama='$instansi_nama', situs_nama='$situs_nama' WHERE id_instansi='$id' ";
    if (mysqli_query($kon,$query)) {
    # credirect ke page unit
    echo "<script type='text/javascript'>
          alert('Berhasil Ubah data.'); 
          document.location = 'kerjasama.php'; 
        </script>";
    }else{
    echo "ERROR, data gagal diupdate". mysqli_error($kon);
    }
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_kerjasama']) ? $_GET['id_kerjasama'] : null;
  $id = $_POST['id_kerjasama'];
	//delete
	$sql = "DELETE FROM kerjasama WHERE id_kerjasama = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'kerjasama.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}
?>
<!DOCTYPE html>
<html lang="en">
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
                <?php
                include '../koneksi.php';
                  $q = "SELECT max(kd_dok) as maxKode FROM dokumen";
                  $hsl = mysqli_query($kon,$q);
                  $d = mysqli_fetch_array($hsl);
                  $kd_dok = $d['maxKode'];

                  $noUrut = (int) substr($kd_dok, 3, 5);
                  $noUrut++;

                  $char = "DOK";
                  $kd_dok = $char . sprintf("%03s", $noUrut);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-header">
                          <div class="accordion list-group-item list-group-item-action active" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                            aria-controls="accordionTwo"><span style="font-size: medium;"> Dokumen</span>
                          </div>
                          <div class="card-body list-group-item" id="accordionTwo">
                            <div class="row">
                              <!-- <input type="date" id="negara_ket" class="form-control" name="negara_ket" required /> -->
                              <div class="col-12">
                                <div class="mb-1">
                                  <p class="form-p" for="thn_dok">Pilih Tanggal Dokumen</p>
                                  <div class="input-group  ">
                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                    <input type="date" id="thn_dok" class="form-control" name="thn_dok" required />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body list-group-item" id="accordionTwo">
                            <div class="row">
                              <!-- <input type="date" id="negara_ket" class="form-control" name="negara_ket" required /> -->
                              <div class="col-12">
                                <div class="mb-1">
                                  <p class="form-p" for="kd_dok">Kode Dokumen</p>
                                  <div class="input-group  ">
                                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                                    <input type="text" id="kd_dok" class="form-control" name="kd_dok" readonly
                                      value="<?php echo $kd_dok;?>" />
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
                                    <span style="font-size: medium;">Fakultas</span>
                                  </div>
                                  <div class="col-sm-9">
                                    <select onchange="show_kabupaten()" class="form-control" name="id_fakultas"
                                      id="id_fakultas">
                                      <option value="">--------Pilih Fakultas--------</option>
                                      <?php
                                      include '../koneksi.php';
                                        $dataprovinsi = mysqli_query($kon, "SELECT * FROM fakultas");
                                        while ($provinsi = mysqli_fetch_array($dataprovinsi)) { ?>
                                      <option value="<?php echo $provinsi['id_fakultas'] ?>">
                                        <?php echo $provinsi['nm_fakultas'] ?></option>
                                      <?php 
                                        }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="col-12">
                                <div class="form-group row">
                                  <div class="col-sm-3 col-form-label">
                                    <span style="font-size: medium;">Prodi</span>
                                  </div>
                                  <div class="col-sm-9" id="list_prodi">
                                    <select class="form-control" name="id_prodi" id="id_prodi">
                                      <option value="">--------Pilih Prodi--------</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group row">
                                  <div class="col-sm-3 col-form-label">
                                    <span style="font-size: medium;">Jenis Dokumen</span>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                      </div>
                                      <div class="col-10">
                                        <select class="select2 form-control form-control-md" id="id_jenis"
                                          name="id_jenis">
                                          <option value="" selected="selected">-- Pilih Dokumen Kerjasama --</option>
                                          <?php
                                      $no = 1;
                                      $query =
                                          'SELECT * FROM dok_jenis ORDER BY id_jenis';
                                      $hasil = mysqli_query($kon, $query);
                                      while ($row = mysqli_fetch_array($hasil)) { ?>
                                          <option value="<?php echo $row[
                                          'id_jenis'
                                      ]; ?>">
                                            <?php echo $row['id_jenis'] .
                                            ' | ' .
                                            $row['nm_jenis']; ?></option>
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
                                    <span style="font-size: medium;">Pilih Dokumen</span>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i data-feather="lock"></i></span>
                                      </div>
                                      <input type="file" name="file" class="form-control" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group row">
                                  <div class="col-sm-3 col-form-label">
                                    <span style="font-size: medium;">Keterangan</span>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                      <textarea name="ket_dok" id="ket_dok" class="form-control" rows="4"
                                        placeholder="Ringkasan singkat terkait cakupan keterangan"></textarea>
                                    </div>
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
