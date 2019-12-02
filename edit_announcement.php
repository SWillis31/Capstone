<script src='//cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>

<?php
include("db_connect.php");
include("header.php");
if ($_SESSION["role"] !== 'admin') {
    header("location: access_denied.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "SELECT * FROM announcements WHERE announcement_id = " . $_GET["id"];
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "
        <form method='POST' action='update_announcement.php'>
            Announcement Header: <input type='text' name='announcement_title' value='" . $row["announcement_title"] . "'>
            <textarea name='content' id='editor' rows='10' cols='80'>" . $row["content"] . "</textarea>
            <input type='hidden' name='announcement_id' class='hidden_id' value='" . $row["announcement_id"] . "'>
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