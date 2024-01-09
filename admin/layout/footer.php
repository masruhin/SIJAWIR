<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
  <p class="clearfix mb-0">
    <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../vendor/app-assets/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../vendor/app-assets/vendors/js/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="../vendor/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- BEGIN: Theme JS-->
<script src="../vendor/app-assets/js/core/app-menu.js"></script>
<!-- END: Theme JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script type="text/javascript">
function show_kabupaten() {
  var id_fakultas = $("#id_fakultas").val();
  $.ajax({
    url: "ajax.php",
    data: "id_fakultas=" + id_fakultas + "&aksi=provinsi",
    success: function(html) {
      $("#list_prodi").html(html);
    }
  });
}
</script>
<script>
$(window).on('load', function() {
  if (feather) {
    feather.replace({
      width: 14,
      height: 14
    });
  }
})
$(document).ready(function() {
  $("#tahun").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
  });
  $('#id_fakultas').select2({
    placeholder: 'Pilih Fakultas',
    language: "id"
  });
  $('#id_prodi').select2({
    placeholder: 'Pilih Prodi',
    language: "id"
  });
  $('#id_jenis').select2({
    placeholder: 'Pilih Jenis Dokumen',
    language: "id"
  });
  $('.js-example-basic-single').select2();
  $('b[role="presentation"]').hide();
});
</script>
<script>
$(function() {
  $("#dataTables").DataTable({
    pageLength: 5,
    lengthMenu: [
      [5, 15, 20, 25, 30, 35 - 1],
      [5, 15, 20, 25, 30, 'Semua']
    ],
    "responsive": true,
    "autoWidth": true,
  });
  $("#dok_univ").DataTable({
    searching: false,
    pageLength: 5,
    lengthMenu: [
      [5, 15, 20, 25, 30, 35 - 1],
      [5, 15, 20, 25, 30, 'Semua']
    ],
    "responsive": true,
    "autoWidth": true,
  });
});
</script>
</body>
<!-- END: Body-->

</html>
