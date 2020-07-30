<?php 
    /* 
        Process delete operation after confirmation
    */
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        /* 
            Inlcude the database file 
        */
        require_once 'database/database.php';

        /* 
            Prepare the delete statement
        */
        $sql = "DELETE FROM CRUD WHERE id = ?";

        if ($stmt = $connect->prepare($sql)) {
            /* 
                Bind the variables to the prepared statements as parameters
            */
            $stmt->bind_param("i", $param_id);

            /* 
                Set Parameteres
            */
            $param_id = trim($_POST['id']);

            /* 
                Attempt to execute the prepared statements
            */
            if ($stmt->execute()) {
                /* 
                    Records deleted successfully.
                    Redirect to landing page 
                */
                header('location: index.php');
            }
            else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        /* 
            Close the statement
        */
        $stmt->close();

        /* 
            Close the connection
        */
        $connect->close();
    }
    else{
        /* 
            Chech the existence of id parameter
        */
        if (empty(trim($_GET['id']))) {
            /* 
                URL doesn't contain id parameter. 
                Redirect to error page 
            */
            header('location: error404.php');
            exit();
        }
    }
?>