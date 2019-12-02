<?php
include("db_connect.php");
session_start();

if(isAdmin()){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_GET["id"];

        $sql = "DELETE FROM contact_info WHERE contact_id = " . $id;

        if($conn->query($sql)){
            echo "Contact deleted";
            header("location: contact.php");
        }
    }
} else {
    header("location: access_denied.php");
}



?>