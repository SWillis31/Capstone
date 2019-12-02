<?php
include('db_connect.php');
session_start();

if (isset($_SESSION["role"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $insert = "INSERT INTO forum_posts (reply_content, reply_user, parent_id, thread_id, created) 
                    VALUES (?, ?, ?, ?, NOW())";
        if($statement = $conn->prepare($insert)){
            $statement->bind_param("ssii", $reply_content, $reply_user, $parent_id, $thread_id);
            $reply_content = $_POST["reply_content"];
            $reply_user = $_SESSION["username"];
            if($_POST["parent_id"] === ''){
                $parent_id = NULL;
            }else{
                $parent_id = $_POST["parent_id"];
            }

            $thread_id = $_POST["thread_id"];

            if($statement->execute()){
                echo "reply posted";
            }
            $statement->close();
        }
        header("location: forum_thread.php?id=" . $_POST["thread_id"]);
    }
}

?>
