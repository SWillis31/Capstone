<?php
$title="Resources";
$extra_stylesheet="css/main_content.css";
include("header.php");


echo "<ul>";

$sql = "SELECT * FROM resources";

$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<li><a href='" . $row["resource_link"] . "' class='resource-link'>" . $row["resource_name"] . "</a></li>";
    if(isAdmin()){
        echo "<div class='admin_control'>";
        echo "<a href='remove_resource.php?id=" . $row["resource_id"] . "'>Delete Resource</a>"; 
        echo "</div>";
    }
}

echo "</ul>";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function openForm(){
        // document.getElementById("resource_form").style.visibility = "visibile";
        $(".add_resource_form").show();
    };
    function closeForm(){
        // document.getElementById("resource_form").style.visibility = "visibile";
        $(".add_resource_form").hide();
    };
</script>

<?php
if(isAdmin()){
    echo "<button class='open_form' onclick='openForm()'>Add Resource</button>";
    echo "<div class='add_resource_form' id='resource_form'>
            <form action='add_resource.php' method='POST'>
                <label for='resource_name'><b>Name</b></label>
                <input type='text' placeholder='Resource Name' name='resource_name' required><br>
                
                <label for='resource_link'><b>Link (Copy / Paste entire link)</b></label>
                <input type='text' placeholder='https://www.resource.com' name='resource_link' required><br> 
                
                <button type='submit' class='submit_button'>Add</button>
                <button type='button' class='cancel_button' onclick='closeForm()'>Cancel</button>
            </form>
        </div>
    ";

}

include("footer.php");

?>