
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

<link rel="stylesheet" href="<?php echo base_url();?>berkas/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">


<style>
.bootstrap-timepicker-widget.dropdown-menu {
    z-index: 1050!important;
}
</style>

<div class="col-md-12" style="margin-top: 20px;">
<button type="button" id="addRow" class="btn bg-maroon btn-sm" style="margin-bottom:20px;">Tambah</button>
<input type="hidden" id="idKelas" value="<?php echo $id_kelas?>">
    <table class="table table-bordered mytable" id="mytable">
        <thead>
            <tr>
                <?php foreach($listDay as $lD){?>
                <th><?php echo $lD['nm_hari']?></th>
                <?php } ?>
            </tr>
            
        </thead>
        <tbody id="rowJadwal">
          
        </tbody>
    </table>
</div>


<script src="<?php echo base_url();?>berkas/plugins/select2/dist/js/select2.min.js"></script>


<script>

 $(".myselect2").select2({
    dropdownParent: $(".modal")
});
 

$('#addRow').click(function(){
 
 var idKelas  =   $('#idKelas').val();
// console.log(id_kelas);
 // console.log(url);
 $.ajax({
     url : "<?php echo base_url('kbm/addRowJadwal')?>",
     dataType: "json",
     data: 
         {
             idKelas:idKelas,
         },
     type: "POST",
     success: function(data) {
        $('#rowJadwal').append(data);
        
     }
 });
});


</script>