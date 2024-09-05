<?php
SESSION_START();
include 'connection.php';
if(isset($_GET['name']) && $_GET['name']=='category')
{
$name=$_GET['name'];
$id=$_GET['id'];

$res = "UPDATE `category` SET `flag`=0 WHERE `category_id`=$id";
 if (mysqli_query($conn, $res)) {
        header('location:editcategory.php?reply=Product Deleted');
    } else {
        header('location:editcategory.php?reply=Can not delete the product from Table');
    }

}
elseif(isset($_GET['name']) && $_GET['name']=='subcategory')
{
$name=$_GET['name'];
$id=$_GET['id'];

$res = "UPDATE `sub_category` SET `flag`=0 WHERE `subcategory_id`=$id";
 if (mysqli_query($conn, $res)) {
        header('location:editsubcategory.php?reply=Product Deleted');
    } else {
        header('location:editsubcategory.php?reply=Can not delete the product from Table');
    }

}
elseif(isset($_GET['name']) && $_GET['name']=='product')
{
$name=$_GET['name'];
$id=$_GET['id'];

$res = "UPDATE `products` SET `flag`=0 WHERE `product_id`=$id";
 if (mysqli_query($conn, $res)) {
        header('location:editproduct.php?reply=Product Deleted');
    } else {
        header('location:editproduct.php?reply=Can not delete the product from Table');
    }

}
elseif(isset($_GET['name']) && $_GET['name']=='subproduct')
{
$name=$_GET['name'];
$id=$_GET['id'];

$res = "UPDATE `sub_product` SET `flag`=0 WHERE `sub_product_id`=$id";
 if (mysqli_query($conn, $res)) {
        header('location:editsubproduct.php?reply=Product Deleted');
    } else {
        header('location:editsubproduct.php?reply=Can not delete the product from Table');
    }

}
elseif(isset($_GET['name']) && $_GET['name']=='brand')
{
$name=$_GET['name'];
$id=$_GET['id'];

$res = "UPDATE `brand` SET `flag`=0 WHERE `brand_id`=$id";
 if (mysqli_query($conn, $res)) {
        header('location:editbrand.php?reply=Brand Deleted');
    } else {
        header('location:editbrand.php?reply=Can not delete the Brand');
    }

}

?>