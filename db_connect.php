<?php

    function OpenDB()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "capstone_test";

        global $conn;
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: &s\n". $conn -> error);

        return $conn;
    }

    function CloseConnection($conn)
    {
        $conn -> close();
    }

    $conn = OpenDB();

    function isAdmin(){
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "admin") {
                return true;
            }else{
                return false;
            }
        }
    }

?>