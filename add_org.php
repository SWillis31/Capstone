<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<?php
$title="Add Organizations";
$extra_stylesheet="css/main_content.css";
include('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = "INSERT INTO student_orgs (org_name, org_description) 
                VALUES (?, ?)";
    if($statement = $conn->prepare($insert)){
        $statement->bind_param("ss", $name, $description);
        $name = $_POST["name"];
        $description = $_POST["description"];

        if($statement->execute()){
            echo "article posted";
        }
        $statement->close();
    }
    header("location: index.php");
}


?>

<form method="POST" action="add_org.php">
    Organization Name: <input type="text" name="name" required>
    <textarea name="description" id="editor" rows="10" cols="80"></textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>

<script>
CKEDITOR.editorConfig = function( config ) {
  config.extraPlugins = 'imageuploader';
};
CKEDITOR.replace('editor');
</script>

<?php 
include('footer.php');
?>