<?php
include("db_connect.php");
$title="Opportunities";
$extra_stylesheet="css/main_content.css";
include("header.php");

echo "<div class='opportunity-list'>";
$sql = "SELECT * FROM opportunities";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<h1>" . $row["opp_title"] . "</h1>";
    echo "<p>" . $row["opp_description"] . "</p>";
    if(isAdmin()){
        echo "<div class='admin_control'>";
        echo "<a href='remove_opp.php?id=" . $row["opp_id"] . "'>Delete Opportunity</a>"; 
        echo "</div>";
    }
}
echo "</div>";
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    function openForm(){
        document.getElementById("resource_form").style.display = 'block';
        // $(".add_opp_form").show();
    }
    function closeForm(){
        document.getElementById("resource_form").style.display = "none";
        // $(".add_opp_form").hide();
    }
</script>

<?php
if(isAdmin()){
    echo "<a href='#' onclick='openForm()'>Add Opportunity Item</a>";
    echo "<div class='add_opp_form'>
            <form action='add_opp.php' method='POST' id='resource_form' style='display:none;'>
                <label for='opp_title'><b>Name</b></label>
                <input type='text' placeholder='Resource Name' name='opp_title' required><br>
                
                
                <label for='opp_description'><b>Description</b></label>
                <textarea placeholder='Description' name='opp_description' id='editor' required></textarea><br>
                <button type='submit' class='submit_button' onclick='closeForm()'>Add</button>
                <button type='button' class='cancel_button' onclick='closeForm()'>Cancel</button>
            </form>
        </div>
    ";

}

include("footer.php");
?>

<script>
CKEDITOR.editorConfig = function( config ) {
  config.extraPlugins = 'imageuploader';
};
CKEDITOR.replace('editor');
</script>