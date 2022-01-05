
<tr>
    <?php foreach($listDay as $lD){?>
        <td>
            <input type="hidden" class="form-control" id="nm_hari" name="nm_hari[]" value=" <?php echo $lD['nm_hari']?>">
            <!-- <div class="input-group">
                <input type="text" class="form-control time" id="jam_mulai" name="jam_mulai[]" placeholder="Jam Mulai"> 
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div> -->
           
           
                <input data-format="hh:mm:ss" class="form-control myclockpicker" type="text" id="jam_mulai" name="jam_mulai[]" placeholder="Jam Mulai"/>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
          

            <!-- <div class="input-group">
                <input type="text" class="form-control time" id="jam_selesai" name="jam_selesai[]" placeholder="Jam Selesai"> 
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
            </div> -->

            
                <input data-format="hh:mm:ss" class="form-control myclockpicker" type="text" id="jam_selesai" name="jam_selesai[]" placeholder="Jam Selesai" />
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
            

            
         

           
            <select class="form-control myselect2" style="width: 100%;" name="id_mapel[]" id="id_mapel">
            <option value="0">-- Pilih Mapel --</option>
                <?php foreach($dataMapel as $dM){?>
                <option value="<?php  echo $dM['id_mapel']?>"><?php echo $dM['nm_mapel']?></option>
                <?php } ?>
            </select>
        </td>
    <?php }?>
    
</tr> 

<script src="<?php echo base_url();?>berkas/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/clockpicker/dist/bootstrap-clockpicker.min.js"></script>



<script>
$(".myselect2").select2({
    dropdownParent: $(".modal")
});

$('.myclockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done',
    default: 'now',
    autoclose:true
}).find('input').change(this.value);



// $('.myclockpicker').clockpicker();


// $('.time').bootstrapMaterialDatePicker
// ({
//     date: false,
//     shortTime: false,
//     format: 'HH:mm'
// });


</script>