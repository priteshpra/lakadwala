<?php
SESSION_START();
unset($_SESSION["user_name"]);
 header("location:index.php");
?>