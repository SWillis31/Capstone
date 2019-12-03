<?php
include("db_connect.php");
$title="Ask Questions";
$extra_stylesheet="css/main_content.css";
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $insert = "INSERT INTO questions (name, email, question, date_asked, resolved) VALUES (?, ?, ?, NOW(), 0)";
    if($statement = $conn->prepare($insert)){
        $statement->bind_param("sss", $name, $email, $question);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $question = $_POST["question"];

        if($statement->execute()){
            echo "question posted";
            header("location: index.php");
        }
        else{
            echo $statement->error();
        }
        $statement->close();
    }
}

?>

<form method="POST" action="question.php">
    <label for='name'>Enter your name:</label>
    <input type="text" name='name' id='name' value='John Smith' required><br>

    <label for='email'>Enter your email: </label>
    <input type='text' name='email' id='email' value='example@email.com' required><br>

    <label for='question'>Enter your question here:</label><br>
    <textarea name='question' id='question' required>Question...</textarea>
    <input type='submit' name='submit' value='submit'>
</form>

<?php

include("footer.php");

?>