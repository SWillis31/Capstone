<?php
session_start();
include("db_connect.php");
?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <title><?php echo $title;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="<?php echo $extra_stylesheet;?>">
    </head>
    
    <body>
        <div id='banner' onclick="location.href='index.php';" style='cursor:pointer;'> 
            <p class='banner_text'>Computer Science</p>
        </div>
        <?php
        if($title === "UALR Computer Science"){
            $sql = "SELECT * FROM about_info WHERE id=5";
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()){
                echo "<div class='welcome_message'>";
                echo "<h3>" . $row["title"] . "</h3>" . $row["content"];
                if(isAdmin()){
                    echo "<div class='admin_controls'><a href='edit_article.php?about_id=6'>Edit Welcome Message</a></div>";
                }
                echo "</div>";
            }

        }
        ?>
        <!-- <div id="navbar">
            <a href="index.php">Home</a>
            <a href="news.php">Department News</a>
            <a href="opportunities.php">Student Opportunities</a>
            <a href="resources.php">Student Resources</a>
            <a href="forum.php">Student Forum</a>
            <a href="contact.php">Contact</a>
        </div> -->
        <div class="main_container">