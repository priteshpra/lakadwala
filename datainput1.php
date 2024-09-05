<?php

SESSION_START();
include 'connection.php';
// include 'admintemp/head.php';
// include 'admintemp/nav.php';


if ($_POST['type'] == "") {
    $result = mysqli_query($conn, 'SELECT * FROM category where flag=1') or die("Query Unsuccessful.");
    $str = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
    }
} else if ($_POST['type'] == "statedata") {
    $sub = 1;
    $catid = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id=$catid AND flag=1") or die("Query Unsuccessful.");
    $category = mysqli_query($conn, "SELECT * FROM category WHERE category_id=$catid AND flag=1") or die("Query Unsuccessful.");
    while ($row = mysqli_fetch_assoc($category)) {
        $catname = $row['category_name'];
    }
    $str = "";
    $id=1;
    if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        $image=$row['image'];
        $str .= "<table>
        <td>{$id}</td>
        <td>{$row['subcategory_name']}
        </td>
        <td>{$catname}
        </td>
        <td>
            <img src='sub_category/{$image}' style='width:70px'>
        </td>
        <td >
            <a href='subcategoryedit.php?subcatid={$row['subcategory_id']}&catid=$catid'>
                <button type='button' class='btn btn-success'>Edit</button>
            </a>
        </td>
         <td >
            <a href='deletetable.php?id={$row['subcategory_id']}&name=subcategory'>
                <button type='button' class='btn btn-success'>Delete</button>
            </a>
        </td>
    </table>
    ";
    $id++;
    }
}else{
    $str .= "<table>
        <td colspan='6' style='text-align:center'>No Data Available</td>
    </table>
    ";
}
} else if ($_POST['type'] == "statedata2") {
    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE subcategory_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
    }
}else if($_POST['type'] == 'brand'){
    
    $brandId = $_POST['id'];
    // echo "SELECT * FROM `category` WHERE category_id !=1 and flag=1 and brand_id=$brandId";die;
    $res = mysqli_query($conn, "SELECT * FROM `category` WHERE category_id !=1 and flag=1 and brand_id=$brandId") or die("Query Unsuccessful.");
    $str = "";
    $id=1;
    while ($row = mysqli_fetch_assoc($res)) {
        $str .= "<table>
                <td>{$id}</td>
                <td>{$row['category_name']}</td>
                <td> <img src='category/{$row["image"] }' alt='' style='width:50px'>
                </td>
                <td> <img src='category/{$row["banner"] }' alt='' style='width:100px'>
                </td>
                <td>
                    <a href='categoryedit.php?id={$row["category_id"] }'>
                        <button type='button' class='btn btn-success'>Edit</button>
                    </a>
                </td>
                <td>
                    <a href='deletetable.php?id={$row["category_id"] }&name=category'>
                        <button type='button' class='btn btn-success'>Delete</button>
                    </a>
                </td>
            </table>
            ";
        $id++;
    } 
}
else if($_POST['type']=="category")
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