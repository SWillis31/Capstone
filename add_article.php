<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
include('db_connect.php');
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = "INSERT INTO articles (poster, date, title, content) 
                VALUES (?, NOW(), ?, ?)";
    if($statement = $conn->prepare($insert)){
        $statement->bind_param("sss", $poster, $post_title, $post_content);
        $poster = $_SESSION["username"];
        $post_title = $_POST["article_title"];
        $post_content = $_POST["article_content"];

        if($statement->execute()){
            echo "article posted";
        }
        $statement->close();
    }
    header("location: index.php");
}


?>

<form method="POST" action="add_article.php">
    Article Title: <input type="text" name="article_title">
    <textarea name="article_content" id="editor" rows="10" cols="80"></textarea>
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