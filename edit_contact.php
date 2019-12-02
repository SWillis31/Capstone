<?php
include("db_connect.php");
session_start();


if(isAdmin()){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];

        $sql = "UPDATE contact_info SET contact_title = '" . $_POST['contact_title'] . "', contact_content = '" . $_POST["contact_content"] . "' WHERE contact_id = '" . $id . "'";
        if($conn->query($sql)){
            echo "updated contact";
            header("location: contact.php");
        } else {
            echo "Failed update: " . $conn->error;
        }
    }
}

?>
