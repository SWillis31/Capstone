<?php
include("db_connect.php");


if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $opp_id = $_GET["id"];

    $sql = "DELETE FROM opportunities WHERE opp_id = " . $opp_id;
    if($conn->query($sql) === TRUE){
        echo "Successfully deleted";
    }
    else{
        echo "Error deleting resource: " . $conn->error;
    }

    header("location:opportunities.php");

}

?>