
   <div class="box-body">
    <div style="">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <?php if($this->session->flashdata('psn') != '') {?>
                    <div class="alert alert-<?php echo $this->session->flashdata('type_alert')?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-top: 10px;">&times;</button>
                        <h4 style="margin-top: 10px;"><i class="icon fa fa-ban"></i></h4>
                    </div>
                    <?php } ?>
            </div>
            <form>
                <div class="col-md-12">
                    <table class="table table-bordered mytable" id="mytable" style="width:100%;">
                        <tr style="width:100%;">
                            <th>No</th>
                            <th>No Formulir</th>
                            <th>Nama Siswa</th>
                            <th>Tahun Ajaran</th>
                            <th>Jurusan</th>
                            <th>Asal Sekolah</th>
                            <th>Detail</th>
                        </tr>
                        <?php if(empty(count($dataSiswa))){?>
                            <tr style="width:100%;">
                                <td colspan="4" style="text-align: center;">Data Tidak Ditemukan</td>
                            </tr>
                        <?php }else{ ?>
                            <?php $no=1;foreach($dataSiswa as $ds){?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $ds['no_formulir'];?></td>
                                    <td> <?php echo $ds['nama']?></td>
                                    <td> <?php echo $ds['teks_ta']?></td>
                                    <td> <?php echo $ds['jurusan']?></td>
                                    <td> <?php echo $ds['asal_sekolah']?></td>
                                    <td>
                                        <a href="<?php echo base_url('pengolahan_siswa/detail_profil/'.$ds['no_formulir'])?>"  class="btn bg-orange btn-block btn-md lihat" target="_blank">Lihat</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php }?>
                    </table>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <!-- <button type="button" id="submit" class="btn bg-green btn-block btn-md">Submit</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script src="<?php echo base_url();?>berkas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>berkas/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>



                                
</script>