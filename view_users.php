<?php
include("db_connect.php");
$title="Users";
$extra_stylesheet="css/main_content.css";
include("header.php");

if (!isAdmin()) {
    header("location: access_denied.php");
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $sql = "UPDATE users SET role='user' WHERE id=" . $_GET["id"];
        $conn->query($sql);
    }
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<h1>Users</h1>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<div class='user_block' style='border: 1px solid black;'>";
    echo "<h3>Username: " . $row["username"] . "</h3>
		<h4>Role: " . $row["role"] . "</h4>";
    if ($row["role"] == 'admin') {
        echo "<a href='view_users.php?id=" . $row['id'] . "'>Revoke administrator access</a>";
    }
    echo "</div>";
}

include("footer.php");
