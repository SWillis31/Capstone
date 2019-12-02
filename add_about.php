<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
include('db_connect.php');
$title="Add About";
$extra_stylesheet="";
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = "INSERT INTO about_info (title, content) 
                VALUES (?, ?)";
    if($statement = $conn->prepare($insert)){
        $statement->bind_param("ss", $title, $content);
        $poster = $_SESSION["username"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        if($statement->execute()){
            echo "article posted";
        }
        $statement->close();
    }
    header("location: index.php");
}


?>

<form method="POST" action="add_about.php">
    Article Title: <input type="text" name="title" required>
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