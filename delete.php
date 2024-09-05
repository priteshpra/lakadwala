<?php
session_start();
if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'remove')
{
  
unset($_SESSION['cart'][$_GET['item']]);
}
if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    unset($_SESSION['cart']);
}
header('location:cart1.php');
exit();
?>