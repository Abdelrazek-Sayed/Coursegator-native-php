

<?php include("inc/header.php");?>


<?php

// read 

          $sql = "SELECT reservations.* , courses.name AS courseName   FROM reservations  JOIN courses
          ON reservations.course_id = courses.id";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {

          $enrolls= mysqli_fetch_all($result,MYSQLI_ASSOC);
          
          } else {
            $enrolls = [];
          }
       

        
          
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Reservations</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">All Reservations</li>
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
                      <th>Email</th>
                      <th>course</th>
                      <th>Created At</th>
                      <th>Action</th>
                       
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($enrolls as $key => $enroll) { ?>
                      <tr>  
                        <td><?= $key +1;?></td>
                        <td><?= $enroll['name'];?></td>
                        <td><?= $enroll['email'];?></td>
                        <td><?= $enroll['courseName'];?></td>
                        <td><?= $enroll['created_at'];?></td>
                        <td>
                        <a class="btn btn-ms btn-primary"  href="show-enrolls.php?id=<?=$enroll['id'];?>">Show</a>
                        
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














