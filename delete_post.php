<?php
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    $post_id = $_GET["post_id"];
    $sql = "SELECT thread_id FROM forum_posts WHERE reply_id = " . $post_id;
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $thread_id = $row["thread_id"];
    }

    $sql = "UPDATE forum_posts SET reply_content = 'Message Removed' WHERE reply_id = " . $post_id;
    $conn->query($sql);

    header("location:forum_thread.php?id=" . $thread_id);

}

?>