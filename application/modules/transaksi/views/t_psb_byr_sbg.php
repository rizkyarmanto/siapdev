<!-- Modal -->
<div id="byr_sbg" class="modal fade" role="dialog" tabindex="-1">
<form action="#" role="form" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bayar Sebagian</h4>
      </div>

     <div class="modal-body">
        <div class="row form-group">
          <label class="col-lg-4 col-sm-4" style="">
            Formulir 
          </label>
          <div class="col-lg-8 col-sm-8">
            <input name="id_tarif_nilai[]" type="hidden" value="">
            <input name="nominal[]" type="number" min="1000" max="500000000" 
            class="form-control input-sm text-right" style="margin:0" placeholder="300,000"/>
          </div>
        </div>

      </div>

      <div class="modal-footer">
          <button type="reset" style="margin-right: 5px;" class="btn btn-default">Reset</button>
      </div>
      
    </div>
  </div>
</form>
</div>

