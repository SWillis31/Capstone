<?php
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $resource_id = $_GET["id"];

    $sql = "DELETE FROM resources WHERE resource_id = " . $resource_id;
    if($conn->query($sql) === TRUE){
        echo "Successfully deleted";
    }
    else{
        echo "Error deleting resource: " . $conn->error;
    }

    header("location:resources.php");

}
?>