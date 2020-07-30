<?php 
    /*
        Include database connection file
    */
    require_once 'database/database.php';

    /*
        Attempt SELECT query execution
    */
    $sql = "SELECT * FROM CRUD";
    if ($result = $connect->query($sql)) {
        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Address</th>";
                    echo "<th>Age</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                            echo "<td>" .$row['id']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td>" .$row['address']. "</td>";
                            echo "<td>" .$row['age']. "</td>";
                            echo "<td>";
                                echo "<a href='read.php?id=" .$row['id'] ."' title='View Record' data-toggle='tooltip'><span><i class='fa fa-address-card border-right px-2' aria-hidden='true'></span></i></a>";
                                echo "<a href='update.php?id=" .$row['id'] ."' title='Update Record' data-toggle='tooltip'><span><i class='fa fa-pencil border-right px-2' aria-hidden='true'></span></i></a>";
                                echo "<a href='delete.php?id=" .$row['id'] ."' title='Delete Record' data-toggle='tooltip'><span><i class='fa fa-minus-circle px-2' aria-hidden='true'></span></i></a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
            /*
                Free the result set
            */
            $result->free();
        } 
        else {
            echo "<p class='lead'><em>No Data is Available at the moment.</em></p>";
        }
    }
    else {
        echo "ERROR: Could not able to execute $sql. " . $connect->error;
    }
    /*
        Close the Connection
    */
    $connect->close();
?>