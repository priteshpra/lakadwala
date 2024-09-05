<?php
SESSION_START();

include 'connection.php';
?>
<?php

$status = ($_POST['type'] == "true") ? 1 : 0;

$id = ($_POST['id'])?$_POST['id']:'';

$result = mysqli_query($conn, "update `user` SET status = $status WHERE id=$id") or die("Query Unsuccessful.");
if (mysqli_query($conn, $result)) {
    echo "successfully updated";
} else {
    echo "done";
}
?>
