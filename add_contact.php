<?php
include("db_connect.php");
session_start();

if(isAdmin()){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql = "INSERT INTO contact_info (contact_title, contact_content) VALUES (?, ?)";
        echo $sql;

        if($statement = $conn->prepare($sql)){
            $statement->bind_param("ss", $contact_title, $contact_content);
            $contact_title = $_POST["contact_title"];
            $contact_content = $_POST["contact_content"];

            if($statement->execute()){
                echo "contact info added";
                header("location: contact.php");
            }

            $statement->close();
        }
    }
} else {
    header("location: access_denied.php");
}


?>