<?php
include("db_connect.php");

if ($_SESSION["role"] !== 'admin') {
    header("location: access_denied.php");
} else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $sql = "INSERT INTO opportunities (opp_link, opp_title, opp_description) VALUES (?, ?, ?)";

        if($statement = $conn->prepare($sql)){
            $statement->bind_param("sss", $opp_link, $opp_title, $opp_description);
            $opp_link = $_POST["opp_link"];
            $opp_title = $_POST["opp_title"];
            $opp_description = $_POST["opp_description"];

            if($statement->execute()){
                echo "resource added";
            }
            $statement->close();
        }
        header("location:opportunities.php");
    }
}

?>
