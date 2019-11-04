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
?>