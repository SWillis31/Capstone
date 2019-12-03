<script src='//cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>

<?php
include("db_connect.php");
$title="Edit Organization";
$extra_stylesheet="css/main_content.css";
include("header.php");
if ($_SESSION["role"] !== 'admin') {
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "SELECT * FROM student_orgs WHERE org_id = " . $_GET["id"];
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "
        <form method='POST' action='update_org.php'>
            Article Title: <input type='text' name='org_name' value='" . $row["org_name"] . "'>
            <textarea name='org_description' id='editor' rows='10' cols='80'>" . $row["org_description"] . "</textarea>
            <input type='hidden' name='org_id' class='hidden_id' value='" . $row["org_id"] . "'>
            <input type='submit' name='submit' value='SUBMIT'>
        </form>
        ";
        }
    }
}

?>



<script>
    CKEDITOR.editorConfig = function(config) {
        config.extraPlugins = 'imageuploader';
    };
    CKEDITOR.replace('editor');
</script>
<?php
include('footer.php');
?>