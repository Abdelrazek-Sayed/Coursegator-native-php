

<?php include("inc/header.php");?>


<?php

// read 

          $sql = "SELECT courses.* ,cats.id as catId ,cats.name as catName FROM courses join cats
          on courses.cat_id = cats.id";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {

          $courses = mysqli_fetch_all($result,MYSQLI_ASSOC);
          
          } else {
            $courses = [];
          }
       

          // $sql = "SELECT * FROM cats";
          // $result = mysqli_query($conn,$sql);
          
          // if(mysqli_num_rows($result) > 0){
          
          //     $cats = mysqli_fetch_all($result,MYSQLI_ASSOC);
          // }else{
          //     $cats = [];
          // }
          
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Courses</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All courses</li>
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
        
       
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.card-header -->

              <?php if (isset($_SESSION['success'])) {?>
                <div class=" alert alert-success">
                 <?=$_SESSION['success'];?>
                </div>
                <?php } unset($_SESSION['success']);?>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>image</th>
                      <th>Category</th>
                      <th>Created At</th>
                      <th>Action</th>
                       
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($courses as $key => $course) { ?>
                      <tr>  
                        <td><?= $key +1;?></td>
                        <td><?= $course['name'];?></td>

                        <td>
                            <img src="assets/img/courses/<?= $course['img'];?>" height="50px">
                         
                        </td>

                        <td><?= $course['catName'];?></td>
                        <td><?= $course['created_at'];?></td>
                        <td>
                        <a class="btn btn-ms btn-info"  href="edit-course.php?id=<?=$course['id'];?>">Edit</a>
                        <a  class="btn btn-ms btn-danger" href="delete-course.php?id=<?=$course['id'];?>&imgOldName=<?=$course['img'];?>">Delete</a>
                        </td>      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>





      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<?php include("inc/footer.php");?>




//














