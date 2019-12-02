<?php
include("db_connect.php");
$title="Add Opportunities";
$extra_stylesheet="";
include("header.php");

?>
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
if(isAdmin()){
    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $sql = "INSERT INTO opportunities (opp_title, opp_description) VALUES (?, ?)";
        echo $sql;
        if($statement = $conn->prepare($sql)){
            $statement->bind_param("ss", $opp_title, $opp_description);
            $opp_title = $_POST["opp_title"];
            $opp_description = $_POST["opp_description"];

            if($statement->execute()){
                echo "resource added";
            }
            $statement->close();
        }
        header("location:index.php");
    }
}
?>

<form method="POST" action="add_opp.php">
    Article Title: <input type="text" name="opp_title" required>
    <textarea name="opp_description" id="editor" rows="10" cols="80"></textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>

<script>
CKEDITOR.editorConfig = function( config ) {
  config.extraPlugins = 'imageuploader';
};
CKEDITOR.replace('editor');
</script>
