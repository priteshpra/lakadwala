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
{   
    $sub=1;
    $result = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $str.="<option value=''>select sub-category</option>";
    $num = mysqli_num_rows($result);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $str.="<option value='{$row['subcategory_id']}'>{$row['subcategory_name']}</option>";
        }
    }
    // else{
    //     $str.="<option value='0'>Only Category Products</option>";
    // }
}
else if($_POST['type']=="statedata2")
{
    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE subcategory_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $id=1;
    $num = mysqli_num_rows($result);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($result)) {
                $image=$row['image'];
                $str .= "<table>
                <td>{$id}</td>
                <td>{$row['product_name']}
                </td>
                <td>
                    <img src='products/{$image}' style='width:70px'>
                </td>
                <td >
                    <a href='productedit.php?id={$row['product_id']}'>
                        <button type='button' class='btn btn-success'>Edit</button>
                    </a>
                </td>
                <td>
                <a href='deletetable.php?id={$row['product_id']}&name=product'>
                        <button type='button' class='btn btn-success'>Delete</button>
                    </a>
                </td>
            </table>
            ";
            $id++;
        }
    }else{
        $str .= "<table>
                <td colspan='5'>No Products</td>
            </table>
            ";
    }
}else if($_POST['type']=="category")
{
    $result = mysqli_query($conn, "SELECT * FROM `category` WHERE brand_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str="";
    $num = mysqli_num_rows($result);
    if($num > 0){
        $str.="<option value=''>Select catogory</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $str.="<option value='{$row['category_id']}'>{$row['category_name']}</option>";
        }
    }else{
        
        $str.="<option value=''>No Category</option>";
    }
}
echo $str;
