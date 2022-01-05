  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title_page;?>
        <small></small>
      </h1>
      <ol class="breadcrumb" id="dashboard-pageBar"></ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1 col-sm-12" id="dashboard-pageMenu"> 
          </div>
        </div>
      
    </section>
    
    <!-- /.content -->
  </div>
  </div> 


  <script type="text/javascript">
    $(document).ready(function () {
      $.ajax({
        url : "<?php echo base_url('user/show_menu');?>",
        dataType: "json",
        type: "POST",
        data: "url=<?php echo str_replace(base_url(), '', base_url(uri_string()));?>",
        success: function(data) {
            $('#dashboard-pageBar').html(data.bar);
            $('#dashboard-pageMenu').html(data.menu);
        }
      })
    });

  </script>
