<?php
include("db_connect.php");
include("header.php");

echo "<div class='opportunity-list'>";
$sql = "SELECT * FROM opportunities";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<h3>" . $row["opp_title"] . "</h3>";
    echo "<p>" . $row["opp_description"] . "</p>";
    echo "<a href='" . $row["opp_link"] . "'>Link</a>";
    if(isAdmin()){
        echo "<div class='admin_control'>";
        echo "<a href='remove_opp.php?id=" . $row["opp_id"] . "'>Delete Opportunity</a>"; 
        echo "</div>";
    }
}
echo "</div>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function openForm(){
        // document.getElementById("resource_form").style.visibility = "visibile";
        $(".add_opp_form").show();
    };
    function closeForm(){
        // document.getElementById("resource_form").style.visibility = "visibile";
        $(".add_opp_form").hide();
    };
</script>

<?php
if(isAdmin()){
    echo "<button class='open_form' onclick='openForm()'>Add Resource</button>";
    echo "<div class='add_opp_form' id='resource_form'>
            <form action='add_opp.php' method='POST'>
                <label for='opp_title'><b>Name</b></label>
                <input type='text' placeholder='Resource Name' name='opp_title' required><br>
                
                <label for='opp_link'><b>Link (Copy / Paste entire link)</b></label>
                <input type='text' placeholder='https://www.resource.com' name='opp_link' required><br> 
                
                <label for='opp_description'><b>Description</b></label>
                <input type='text' placeholder='Description' name='opp_description' required><br>
                <button type='submit' class='submit_button' onclick='closeForm()'>Add</button>
                <button type='button' class='cancel_button' onclick='closeForm()'>Cancel</button>
            </form>
        </div>
    ";

}

include("footer.php");
?>