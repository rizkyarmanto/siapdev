<?php 
include 'head.php'; 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-red"> 404</h2>

        <div class="error-content">
          <h3 style="visibility: hidden;"><i class="fa fa-warning text-red"></i> Oops! Halaman tidak ditemukan.</h3>
          <h3><i class="fa fa-warning text-red"></i> Oops! Halaman tidak ditemukan.</h3>

          <div class="form-group">
            <button class="btn btn-danger btn-flat" onclick="javascript:history.back()"><i class="fa fa-backward"></i> Kembali </button>
          </div>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->

  </div>
  </div>
  <!-- /.content-wrapper -->

<?php 
include 'footer.php'; 
?>