<?php
include '../koneksi.php';
?>
<?php
if (isset($_POST['create'])) {
  $nama_user = $_POST['nama_user'];
  $id_provinsi = $_POST['id_provinsi'];
  $id_kabupaten = $_POST['id_kabupaten'];
  $id_kecamatan = $_POST['id_kecamatan'];
  $alamat_user = $_POST['alamat_user'];
  $tgl_lahir = $_POST['tgl_lahir'];

  $insert_data = "INSERT INTO tb_users (nama_user, alamat, tgl_lahir, id_provinsi, id_kabupaten, id_kecamatan) VALUES ('$nama_user','$alamat_user', '$tgl_lahir', '$id_provinsi', '$id_kabupaten', '$id_kecamatan')";
  $data_file = mysqli_query($kon, $insert_data);
  if($data_file){
        echo "Sukses";
    }else{
        die("Query Error : ".mysqli_error($kon));
    }
  header('location: ../index.php');
 }
?>

<?php
if (isset($_POST['update'])) {
  $nama_user = $_POST['nama_user'];
  $id_provinsi = $_POST['id_provinsi'];
  $id_kabupaten = $_POST['id_kabupaten'];
  $id_kecamatan = $_POST['id_kecamatan'];
  $alamat_user = $_POST['alamat_user'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $id_users = $_POST['id_users'];

  $update_data = "UPDATE tb_users SET nama_user='$nama_user',alamat='$alamat_user',tgl_lahir='$tgl_lahir',id_provinsi='$id_provinsi',id_kabupaten='$id_kabupaten',id_kecamatan='$id_kecamatan' WHERE id_users='$id_users'";
  $data_file = mysqli_query($kon, $update_data);
  if($data_file){
        echo "Sukses";
    }else{
        die("Query Error : ".mysqli_error($kon));
    }
  header('location: ../index.php');
 }
?>

<?php
if ($_GET['aksi']=='hapus') {
  $id_users = $_GET['id_users'];

  $update_data = "DELETE FROM tb_users WHERE id_users='$id_users'";
  $data_file = mysqli_query($kon, $update_data);
  if($data_file){
        echo "Sukses";
    }else{
        die("Query Error : ".mysqli_error($kon));
    }
  header('location: ../index.php');
 }
?>

<?php 
if ($_GET['aksi']=='provinsi') {
$id_fakultas = $_GET["id_fakultas"];
echo '<select class="form-control" name="id_prodi" id="id_prodi>
                     <option value="" readonly>--------Pilih Prodi--------</option>';
$datakabupaten = mysqli_query($kon, "SELECT * FROM prodi WHERE id_fakultas='$id_fakultas'");
while ($kabupaten = mysqli_fetch_array($datakabupaten)) {

   echo "<option value='".$kabupaten['id_prodi']."'>".$kabupaten['nm_prodi']."</option>";
}
}
?>
