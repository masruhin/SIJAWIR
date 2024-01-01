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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
  <script src="../vendor/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>

  <script type="text/javascript">
        // fungsi untuk menghitung total bayar pada form tambah
        function hitung_total_bayar(input) {
            var harga  = $('#harga_barang').val();
            var jumlah = $('#jumlah_beli').val();

            if (jumlah=='') {
                var total = '';
            } else {
                var total = harga * jumlah;
            }
            $('#total_bayar').val(total);
        }

        // fungsi untuk menghitung total bayar pada form ubah
        function hitung_total_bayar_ubah(input) {
            var harga  = $('#harga_barang_ubah').val();
            var jumlah = $('#jumlah_beli_ubah').val();

            if (jumlah=='') {
                var total = '';
            } else {
                var total = harga * jumlah;
            }
            $('#total_bayar_ubah').val(total);
        }

        $(document).ready(function(){
            // initiate plugin ====================================================================================
            // ----------------------------------------------------------------------------------------------------
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            // dataTables plugin
            $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
            // ====================================================================================================

            // Tampil Data ========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // datatables serverside processing
            var table = $('#dataTables').DataTable( {
                "bAutoWidth": false,
                "scrollY": '58vh',
                "scrollCollapse": true,
                "processing": true,
                "serverSide": true,
                "ajax": 'data_transaksi.php',     // panggil file data_transaksi.php untuk menampilkan data transaksi dari database
                "columnDefs": [ 
                    { "targets": 0, "data": null, "orderable": false, "searchable": false, "width": '30px', "className": 'center' },
                    { "targets": 1, "width": '130px', "className": 'center' },
                    { "targets": 2, "width": '80px', "className": 'center' },
                    { "targets": 3, "width": '170px' },
                    { "targets": 4, "width": '100px', "className": 'right' },
                    { "targets": 5, "width": '80px', "className": 'right' },
                    { "targets": 6, "width": '120px', "className": 'right' },
                    {
                      "targets": 7, "data": null, "orderable": false, "searchable": false, "width": '70px', "className": 'center',
                      "render": function(data, type, row) {
                          var btn = "<a style=\"margin-right:7px\" title=\"Ubah\" class=\"btn btn-info btn-sm getUbah\" href=\"#\"><i class=\"fas fa-edit\"></i></a><a title=\"Hapus\" class=\"btn btn-danger btn-sm btnHapus\" href=\"#\"><i class=\"fas fa-trash\"></i></a>";
                          return btn;
                      } 
                    } 
                ],
                "order": [[ 1, "desc" ]],           // urutkan data berdasarkan id_transaksi secara descending
                "iDisplayLength": 10,               // tampilkan 10 data
                "rowCallback": function (row, data, iDisplayIndex) {
                    var info   = this.fnPagingInfo();
                    var page   = info.iPage;
                    var length = info.iLength;
                    var index  = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            } );
            // ====================================================================================================

            // Simpan Data ========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // Tampikan Form Tambah Data
            $('#btnTambah').click(function(reload){
                // reset form
                $('#formTambah')[0].reset();
            });

            // Proses Simpan Data
            $('#btnSimpan').click(function(){
                // Validasi form input
                // jika tanggal kosong
                if ($('#tanggal').val()==""){
                    // focus ke input tanggal
                    $( "#tanggal" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Tanggal tidak boleh kosong.", "warning");
                }
                // jika nama_barang kosong
                else if ($('#nama_barang').val()==""){
                    // focus ke input nama_barang
                    $( "#nama_barang" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Nama barang tidak boleh kosong.", "warning");
                }
                // jika harga_barang kosong atau 0 (nol)
                else if ($('#harga_barang').val()=="" || $('#harga_barang').val()==0){
                    // focus ke input harga_barang
                    $( "#harga_barang" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Harga barang tidak boleh kosong atau 0 (nol).", "warning");
                }
                // jika jumlah_beli kosong atau 0 (nol)
                else if ($('#jumlah_beli').val()=="" || $('#jumlah_beli').val()==0){
                    // focus ke input jumlah_beli
                    $( "#jumlah_beli" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Jumlah beli tidak boleh kosong atau 0 (nol).", "warning");
                }
                // jika semua data sudah terisi, jalankan perintah simpan data
                else{
                    var data = $('#formTambah').serialize();
                    $.ajax({
                        type : "POST",
                        url  : "proses_simpan.php",
                        data : data,
                        success: function(result){                          // ketika sukses menyimpan data
                            if (result==="sukses") {
                                // tutup modal tambah data transaksi
                                $('#modalTambah').modal('hide');
                                // tampilkan pesan sukses simpan data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil disimpan.", "success");
                                // tampilkan data transaksi
                                var table = $('#dataTables').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal simpan data
                                swal("Gagal!", "Data Transaksi Penjualan tidak bisa disimpan.", "error");
                            }
                        }
                    });
                    return false;
                }
            });
            // ====================================================================================================

            // Ubah Data ==========================================================================================
            // ----------------------------------------------------------------------------------------------------
            // Tampilkan Form Ubah Data
            $('#dataTables tbody').on( 'click', '.getUbah', function (){
                var data = table.row( $(this).parents('tr') ).data();
                var id_transaksi = data[ 1 ];
                
                $.ajax({
                    type : "GET",
                    url  : "get_transaksi.php",
                    data : {id_transaksi:id_transaksi},
                    dataType : "JSON",
                    success: function(result){
                        // ubah tanggal menjadi d-m-Y
                        var tgl           = result.tanggal;
                        var dateAr        = tgl.split('-');
                        var tgl_transaksi = dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
                        // tampilkan modal ubah data transaksi
                        $('#modalUbah').modal('show');
                        // tampilkan data transaksi
                        $('#id_transaksi').val(result.id_transaksi);
                        $('#tanggal_ubah').val(tgl_transaksi);
                        $('#nama_barang_ubah').val(result.nama_barang);
                        $('#harga_barang_ubah').val(result.harga_barang);
                        $('#jumlah_beli_ubah').val(result.jumlah_beli);
                        $('#total_bayar_ubah').val(result.total_bayar);
                    }
                });
            });

            // Proses Ubah Data
            $('#btnUbah').click(function(){
                // Validasi form input
                // jika tanggal_ubah kosong
                if ($('#tanggal_ubah').val()==""){
                    // focus ke input tanggal_ubah
                    $( "#tanggal_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Tanggal tidak boleh kosong.", "warning");
                }
                // jika nama_barang_ubah kosong
                else if ($('#nama_barang_ubah').val()==""){
                    // focus ke input nama_barang_ubah
                    $( "#nama_barang_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Nama barang tidak boleh kosong.", "warning");
                }
                // jika harga_barang_ubah kosong atau 0 (nol)
                else if ($('#harga_barang_ubah').val()=="" || $('#harga_barang_ubah').val()==0){
                    // focus ke input harga_barang_ubah
                    $( "#harga_barang_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Harga barang tidak boleh kosong atau 0 (nol).", "warning");
                }
                // jika jumlah_beli_ubah kosong atau 0 (nol)
                else if ($('#jumlah_beli_ubah').val()=="" || $('#jumlah_beli_ubah').val()==0){
                    // focus ke input jumlah_beli_ubah
                    $( "#jumlah_beli_ubah" ).focus();
                    // tampilkan peringatan data tidak boleh kosong
                    swal("Peringatan!", "Jumlah beli tidak boleh kosong atau 0 (nol).", "warning");
                }
                // jika semua data sudah terisi, jalankan perintah ubah data
                else{
                    var data = $('#formUbah').serialize();
                    $.ajax({
                        type : "POST",
                        url  : "proses_ubah.php",
                        data : data,
                        success: function(result){                          // ketika sukses mengubah data
                            if (result==="sukses") {
                                // tutup modal ubah data transaksi
                                $('#modalUbah').modal('hide');
                                // tampilkan pesan sukses ubah data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil diubah.", "success");
                                // tampilkan data transaksi
                                var table = $('#dataTables').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal ubah data
                                swal("Gagal!", "Data Transaksi Penjualan tidak bisa diubah.", "error");
                            }
                        }
                    });
                    return false;
                }
            });
            // ====================================================================================================
            
            // Proses Hapus Data ==================================================================================
            // ----------------------------------------------------------------------------------------------------
            $('#dataTables tbody').on( 'click', '.btnHapus', function (){
                var data = table.row( $(this).parents('tr') ).data();
                // tampilkan notifikasi saat akan menghapus data
                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Anda akan menghapus data transaksi penjualan dengan ID Penjualan : "+ data[ 1 ] +"",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    closeOnConfirm: false
                }, 
                // jika dipilih ya, maka jalankan perintah hapus data
                function () {
                    var id_transaksi = data[ 1 ];
                    $.ajax({
                        type : "POST",
                        url  : "proses_hapus.php",
                        data : {id_transaksi:id_transaksi},
                        success: function(result){                          // ketika sukses menghapus data
                            if (result==="sukses") {
                                // tampilkan pesan sukses hapus data
                                swal("Sukses!", "Data Transaksi Penjualan berhasil dihapus.", "success");
                                // tampilkan data transaksi
                                var table = $('#dataTables').DataTable(); 
                                table.ajax.reload( null, false );
                            } else {
                                // tampilkan pesan gagal hapus hapus data
                                swal("Gagal!", "Data Transaksi Penjualan tidak bisa dihapus.", "error");
                            }
                        }
                    });
                });
            });
            // ====================================================================================================
        });
        </script>