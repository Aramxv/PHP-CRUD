<?php 
    include 'php_action/read.act.php';
    include 'includes/header.php';
?>
<div class="wrapper mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label><strong class="text-primary">Name</strong></label>
                        <p class="form-control-static"><span class="px-3"><?php echo $row["name"]; ?></span></p>
                    </div>
                    <div class="form-group">
                        <label><strong class="text-primary">Address</strong></label>
                        <p class="form-control-static"><span class="px-3"><?php echo $row["address"]; ?></span></p>
                    </div>
                    <div class="form-group">
                        <label><strong class="text-primary">Salary</strong></label>
                        <p class="form-control-static"><span class="px-3"><?php echo $row["age"]; ?></span></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>

<?php
    include 'includes/scripts.php';
    include 'includes/footer.php';
?>