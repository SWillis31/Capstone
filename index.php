<?php
include('header.php');
include('db_connect.php');
?>

<link rel='stylesheet' href='css/index.css'>
<script>
    function openForm(form_name){
        document.getElementById(form_name).style.display = 'block';
    }

    function closeForm(form_name){
        document.getElementById(form_name).style.display = "none";
    }
</script>


<?php
if (isset($_SESSION["loggedin"])) {
    echo "<a href='logout.php'>Log Out</a>";
} else {
    echo "<a href='login.php'>Log in</a><br><a href='register.php'>Register</a>";
}
echo "<div class='column'>";
echo "<div class='about_widget widget'>";
echo "<h3>About</h3>";
$sql = "SELECT * FROM about_info";
$result = $conn->query($sql);
echo "<ul>";
while($row = $result->fetch_assoc()){
    echo "<li><a href='about.php?title=" . $row["title"] . "'>" . $row["title"] . "</a></li>";
    if(isAdmin()){
        echo "<div class='admin_control'>";
        echo "<a href='delete_about.php?id=" . $row["id"] . "'>Delete Page</a>";
        echo "</div>";
    }
}
echo "</ul>";
if(isAdmin()){
    echo "<a href='add_about.php'>Add About Item</a>";
}
// echo "<ul>
//         <li><a href='about.php'>About</a></li>
//         <li><a href='faq.php'>FAQ's</a></li>
//         <li><a href='programs.php'>Programs</a></li>
//         </ul>";


echo "</div>";
echo "<div class='opportunity_widget widget'>";

echo "<h3>Opportunities for Students</h3><ul>";
$sql = "SELECT * FROM opportunities";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<li><a href='opportunity_page.php?id=" . $row["opp_id"] . "'>" . $row["opp_title"] . "</a></li>";
    if (isAdmin()) {
        echo "<div class='admin_control'>";
        echo "<a href='remove_opp.php?id=" . $row["opp_id"] . "'>Delete Opportunity</a>";
        echo "</div>";
    }
}
if(isAdmin()){
    echo "<a href='add_opp.php'>Add Opportunity Item</a>";
}
echo "<h4>Student Organizations</h4>";

$sql = "SELECT * FROM student_orgs";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<li><a href='student_org.php?id=" . $row["org_id"] . "'>" . $row["org_name"] . "</a></li>";
    if (isAdmin()) {
        echo "<div class='admin_control'>";
        echo "<a href='remove_org.php?id=" . $row["org_id"] . "'>Delete Organization Page</a>";
        echo "</div>";
    }
}
echo "<a href='add_org.php'>Add Student Organization</a>";

echo "</div>";

echo "<div class='resources_widget widget'>";
echo "<h3>Helpful Resources</h3>";
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
if(isAdmin()){
    
    echo "<div class='admin_control'><a href='#' onclick='openForm(\"add_resource_form\")'>Add Resource</a>";
    echo "<div id='resource_form'>
            <form action='add_resource.php' method='POST' id='add_resource_form' style='display:none;'>
                <label for='resource_name'><b>Name</b></label>
                <input type='text' placeholder='Resource Name' name='resource_name' required><br>
                
                <label for='resource_link'><b>Link (Copy / Paste entire link)</b></label>
                <input type='text' placeholder='https://www.resource.com' name='resource_link' required><br> 
                
                <button type='submit' class='submit_button'>Add</button>
                <a href='#' class='cancel_button' onclick='closeForm(\"add_resource_form\")'>Cancel</a>
            </form>
        </div></div>
    ";

}
echo "</ul>";
echo "</div>";


echo "</div>"; //column

