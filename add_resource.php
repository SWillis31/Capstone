<?php
include("db_connect.php");

if ($_SESSION["role"] !== 'admin') {
    header("location: access_denied.php");
} else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql = "INSERT INTO resources (resource_link, resource_name) VALUES (?, ?)";

        if($statement = $conn->prepare($sql)){
            $statement->bind_param("ss", $resource_link, $resource_name);
            $resource_link = $_POST["resource_link"];
            $resource_name = $_POST["resource_name"];

            if($statement->execute()){
                echo "resource added";
            }
            $statement->close();
        }
        header("location:resources.php");
    }
}

?>
