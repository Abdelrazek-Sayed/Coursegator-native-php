<?php include("inc/header.php");?>



<title>All courses</title>
    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay2">
        <h3>Our Courses</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- popular_courses_start -->
    <div class="popular_courses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>All Courses</h3>
                    </div>
                </div>
            </div>
        </div>

                    <?php

                        $sql = "SELECT courses.* , cats.name AS catName FROM courses JOIN cats
                        ON 
                        courses.cat_id = cats.id
                        ORDER BY courses.id DESC ";
                        $result = mysqli_query($conn, $sql);
                             
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $allcourses = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        } else {
                        $allcourses = [];
                        }


                    ?>



        <div class="all_courses">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <?php foreach($allcourses as $course) {?>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single_courses">
                                            <div class="thumb">
                                                <a href="show-course.php?id=<?=$course['id'];?>">
                                                    <img src="admin/assets/img/courses/<?=$course['img'];?> " alt="<?=$course['name'];?>">
                                                </a>
                                            </div>
                                            <div class="courses_info">
                                                <span><?=$course['catName'];?></span>
                                                <h3><a href="show-course.php?id=<?=$course['id'];?>"><?=$course['name'];?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                               <?php } ?> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_courses_end-->
    
    
    <?php include("inc/footer.php");?>