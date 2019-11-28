<?php
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $user = $_GET["username"];

    $sql = "UPDATE users SET role ='admin' WHERE username='" . $user . "'";
    if($conn->query($sql) === TRUE){
        echo "Updated user privileges";
    }else{
        echo "Failed to update article" . $conn->error;
    }
}
?>