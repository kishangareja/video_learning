<footer class="main-footer">

  <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#"><?=PROJECT_NAME;?></a>.</strong> All rights
  reserved.
</footer>

<!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- Morris.js charts -->
<script src="<?=base_url('assets/admin/bower_components/raphael/raphael.min.js');?>"></script>
<script src="<?=base_url('assets/admin/bower_components/morris.js/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<!-- datepicker -->
<script src="<?=base_url('assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?=base_url('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/admin/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('assets/admin/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/admin/dist/js/demo.js');?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url('assets/admin/plugins/iCheck/icheck.min.js');?>"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?=base_url('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url('assets/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');?>"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/admin/plugins/input-mask/jquery.inputmask.js');?>"></script>
<script src="<?=base_url('assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
<script src="<?=base_url('assets/admin/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
<!-- jvectormap -->
<script src="<?=base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?=base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?=base_url('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>

<!-- bootstrap time picker -->
<script src="<?=base_url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>

<!-- sweetalert Js -->
<script src="<?=base_url('assets/admin/regform/sweetalert.min.js');?>"></script>
<script>

    /**
     * iCheck for checkbox and radio inputs
     *
     * @var		mixed	#example1').DataTable()
     */
    $('#example1').DataTable();

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
 
     function confirm_box(id, url, title) {
      swal({
        title: "Are you sure you want to proceed?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, confirm",
        cancelButtonText: "No, cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      }, function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: url,
            data: {id: id},
            type: 'post',
            dataType: 'json',
            success: function (data) {
              if (data.success == 1) {
                swal("Success!", title + " was deleted successfully :)", "success");
                location.reload();
              } else {
                swal("Cancelled", "Something went wrong!", "error");
              }
            }
          });
        } else {
          swal("Cancelled", "You have cancel it", "error");
        }
      });
    }
 
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>
