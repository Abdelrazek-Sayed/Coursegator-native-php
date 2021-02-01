

<?php include_once("inc/header.php");?>

<?php


            if (isset($_GET['id'])){

            $id = $_GET['id'];
            
            $sql = "SELECT name FROM cats WHERE id = $id";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0 ){
            $cat = mysqli_fetch_assoc($result);

            }

            }


            ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="all-cats.php">categories</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
            
              <!-- form start -->
            
           <form role="form" method = "POST" action="handlers/handle-edit-cat.php?id=<?= $id ;?>">
             <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="<?= $cat['name'];?>">
                  </div>
             </div>
                <div class="card-footer">
                  <button type="submit" name="submit"  class="btn btn-primary">Edit</button>
                </div>
           </form>
            </div>
           

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<?php include("inc/footer.php");?>
