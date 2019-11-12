<?php
include("header.php");
include("db_connect.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
    function loadReplies(parent_id) {
        $("#child_reply_parent" + parent_id).load("load_replies.php?parent_id=" + parent_id, parent_id, function(responseText, status) {});
    };
</script>

<?php
$thread_id = $_GET["id"];
$sql = "SELECT * FROM forum_posts WHERE thread_id = " . $thread_id . " AND parent_id IS NULL";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='forum_post'>";
    echo "Posted By: " . $row["reply_user"] . "<br><p>" . $row["reply_content"] . "</p><br>";
    echo "<a href='#' onclick='loadReplies(\"" . $row["reply_id"] . "\")'>Load Replies</a>";
    if(isset($_SESSION["loggedin"])){
        if($_SESSION["loggedin"] == true){
            echo "<div id='forum_form'>
            <form action='post_reply.php' method='POST'>
                <textarea placeholder='Reply here' name='reply_content'></textarea><br>
                <input type='submit' name='submit' value='Post Reply'/>
                <input class='hidden_id' name='parent_id' type='number' value='" . $row["reply_id"] . "' />
                <input class='hidden_id' name='thread_id' type='number' value='" . $row["thread_id"] . "' />
            </form>
            </div>";
    }}
    else{
        echo "Not logged in";
    }
    echo "<div class='forum_reply' id='child_reply_parent" . $row["reply_id"] . "'></div>";
    echo "</div>";
}
CloseConnection($conn);
?>

<?php
echo "<div id='forum_form'>
<form action='post_reply.php' method='POST'>
    <textarea placeholder='Reply here' name='reply_content'></textarea><br>
    <input type='submit' name='submit' value='Post Reply'/>
    <input class='hidden_id' name='parent_id' type='text' value='' />
    <input class='hidden_id' name='thread_id' type='number' value='" . $_GET["id"] . "' />
</form>
</div>";

?>


<?php
include("footer.php");
?>