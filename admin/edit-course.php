

<?php include("inc/header.php");?>



<?php
if (isset($_GET['id'])){

$id =$_GET['id'];
  $sql = "SELECT * from courses where id = $id";
  
  $result = mysqli_query($conn,$sql);
      
  if (mysqli_num_rows($result) > 0) {
      $course = mysqli_fetch_assoc($result);
  
      } else {
      $course = [];
             }
}

 // category 

 $sql = "SELECT id, name FROM cats";
 $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        $cats = mysqli_fetch_all($result,MYSQLI_ASSOC);

       } else {
         $cats = [];    
       }


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Course</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
            <li class="breadcrumb-item active">Edit-course</li>
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
                            
      <form role="form" method = "POST" action="handlers/handle-edit-course.php?id=<?=$course['id'];?>&imgOldName=<?=$course['img'];?>" enctype="multipart/form-data">
      <div class="card-body">
             
                  <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" 
                       name="name" value="<?=$course['name'];?>">
                  </div>

                  <div class="form-group">
                      <label>Description</label>
                      <textarea   class="form-control"   name="desc" rows="3"> <?=$course['desc'];?> </textarea>
                  </div>
                 
                  <div class="form-group">
                              <label for="spec">category</label>
                         <select class="form-control valid" name="cat_id" id="cat_id">
                              <?php foreach($cats as $cat) {?>
                                  <option <?php if ($cat['id'] == $course['cat_id']){echo "selected";} ?> value="<?= $cat ['id'];?>"><?= $cat ['name'];?></option>
                              <?php } ?>
                         </select>
                  </div>
                         
                          <img src="assets/img/courses/<?=$course['img'];?>" height="50px">

                         

                  <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                  <div class="input-group">
                          <div class="custom-file">
                      <input type="file" class="custom-file-input"   name="img" id="exampleInputFile">
                      <label  class="custom-file-label" for="exampleInputFile">choose file</label>
                          </div>
                  </div>
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
