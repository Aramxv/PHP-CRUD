<?php 
    include 'includes/header.php';
?>

    <div class="wrapper">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="pull-left">Simple CRUD</h2>
                    <a href="add.php" class="btn btn-primary pull-right">Add New</a>
                </div>

                <?php 
                    include 'php_action/display.act.php';
                ?>
                
            </div>
        </div>
    </div>

<?php
    include 'includes/scripts.php';
    include 'includes/footer.php';
?>
 