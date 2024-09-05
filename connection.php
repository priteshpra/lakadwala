<?php
$conn = mysqli_connect('localhost', 'root', '', 'lakadwala');
// check for connection error
if ($conn->connect_error) {
    die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

$imageBlank = 'https://cdn.dribbble.com/users/3512533/screenshots/14168376/web_1280___8_4x.jpg';
?>
