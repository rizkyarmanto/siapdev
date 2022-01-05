   <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 26Coder</strong> All rights
    reserved. | <a href="#" target="_blank">www.26coder.id</a>
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- Bootstrap -->

<!-- Moment -->
<script src="<?php echo base_url();?>berkas/custom/dist/js/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>berkas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>berkas/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>berkas/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>berkas/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>berkas/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>berkas/custom/dist/js/app.min.js"></script>

<!-- Pace loading -->
<script src="<?php echo base_url();?>berkas/plugins/pace-master/pace.js"></script>

<script src="<?php echo base_url();?>berkas/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>



<script>
  paceOptions = {
  // Disable the 'elements' source
  elements: true,
  ajax: false, //disable pace when ajax request
  restartOnPushState: false
  }
</script>

<!-- DataTables Serverside Processing -->
<!-- <script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script> -->


<!-- Page script -->
<script>
  // $('.fotos').fileselect();
  $(function () {
    //Initialize Select2 Elements
    // $(".select2").select2();
    $(".myselect").select2();

   
    

    $(".myselect2").select2({
      dropdownParent: $(".modal")
    });
    $( ".myDate" ).datepicker({
      autoclose : true
    });
    $('.numbersonly').keyup(function () { 
       this.value = this.value.replace(/[^0-9\+]/g,'');
    });    
    $('.currencysonly').keyup(function () { 
       this.value = this.value.replace(/[^0-9\Rp.]/g,'');
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

  });
</script>

<!-- Chained -->
<script>
function tampilKabupaten(e)
 {
   kdprop = $(e).val();
   $.ajax({
    //  url: base_url+"chained/pilih_kabupaten/"+kdprop,
     url: "<?php echo base_url('chained/pilih_kabupaten');?>/"+kdprop,
    
     success: function(response){
     $("#kabupaten_id").html(response);
     },
     dataType:"html"
   });
   return false;
 }
 
 function tampilKecamatan(e)
 {
   kdkab = $(e).val();
   $.ajax({
    //  url: base_url+"chained/pilih_kecamatan/"+kdkab,
     url: "<?php echo base_url('chained/pilih_kecamatan');?>/"+kdkab,
     success: function(response){
     $("#kecamatan_id").html(response);
     },
     dataType:"html"
   });
   return false;
 }
 
 function tampilKelurahan(e)
 {
   kdkec = $(e).val();
   $.ajax({
    //  url: base_url+"chained/pilih_kelurahan/"+kdkec,
     url: "<?php echo base_url('chained/pilih_kelurahan');?>/"+kdkec,
     success: function(response){
     $("#kelurahan_id").html(response);
     },
     dataType:"html"
   });
   return false;
 }
</script>
<script type="text/javascript">
    $(document).ready(function () {
      Pace.start();
      $.ajax({
        url : "<?php echo base_url('user/show_menu');?>",
        dataType: "json",
        type: "POST",
        data: "url=<?php echo str_replace(base_url(), '', base_url(uri_string()));?>",
        success: function(data) {
            $('#dashboard-pageBar').html(data.bar);
            $('#dashboard-pageMenu').html(data.menu);
            Pace.stop();
        }
      })
    });

  </script>
</body>
</html>
