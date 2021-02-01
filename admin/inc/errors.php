<?php if (isset($_SESSION['errors'])) { ?>
              <div class="alert alert-danger">
              <?php foreach( $_SESSION['errors'] as $error){ ?>
             <p><?= $error ;?></p>
            <?php } unset($_SESSION['errors']); ?>
            </div>
            <?php } ?>



            <?php if (isset($_SESSION['errors']))  { ?>
                            <div class ="alert alert-danger">
                                <?php foreach ($_SESSION['errors'] as $error) { ?>
                                    <p class= "mb-0"><?= $error;?></p>
                                <?php }?>
                            </div>
                            
                            <?php unset( $_SESSION['errors']);?>
                            <?php } ?>