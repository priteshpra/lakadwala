<?php
SESSION_START();
include 'connection.php';

$res = mysqli_query($conn, "SELECT `username`, `password` FROM `admin`") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res)) {
    $username= $row['username'];
    $password=$row['password'];
};

if(isset($_POST['name']) & isset($_POST['password']) & md5($_POST['password'])==$password & $_POST['name']==$username)
{ $name=$_POST['name'];
    $password=md5($_POST['password']);
    
    $_SESSION['user_name'] = $name;
    if(isset($_SESSION['user_name']))
    {
        header("location:admin.php");
    }
   
}
else
{
    header("location:javascript://history.go(-1)");
    exit;

}
?>