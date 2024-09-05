<?php
SESSION_START();
include 'connection.php';

if($_POST['type']=="")
{
    $result = mysqli_query($conn, 'SELECT * FROM category where flag=1') or die("Query Unsuccessful.");
    $str="";
    while ($row = mysqli_fetch_assoc($result)) {
        echo"{$row['image']}";
    }
}                                      