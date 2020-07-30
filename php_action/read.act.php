<?php
    /* 
        Check the existense of id parameter before processing 
    */
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        /* 
            Include the database file
        */
        require_once 'database/database.php';

        /* 
            Prepare a SELECT Statement
        */
        $sql = "SELECT * FROM CRUD WHERE id = ?";

        if ($stmt = $connect->prepare($sql)) {
            /* 
                Bind variables to the prepared statement as parameters
            */
            $stmt->bind_param("i", $param_id);

            /* 
                Set parameters
            */
            $param_id = trim($_GET['id']);

            /* 
                Attempt to execute the prepared statement
            */
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* 
                        Fetch result row as an associative array.
                        Since the result contains only one row, 
                        We don't need to use while loop
                    */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    /* 
                        Retrieve individual field value
                    */
                    $name = $row['name'];
                    $address = $row['address'];
                    $age = $row['age'];
                }
                else {
                    /*
                        URL doesn't contain valid id parameter.
                        Redirect to error page 
                    */
                    header("location: error404.php");
                    exit();
                }
            }
            else {
                echo 'Oops! Something went wrong. Please try again later.';
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
    else {
        /* 
            URL doesn't contain id parameter.
            Redirect to error page
        */
        //header("location: error404.php");
        //exit();
    }
?>