<?php

// open database connection
$dbhost = "localhost";
$dbuser = "xiong-ziling";
$dbpass = "T33GE9jYjznW";
$dbname = "2201613130225";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection is ok
if (mysqli_connect_errno()) {
    die("Database connction failed: " .
       mysqli_connect_error() . 
       " (" . mysqli_connect_errno() . ")"
    );
}
?>