<?php
SESSION_START();
include 'connection.php';

if($_POST['type']=="")
{
    $result = mysqli_query($conn, 'SELECT * FROM category where flag=1') or die("Query Unsuccessful.");
    $str="";
    while ($row = mysqli_fetch_assoc($result)) {
        $str.="<option value='{$row['category_id']}'>{$row['category_name']}</option>";
    }
}
else if($_POST['type']=="statedata" or $_POST['type']=="statedata1")
{   $sub=1;
    $result = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $str.="<option value=''>select sub-category</option>";
    $num = mysqli_num_rows($result);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $str.="<option value='{$row['subcategory_id']}'>{$row['subcategory_name']}</option>";
        }
    }else{
        $str.="<option value=''>No sub-category</option>";
    }
}
else if($_POST['type']=="statedata2")
{
    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE subcategory_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $str.="<option value=''>select product</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $str.="<option value='{$row['product_id']}'>{$row['product_name']}</option>";
    }
}
else if($_POST['type']=="category")
{
    $result = mysqli_query($conn, "SELECT * FROM `category` WHERE brand_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $num = mysqli_num_rows($result);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $str.="<option value='{$row['category_id']}'>{$row['category_name']}</option>";
        }
    }
}
echo $str;
?>