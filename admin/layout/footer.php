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


<!-- calendar -->
<!-- BEGIN: Page Vendor JS-->
<script src="../vendor/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="../vendor/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<script src="../vendor/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
<!-- END: Page Vendor JS-->
<script type="text/javascript">
/*=========================================================================================
    File Name: pickers.js
    Description: Pick a date/time Picker, Date Range Picker JS
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function(window, document, $) {
  'use strict';

  /*******  Flatpickr  *****/
  var basicPickr = $('.flatpickr-basic'),
    timePickr = $('.flatpickr-time'),
    dateTimePickr = $('.flatpickr-date-time'),
    multiPickr = $('.flatpickr-multiple'),
    rangePickr = $('.flatpickr-range'),
    humanFriendlyPickr = $('.flatpickr-human-friendly'),
    disabledRangePickr = $('.flatpickr-disabled-range'),
    inlineRangePickr = $('.flatpickr-inline');

  // Default
  if (basicPickr.length) {
    basicPickr.flatpickr();
  }

  // Time
  if (timePickr.length) {
    timePickr.flatpickr({
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      noCalendar: true
    });
  }

  // Date & TIme
  if (dateTimePickr.length) {
    dateTimePickr.flatpickr({
      enableTime: true
    });
  }

  // Multiple Dates
  if (multiPickr.length) {
    multiPickr.flatpickr({
      weekNumbers: true,
      mode: 'multiple',
      minDate: 'today'
    });
  }

  // Range
  if (rangePickr.length) {
    rangePickr.flatpickr({
      mode: 'range'
    });
  }

  // Human Friendly
  if (humanFriendlyPickr.length) {
    humanFriendlyPickr.flatpickr({
      altInput: true,
      altFormat: 'F j, Y',
      dateFormat: 'Y-m-d'
    });
  }

  // Disabled Range
  if (disabledRangePickr.length) {
    disabledRangePickr.flatpickr({
      dateFormat: 'Y-m-d',
      disable: [{
        from: new Date().fp_incr(2),
        to: new Date().fp_incr(7)
      }]
    });
  }

  // Inline
  if (inlineRangePickr.length) {
    inlineRangePickr.flatpickr({
      inline: true
    });
  }
  /*******  Pick-a-date Picker  *****/
  // Basic date
  $('.pickadate').pickadate();

  // Format Date Picker
  $('.format-picker').pickadate({
    format: 'mmmm, d, yyyy'
  });

  // Date limits
  $('.pickadate-limits').pickadate({
    min: [2019, 3, 20],
    max: [2019, 5, 28]
  });

  // Disabled Dates & Weeks

  $('.pickadate-disable').pickadate({
    disable: [1, [2019, 3, 6],
      [2019, 3, 20]
    ]
  });

  // Picker Translations
  $('.pickadate-translations').pickadate({
    formatSubmit: 'dd/mm/yyyy',
    monthsFull: [
      'Janvier',
      'Février',
      'Mars',
      'Avril',
      'Mai',
      'Juin',
      'Juillet',
      'Août',
      'Septembre',
      'Octobre',
      'Novembre',
      'Décembre'
    ],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
    weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
    today: "aujourd'hui",
    clear: 'clair',
    close: 'Fermer'
  });

  // Month Select Picker
  $('.pickadate-months').pickadate({
    selectYears: false,
    selectMonths: true
  });

  // Month and Year Select Picker
  $('.pickadate-months-year').pickadate({
    selectYears: true,
    selectMonths: true
  });

  // Short String Date Picker
  $('.pickadate-short-string').pickadate({
    weekdaysShort: ['S', 'M', 'Tu', 'W', 'Th', 'F', 'S'],
    showMonthsShort: true
  });

  // Change first weekday
  $('.pickadate-firstday').pickadate({
    firstDay: 1
  });

  /*******    Pick-a-time Picker  *****/
  // Basic time
  $('.pickatime').pickatime();

  // Format options
  $('.pickatime-format').pickatime({
    // Escape any “rule” characters with an exclamation mark (!).
    format: 'T!ime selected: h:i a',
    formatLabel: 'HH:i a',
    formatSubmit: 'HH:i',
    hiddenPrefix: 'prefix__',
    hiddenSuffix: '__suffix'
  });

  // Format options
  $('.pickatime-formatlabel').pickatime({
    formatLabel: function(time) {
      var hours = (time.pick - this.get('now').pick) / 60,
        label = hours < 0 ? ' !hours to now' : hours > 0 ? ' !hours from now' : 'now';
      return 'h:i a <sm!all>' + (hours ? Math.abs(hours) : '') + label + '</sm!all>';
    }
  });

  // Min - Max Time to select
  $('.pickatime-min-max').pickatime({
    // Using Javascript
    min: new Date(2015, 3, 20, 7),
    max: new Date(2015, 7, 14, 18, 30)

    // Using Array
    // min: [7,30],
    // max: [14,0]
  });

  // Intervals
  $('.pickatime-intervals').pickatime({
    interval: 150
  });

  // Disable Time
  $('.pickatime-disable').pickatime({
    disable: [
      // Disable Using Integers
      3,
      5,
      7,
      13,
      17,
      21

      /* Using Array */
      // [0,30],
      // [2,0],
      // [8,30],
      // [9,0]
    ]
  });

  // Close on a user action
  $('.pickatime-close-action').pickatime({
    closeOnSelect: false,
    closeOnClear: false
  });
})(window, document, jQuery);
</script>
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
