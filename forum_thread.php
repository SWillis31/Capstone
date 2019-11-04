<?php
include("header.php");
include("db_connect.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function loadReplies(parent_id) {
        $("#child_reply_parent" + parent_id).load("load_replies.php?parent_id=" + parent_id, parent_id, function(responseText, status) {});
    };
    // alert(parent_id);
    // alert("load_replies.php?parent_id=" + parent_id);
    // var xmlhttp = new XMLHttpRequest();

    // xmlhttp.onreadystatechange = function() {
    //     alert(this.readystate);
    //     alert(this.status);
    //     if(this.readyState == 4 && this.status == 200){
    //         alert("something");
    //         document.getElementById("child_reply").innerHTML = this.responseText;
    //     }
    // };
    // xhttp.open("GET", "load_replies.php?parent_id=" + parent_id, true);
    // xhttp.send();
</script>

<?php
$thread_id = $_GET["id"];
$sql = "SELECT * FROM forum_posts WHERE thread_id = " . $thread_id . " AND parent_id IS NULL";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='forum_post'>";
    echo "Posted By: " . $row["reply_user"] . "<br><p>" . $row["reply_content"] . "</p><br>";
    echo "<a href='#' onclick='loadReplies(\"" . $row["reply_id"] . "\")'>Load Replies</a>";
    echo "<div class='forum_reply' id='child_reply_parent" . $row["reply_id"] . "'></div>";
    echo "</div>";
}
CloseConnection($conn);
?>

<?php
// $root_post_query = "SELECT * FROM forum_posts WHERE post_id = " . $_GET["id"];

// $root_post = $conn->query($root_post_query);
// $row = $root_post->fetch_assoc();

//Searches the database for the replies to any given post. 
//$isParent changes the table from which the posts are selected, 
//depending on whether they are replies to the parent post of the thread
// function loadReplies($isParent, $thread_id, $conn)
// {
//     // include("db_connect.php");
//     if ($isParent == true) {
//         $sql = "SELECT * FROM forum_posts WHERE reply_parent_id = " . $_GET["id"] . " AND reply_to_thread_parent = 1";
//         $result = $conn->query($sql);
//         while ($row = $result->fetch_assoc()) {
//             echo "<div class='forum_post'>";
//             echo "Posted By: " . $row["reply_user"] . "<br>" . $row["reply_content"];
//             echo "This is a forum reply to the parent<br>";
//             loadReplies(false, $row["reply_id"], $conn);
//         }
//     } else {
//         if ($id != NULL) {
//             $sql = "SELECT * FROM forum_posts WHERE thread_id = " . $_GET["id"] . " AND reply_parent_id = " . $id . " AND reply_to_thread_parent = 0";
//             $result = $conn->query($sql) or die($conn->error);
//             while ($row = $result->fetch_assoc()) {
//                 echo "<div class='forum_reply'>";
//                 echo "Posted By: " . $row["reply_user"] . "<br>" . $row["reply_content"];
//                 echo "this is a forum reply to a child<br>";
//             }
//         }
//     }
//     echo "<div id='forum_reply_form'>";
//     echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $_GET["id"] . "' method='POST'>";
//     echo "</form></div>";
//}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = "INSERT INTO forum_posts (reply_content, reply_user, reply_date, thread_id) VALUES (?, ?, NOW(), ?)";
    if ($statement = $conn->prepare($insert)) {
        $statement->bind_param("ssi", $reply_content, $reply_user, $thread_id);
        $reply_content = $_POST["reply_content"];
        $reply_user = $_SESSION["username"];
        echo $reply_content  . $reply_user;
        $thread_id = $_GET["id"];
        echo "test";
        if ($statement->execute()) {
            echo "Reply Posted";
        }
        $statement->close();
    } else {
        echo "test failed";
    }
}
?>


<?php
include("footer.php");
?>