echo "<div class='column'>";
echo "<div class='announcement_widget widget'>";
echo "<h3>Announcements</h3>";
$sql = "SELECT * FROM announcements ORDER BY created DESC LIMIT 3";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='announcement_item'><h4>" . $row["announcement_title"] . "</h4>" . $row["content"] . "<br>Posted by: " . $row["posted_by"] . "<br>On " . $row["created"] . "</div>";
}
if(isAdmin()){
    echo "<div class='admin_control'>";
    echo "<a href='create_announcement.php'>Create New Announcement</a><br>";
    echo "</div>";
}
echo "<a href='announcements.php'>View All Announcements</a>";
echo "</div>";
echo "<div class='news_widget widget'>";
echo "<h3>Department News</h3>";
$sql = "SELECT * FROM articles WHERE post_id != 13 ORDER BY created DESC LIMIT 5";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='news_article'><h3><a href='article.php?id=" . $row["post_id"] . "'>" . $row["title"] . "</a></h3>" . $row["created"];
    //Moved to news.php, titles will be links to individual news items
    // echo $row["content"];
    if (isAdmin()) {
        echo "<div class='admin_control'>";
        echo " <br><a href='edit_article.php?id=" . $row["post_id"] . "'>Edit Article</a>";
        echo "<br><a href='delete_article.php?id=" . $row["post_id"] . "'>Delete Article</a></div>";
        echo "</div>";
    }
}
echo "<br><a href='news.php'>Browse all news articles</a>";
if (isAdmin()) {
    echo "<br><a href='add_article.php'>Add Article</a> ";
}
echo "</div>";
echo "<div class='calendar_contact_group'>";
echo "<div class='calendar_widget widget'>";
?>
<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FChicago&amp;src=c2FtdHVycmV0MzFAZ21haWwuY29t&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZW4udXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%233366CC&amp;color=%23329262&amp;color=%231F753C&amp;showPrint=0&amp;showTabs=0" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
<!-- echo "<iframe src='https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FChicago&amp;src=c2FtdHVycmV0MzFAZ21haWwuY29t&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZW4udXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%233366CC&amp;color=%23329262&amp;color=%231F753C' style='border:solid 1px #777' width='100%' height='100%' frameborder='0' scrolling='no'></iframe>"; -->
<?php
echo "</div>";
echo "<div class='contact_widget widget'>";
echo "<h3>Contact</h3>";
$sql = "SELECT * FROM contact_info";
$result = $conn->query($sql);
$isAdmin = isAdmin();
while ($row = $result->fetch_assoc()) {
    echo "<b>" . $row["contact_title"] . "</b><p>" . $row["contact_content"] . "</p>";

    if ($isAdmin) {
        echo "<div class='admin_control'>";
        echo "<a href='#' class='contact_update_link' onclick='editContactInfo(" . $row["contact_id"] . ")'>Edit Contact Method</a><br>";
        echo "<a href='remove_contact.php?id=" . $row["contact_id"] . "'>Remove Contact</a>";
        echo "<form action='edit_contact.php?id=" . $row["contact_id"] . "' method='POST' class='hidden_contact_form' id='contact_form" . $row["contact_id"] . "'>
            <label for 'contact_title'><b>Contact Type</b></label>
            <input type='text' name='contact_title' placeholder='Phone Number, Fax, etc.'>

            <br>
            <label for 'new_contact_type'><b>Contact Information</b></label>
            <input type='text' name='contact_content' placeholder='501-xxx-xxx, username@ualr.edu, etc'>

            <input type='hidden' name='id' class='hidden_id' value='" . $row["contact_id"] . "'>
            <input type='submit' value='Submit'>

            <a href='#' onclick='cancelEdit(" . $row["contact_id"] . ")'>Cancel</a><br>
            
        </form></div>";;
    }
}
echo "Have a question? <a href='question.php'>Leave us a message!</a>";
if ($isAdmin) {
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

echo "</div></div>";
echo "</div>"; //column
if(isAdmin()){
    echo "<div class='admin_controls'>";
    echo "<a href='view_questions.php'>View Questions</a><br>";
    echo "<a href='view_users.php'>View Users</a>";
    echo "</div>";
}

?>