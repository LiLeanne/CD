<?php
//start session
session_start();

//if the session variable is not set, redirect to loginpage.php
if (!isset($_SESSION['login_user'])) {
    header('Location: loginpage.php');

}
if ($_SESSION['login_level'] >= $pagelevel) {
    echo "Hello, welcome !";
} else {
    header('location: error.php');
}
?>