<?php 
    include 'php_action/delete.act.php';
    include 'includes/header.php';
?>

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="page-header">
                    <h1>Delete Record</h1>
                    <hr>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="alert alert-danger fade-in">
                        <input type="hidden" name="id" value="<?php echo trim($_GET['id']); ?>">
                        <p>Are you sure you want to delete this record?</p><br>
                        <p>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="index.php" class="btn btn-default">No</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    include 'includes/scripts.php';
    include 'includes/footer.php';
?>