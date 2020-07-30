<?php 
    include 'includes/header.php';
?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-bottom mb-3 mt-5">
                    <h1 class="pull-left">Simple CRUD</h1>
                    <a href="add.php" class="btn btn-primary pull-right">Add New Record</a>
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
 