<?php
include("db_connect.php");
include('header.php');

if (!isAdmin()) {
    header("location: access_denied.php");
} else {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM questions WHERE email='" . $_POST["search_email"] . "'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<div class='question_block'>";
            echo "<h3>" . $row["question"] . "</h3>";
            echo "<h5>Asked by " . $row["name"] . " on " . $row["date_asked"] . "</h5>";
            echo "<h6>Email: <a href='mailto:" . $row["email"] . "'>" . $row["email"] . "</a></h6>";
            if($row["resolved"] == 0){
                echo "<a href='view_questions.php?id=" . $row["question_id"] . "'>Mark as Resolved</a>";
            }
            echo "</div>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "UPDATE questions SET resolved = 1 WHERE question_id = " . $_GET["id"];
            if ($conn->query($sql)) {
                echo "Question Marked as resolved";
                header("location: index.php");
            }
        }
    }
    echo "<h1>Unanswered Questions</h1>";
    $sql = "SELECT * FROM questions WHERE resolved = 0";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='question_block'>";
        echo "<h3>" . $row["question"] . "</h3>";
        echo "<h5>Asked by " . $row["name"] . " on " . $row["date_asked"] . "</h5>";
        echo "<h6>Email: <a href='mailto:" . $row["email"] . "'>" . $row["email"] . "</a></h6>";
        echo "<a href='view_questions.php?id=" . $row["question_id"] . "'>Mark as Resolved</a>";
        echo "</div>";
    }

}

?>
<form method='POST' action='view_questions.php'>

    <label for='search_email'>Search for questions by email</label>
    <input type='text' name='search_email' id='search_email'>
    <input type='submit' value='submit'>
</form>
<?php 
include("footer.php");
?>