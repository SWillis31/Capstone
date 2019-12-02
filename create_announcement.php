<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
include('db_connect.php');
$title="Create Announcement";
$extra_stylesheet="";
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = "INSERT INTO announcements (posted_by, created, announcement_title, content) 
                VALUES (?, NOW(), ?, ?)";
    if($statement = $conn->prepare($insert)){
        $statement->bind_param("sss", $poster, $title, $content);
        $poster = $_SESSION["username"];
        $title = $_POST["announcement_title"];
        $content = $_POST["content"];

        if($statement->execute()){
            echo "article posted";
        }
        $statement->close();
    }
    header("location: index.php");
}


?>

<form method="POST" action="create_announcement.php">
    Announcement Header: <input type="text" name="announcement_title" required>
    <textarea name="content" id="editor" rows="10" cols="80"></textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>

<script>
CKEDITOR.editorConfig = function( config ) {
  config.extraPlugins = 'imageuploader';
};
CKEDITOR.replace('editor');
</script>

<p>test</p>
<?php 
include('footer.php');
?>