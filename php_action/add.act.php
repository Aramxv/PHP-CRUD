<?php 
/* 
    Define and initialize with empty values
*/

$name = $address = $age = "";
$name_err = $address_err = $age_err = "";

/* 
    Process the form data when form is submitted
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
        Include the database file 
    */
    require_once("database/database.php");

    /* 
        Validate the Name
    */
    $input_name = trim($_POST['name']);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    }
    elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    }
    else {
        $name = $input_name;
    }
    /* 
        Validate the Address
    */
    $input_address = trim($_POST['address']);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    }
    else {
        $address = $input_address;
    }

    /* 
        Validate the Age
    */
    $input_age = trim($_POST['age']);
    if (empty($input_age)) {
        $age_errr = "Please enter the age.";
    }
    elseif (!ctype_digit($input_age)) {
        $age_err = "Please enter an appropriate age.";
    }
    else {
        $age = $input_age;
    }

    /* 
        Check input errors before inserting into database
    */
    if (empty($name_err) && empty($address_err) && empty($age_err)) {
        // Prepare the insert statement
        $sql = "INSERT INTO CRUD (name, address, age) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statements as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_age);

            // Set Parameteres
            $param_name = $name;
            $param_address = $address;
            $param_age = $age;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect the user to landing page 
                header("location: index.php");
                exit(); 
            }
            else {
                echo "Something went wrong. Please try again later.";
            }
        }
        /* 
            Close the Statement
        */
        mysqli_stmt_close($stmt);
    }
    /* 
        Close the Connection
    */
    mysqli_close($connect);
}


?>