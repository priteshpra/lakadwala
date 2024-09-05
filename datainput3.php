<?php
SESSION_START();
include 'connection.php';

if ($_POST['type'] == "") {
    $result = mysqli_query($conn, 'SELECT * FROM category where flag=1') or die("Query Unsuccessful.");
    $str = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
    }
} else if ($_POST['type'] == "statedata" or $_POST['type'] == "statedata1") {
    $sub = 1;
    $result = mysqli_query($conn, "SELECT * FROM sub_category WHERE category_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str = "";
    $str .= "<option value=''>Select sub-category</option>";
    $str .= "<option value='0'>Show Category Products</option>";
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $str .= "<option value='{$row['subcategory_id']}'>{$row['subcategory_name']}</option>";
        }
    }
} else if ($_POST['type'] == "statedata2") {
    $str = "";
    if ($_POST['id'] == 0) {
        $result = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE subcategory_id=$_POST[id] AND product_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
        $id = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $img = $row['file_name'];
            $image = explode(",", $img);

            $str .= "<table>
            <td>{$id}</td>
            <td>{$row['sub_product_name']}
            </td>
            <td>{$row['model_no']}
            </td>
            <td>
                <img src='sub_product/{$image[0]}' style='width:50px'>
            </td>
            <td >
                <a href='subproductedit.php?id={$row['sub_product_id']}'>
                    <button type='button' class='btn btn-success'>Edit</button>
                </a>
            </td>
             <td>
                <a href='deletetable.php?id={$row['sub_product_id']}&name=subproduct'>
                    <button type='button' class='btn btn-success'>Delete</button>
                </a>
            </td>
        </table>";
            $id++;
        }
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `products` WHERE subcategory_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
        $str .= "<option value=''>Select product</option>";
        $str .= "<option value='0'>Show Sub-Category Products</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $str .= "<option value='{$row['product_id']}'>{$row['product_name']}</option>";
        }
    }
} else if ($_POST['type'] == "create") {
    // echo "SELECT * FROM `sub_product` WHERE product_id=$_POST[id] AND flag=1";
    // print_r($_POST);die;
    if (is_array($_POST['id'])) {
        $categoryId = $_POST['id']['categoryId'];
        $proId = ($_POST['id']['product'] ? $_POST['id']['product'] : 0);
        $subcategory_id = $_POST['id']['sub_category1'];
        $whr = "product_id= $proId AND category_id =$categoryId AND subcategory_id =$subcategory_id AND flag=1";
    } else {
        $whr = "product_id=$_POST[id] AND flag=1";
    }
    // echo "SELECT * FROM `sub_product` WHERE $whr ";die;
    $result = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE $whr ") or die("Query Unsuccessful.");
    $str = "";
    $id = 1;
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $img = $row['file_name'];
            $image = explode(",", $img);

            $str .= "<table>
            <td>{$id}</td>
            <td>{$row['sub_product_name']}
            </td>
            <td>{$row['model_no']}
            </td>
            <td>
                <img src='sub_product/{$image[0]}' style='width:50px'>
            </td>
            <td >
                <a href='subproductedit.php?id={$row['sub_product_id']}'>
                    <button type='button' class='btn btn-success'>Edit</button>
                </a>
            </td>
            <td>
                <a href='deletetable.php?id={$row['sub_product_id']}&name=subproduct'>
                    <button type='button' class='btn btn-success'>Delete</button>
                </a>
            </td>
        </table>";
            $id++;
        }
    } else {
        $str .= "<table>
                <td colspan='5'>No Products</td>
            </table>
            ";
    }
} else if ($_POST['type'] == "category") {
    $result = mysqli_query($conn, "SELECT * FROM `category` WHERE brand_id=$_POST[id] AND flag=1") or die("Query Unsuccessful.");
    $str = "";
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $str .= "<option value=''>Select catogory</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $str .= "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
        }
    } else {

        $str .= "<option value=''>No Category</option>";
    }
}
echo $str;
