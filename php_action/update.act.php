<?php
// Include config file
require_once "database/database.php";
 
// Define variables and initialize with empty values
$name = $address = $age = "";
$name_err = $address_err = $age_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate age
    $input_age = trim($_POST["age"]);
    if(empty($input_age)){
        $age_err = "Please enter the age amount.";     
    } elseif(!ctype_digit($input_age)){
        $age_err = "Please enter a positive integer value.";
    } else{
        $age = $input_age;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($age_err)){
        // Prepare an update statement
        $sql = "UPDATE CRUD SET name=?, address=?, age=? WHERE id=?";
 
        if($stmt = $connect->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $param_name, $param_address, $param_age, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_age = $age;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $connect->close();
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM CRUD WHERE id = ?";
        if($stmt = $connect->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $age = $row["age"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error404.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
        
        // Close connection
        $connect->close();
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error404.php");
        exit();
    }
}
?>