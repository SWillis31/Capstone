<?php
$title="Contact";
$extra_stylesheet="css/news.css";
include("header.php");

?>
<h1>Contact</h1>
<script>

function editContactInfo(contact_id){
    var id = contact_id;
    document.getElementById("contact_form" + id).style.visibility='visible';
}

function cancelEdit(contact_id){
    var id = contact_id;
    document.getElementById("contact_form" + id).style.visibility='hidden';
}

function addContact(){
    document.getElementById("add_contact_form").style.visibility='visible';
}

function cancelAddContact(){
    document.getElementById("add_contact_form").style.visibility='hidden';
}

</script>

<?php
echo "<div class='wrapper'><div class='news-articles'>";
$sql = "SELECT * FROM contact_info";
$result = $conn->query($sql);
$isAdmin = isAdmin();
while($row = $result->fetch_assoc()){
    echo "<div class='contact_item'>";
    echo "<b>" . $row["contact_title"] . "</b><p>" . $row["contact_content"] . "</p>";
    if($isAdmin){
        echo "<div class='admin_controls'>";
        echo "<a href='#here' class='contact_update_link' onclick='editContactInfo(" . $row["contact_id"] . ")'>Edit Contact Method</a><br>";
        echo "<a href='remove_contact.php?id=" . $row["contact_id"] . "'>Remove Contact</a>";
        echo "<form action='edit_contact.php?id=" . $row["contact_id"] . "' method='POST' class='hidden_contact_form' id='contact_form" . $row["contact_id"] . "'>
            <label for 'contact_title'><b>Contact Type</b></label>
            <input type='text' name='contact_title' placeholder='Phone Number, Fax, etc.'>

            <br>
            <label for 'new_contact_type'><b>Contact Information</b></label>
            <input type='text' name='contact_content' placeholder='501-xxx-xxx, username@ualr.edu, etc'>

            <input type='hidden' name='id' class='hidden_id' value='" . $row["contact_id"] . "'>
            <input type='submit' value='Submit'>

            <a href='#here' onclick='cancelEdit(" . $row["contact_id"] . ")'>Cancel</a><br>
            
        </form></div>";;
    }
    echo "</div>";
}

if($isAdmin){
    echo "<div class='admin_control'>";
    echo "<a href='#' class='contact_update_link' onclick='addContact()'>Add Contact Method</a>";
    echo "<form id='add_contact_form' action='add_contact.php' method='POST' style='visibility:hidden;'>";
    echo "<label for 'contact_title'><b>Contact Type</b></label>
            <input type='text' name='contact_title' placeholder='Phone Number, Fax, etc.'>

            <br>
            <label for 'contact_content'><b>Contact Information</b></label>
            <input type='text' name='contact_content' placeholder='501-xxx-xxx, username@ualr.edu, etc'><br>
            <a href='#' onclick='cancelAddContact()'>Cancel</a>
            <input type='submit' value='Submit'></form>";
    echo "</div>";
}
echo "</div>";
echo "<div class='quick_links'>";
    echo "<h2>Quick Links</h2>";
    echo "<ul><li><a href='index.php'>Home</a></li>";
    echo "<li><a href='News'>News</a></li>";
    echo "<li><a href='announcements.php'>Announcements</a></li>";
    echo "<li><a href='forum.php'>Forum</a></li>";
    echo "<li><a href='contact.php'>Contact</a></li>";
    echo "<li><a href='opportunities.php'>Opportunities</a></li>";
    echo "</div></div>";
include("footer.php");
?>