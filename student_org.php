<?php
include("db_connect.php");
$title="Student Organization";
$extra_stylesheet="";
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "SELECT * FROM student_orgs WHERE org_id = " . $_GET["id"];

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<h2>" . $row["org_name"] . "</h2>";
        echo $row["org_description"];
    }

    if(isAdmin()){
        echo "<a href='edit_org.php?id=" . $_GET["id"] . "'>Edit Organization Page</a>";
    }
}


?>