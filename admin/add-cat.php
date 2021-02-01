

<?php include("inc/header.php");?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Cat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
            <li class="breadcrumb-item active">Add-Cat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-6">
      <div class="card-card-primary">
        
      <?php if (isset($_SESSION['errors']))  { ?>
                            <div class ="alert alert-danger">
                                <?php foreach ($_SESSION['errors'] as $error) { ?>
                                    <p class= "mb-0"><?= $error;?></p>
                                <?php }?>
                            </div>
                            
                            <?php unset( $_SESSION['errors']);?>
                            <?php } ?>
                            
      <form role="form" method = "POST" action="handlers/handle-add-cat.php">
             <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1"  name="name">
                  </div>
             </div>
                <div class="card-footer">
                  <button type="submit" name="submit"  class="btn btn-primary">Add</button>
                </div>
      </form>
       </div>
       </div>
         </div>
      <!-- /.row -->
      </div>     <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("inc/footer.php");?>
