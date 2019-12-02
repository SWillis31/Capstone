<?php
include("db_connect.php");
session_start();

if(!isAdmin()){
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "UPDATE student_orgs SET org_description = '" . $_POST["org_description"] . "', org_name = '" . $_POST["org_name"] . "' WHERE org_id= " . $_POST["org_id"];
        if ($conn->query($sql) === TRUE) {
            echo "Updated article";
        } else {
            echo "Failed to update article" . $conn->error;
        }
    }
}

header("location: index.php");

?>