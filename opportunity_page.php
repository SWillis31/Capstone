<?php

$title="Opportunities";
$extra_stylesheet="css/news.css";
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "SELECT * FROM opportunities WHERE opp_id = " . $_GET["id"];

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<h1 class='page_heading'>" . $row["opp_title"] . "</h1>";
        echo $row["opp_description"];
    }

    if(isAdmin()){
        echo "<a href='edit_opportunity.php?id=" . $_GET["id"] . "'>Edit Opportunity Page</a>";
    }
}


?>