<?php
include("db_connect.php");

$request = $_GET["parent_id"];

if($request != ""){
    $sql = "SELECT * FROM forum_posts WHERE parent_id = " . $request;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<div id='child_reply'>" . $row["reply_content"] . "<br><p>Posted By: " . $row["reply_user"] . " on " . $row["created"] . "<br>";
        echo "<a href='#' onclick='loadReplies(\"" . $row["reply_id"] . "\")'>Load Replies</a>";
        echo "<div class='forum_reply' id='child_reply_parent" . $row["reply_id"] . "'></div>";

    }
    CloseConnection($conn);
}


?>