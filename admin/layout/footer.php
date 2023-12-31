<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
  <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
        class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span
        class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
      class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../vendor/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../vendor/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../vendor/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="../vendor/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../vendor/app-assets/js/core/app-menu.js"></script>
<script src="../vendor/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->


<script>
$(window).on('load', function() {
  if (feather) {
    feather.replace({
      width: 14,
      height: 14
    });
  }
})
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
});
</script>
</body>
<!-- END: Body-->

</html>
