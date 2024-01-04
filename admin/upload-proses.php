<?php 
include "../koneksi.php";
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

error_reporting();

if (isset($_POST['upload'])) {

  // $nm_dok         = $_POST['file'];
  $kd_dok         = $_POST['kd_dok'];
  $thn_dok         = $_POST['thn_dok'];
  $date            = date('Y-m-d');
  $id_fakultas     = $_POST['id_fakultas'];
  $id_prodi        = $_POST['id_prodi'];
  $id_jenis        = $_POST['id_jenis'];

  
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
    var_dump($insert);
    die();
    
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
