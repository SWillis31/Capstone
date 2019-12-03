<?php
include("db_connect.php");
session_start();
$request = $_GET["parent_id"];

if($request != ""){
    $sql = "SELECT * FROM forum_posts WHERE parent_id = " . $request;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<div id='child_reply'>" . $row["reply_content"] . "<br><p>Posted By: " . $row["reply_user"] . " on " . $row["created"] . "<br>";
        echo "<a href='#here' onclick='loadReplies(\"" . $row["reply_id"] . "\")'>Load Replies</a>";
        if(isset($_SESSION["loggedin"])){
            if($_SESSION["loggedin"] == true){
                echo "<div id='forum_form'>
                    <form action='post_reply.php' method='POST'>
                        <textarea placeholder='Reply here' name='reply_content'></textarea><br>
                        <input class='hidden_id' name='parent_id' type='number' value='" . $row["reply_id"] . "' />
                        <input class='hidden_id' name='thread_id' type='number' value='" . $row["thread_id"] . "' />
                        <input type='submit' name='submit' value='Post Reply'/>
                    </form>
                </div>";
        }}
        if(isAdmin()){
            echo "<div class='admin_controls'>";
            echo "<a href='delete_post.php?post_id=" . $row["reply_id"] . "'>Delete Post</a>";
            echo "</div>";
        }
        echo "<div class='forum_reply' id='child_reply_parent" . $row["reply_id"] . "'></div>";

    }
    CloseConnection($conn);
}

?>

