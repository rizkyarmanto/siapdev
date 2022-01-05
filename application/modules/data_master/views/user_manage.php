<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <input type="hidden" id="paramCtrl" value="user_manage">
  <section class="content-header">
   <h1>
     <?php echo $title;?>
     <small></small>
   </h1>
   <ol class="breadcrumb" id="dashboard-pageBar"></ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Row -->
    <div class="row">
      <!-- Box -->
      <div class="col-lg-10 col-lg-offset-1 col-sm-12">
        <div class="box box-success">
          <div class="box-header">
            <button class="btn btn-primary btn-sm" onClick="add();">
              <span class="glyphicon glyphicon-plus"></span>Tambah
            </button>
          </div>
          
          <div class="box-body">
            <div style="overflow-x: auto;">
              <table class="table table-bordered table-hover table-striped" id="datatables-ss">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>ID Telegram</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Divisi</th>
                    <th>Aktif</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>  


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title">User Management</h6>
      </div>
      <div class="modal-body">
        <form action="#" class="formModal form-horizontal">
            <input type="hidden" name="id_user">
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Nama</label>
                <div class="col-md-9">
                    <input name="nama" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">ID Telegram</label>
                <div class="col-md-9">
                    <input name="id_telegram" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Password</label>
                <div class="col-md-9">
                    <input type="password" name="password" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Level</label>
                <div class="col-md-9">
                    <input name="level" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3" style="text-align:left;">Divisi</label>
                <div class="col-md-9">
                    <input name="divisi" onkeypress="return enterScript(event)" class="form-control form-control-inline input-medium" size="16" type="text" value="">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" onClick="saving(this)" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
