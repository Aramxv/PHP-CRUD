<?php 
    include 'includes/header.php';
    include 'php_action/add.act.php';
?>

    
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-8 col-md-4 mt-3">
                <h2 class="text-left">Create New Record</h2>
                <p class="text-left">Please Fill this form and submit to add new Record.</p>
            </div>
            <div class="form m-3">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ';' ?>">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        <span class="help-block text-danger"><?php echo $name_err;  ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ';' ?>">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                        <span class="help-block text-danger"><?php echo $address_err;  ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ';' ?>">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="<?php echo $age; ?>">
                        <span class="help-block text-danger"><?php echo $age_err;  ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
  

<?php
    include 'includes/scripts.php';
    include 'includes/footer.php';
?>