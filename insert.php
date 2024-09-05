<?php
SESSION_START();
// Database Connections
include 'connection.php';

if(isset($_SESSION['user_name']))
{

// brand insert
if (isset($_POST['brand_name'])) {
    $brand_name = $_POST['brand_name'];
    $name = $_FILES['image']['name'];
    $name1 = $_FILES['image1']['name'];
    $short=$_POST['short_description'];
    $target_dir = "brand/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    $filename = $target_file;
    $filename1= $target_file1;
    $getCatNameUniq = mysqli_query($conn, "SELECT brand_name FROM `brand` WHERE brand_name='".trim($brand_name)."' AND flag=1") or die("Query Unsuccessful.");
    $num = mysqli_num_rows($getCatNameUniq);
    if($num > 0){
        header('location:addbrand.php?id=Error ! Al-ready exist Please try Another Brand');
        exit;
    }
    if (file_exists($filename) && file_exists($filename1)) {
        header('location:addbrand.php?id=The file exists Please change the name of the file.........');
    } else {
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $extensions_arr) & in_array($imageFileType1, $extensions_arr)) {
            // Upload file
            if ((move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name)) && (move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $name1))) {
                // Insert record
                $insert = "INSERT INTO `brand`(`brand_id`, `brand_name`, `image`, `banner`, `description`,`flag`) VALUES (DEFAULT,'$brand_name','$name','$name1','$short',1)";
                if (mysqli_query($conn, $insert)) {
                    header('location:addbrand.php?id=Product Added Successfully');
                } else {
                    header('location:addbrand.php?id=Error ! Please Try Again');
                }
            }
        }
        else
        {
            header('location:addbrand.php?id=Please check file extension(jpg,jpeg,png,gif only allowed)');
        }
    }
}

// Category Insert
if (isset($_POST['c_name'])) {
    $c_name = $_POST['c_name'];
    $short_description = $_POST['short_description'];
    $brand_id=$_POST['brand'];
    $advantages = $_POST['advantages'];
    $who_use_tools = $_POST['who_use_tools'];
    $where_are_tools_used = $_POST['where_are_tools_used'];
    $how_to_use = $_POST['how_to_use'];
    $description = $_POST['desc'];
    $name = $_FILES['photo']['name'];
    $name1 = $_FILES['image1']['name'];
    $target_dir = "category/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $getCatNameUniq = mysqli_query($conn, "SELECT category_name FROM `category` WHERE category_name= '".trim($c_name)."' AND flag=1") or die("Query Unsuccessful.");
    $num = mysqli_num_rows($getCatNameUniq);
    if($num > 0){
        header('location:addcategory.php?id=Error ! Al-ready exist Please try Another category');
        exit;
    }
    // Check extension
    if (in_array($imageFileType, $extensions_arr) & in_array($imageFileType1, $extensions_arr)) {
        // Upload file

        if ((move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $name)) && (move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $name1)) ) {
            // Insert record
            $insert = "INSERT INTO `category` (`category_id`, `category_name`,`image`, `small_description`, `advantages`, `who_use`, `where_use`, `how_to_use`, `description`,`banner`,`flag`, `brand_id`) VALUES (default, '$c_name','$name', '$short_description', '$advantages', '$who_use_tools', '$where_are_tools_used', '$how_to_use', '$description',' $name1',1,$brand_id)";
            if (mysqli_query($conn, $insert)) {
                header('location:addcategory.php?id=Category Added Successfully');
            } else {
                header('location:addcategory.php?id=Error ! Please Try Again');
            }
        } else {
            header('location:addcategory.php?id=Please check file extension(jpg,jpeg,png,gif only allowed)');
        }
    } else {
        header('location:addcategory.php?id=Please check file extension(jpg,jpeg,png,gif only allowed)');
    }
}
// Sub_category insert
if (isset($_POST['subcategory_submit'])) {
    $subcategory_name = $_POST['subcategory_name'];
    $brand_id=$_POST['brand'];
    $category_id = $_POST['category_id'];
    $name = $_FILES['image']['name'];
    $target_dir = "sub_category/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $getCatNameUniq = mysqli_query($conn, "SELECT subcategory_name FROM `sub_category` WHERE subcategory_name= '".trim($subcategory_name)."' AND flag=1") or die("Query Unsuccessful.");
    $num = mysqli_num_rows($getCatNameUniq);
    if($num > 0){
        header('location:addsubcategory.php?id=Error ! Al-ready exist Please try Another Sub-Category');
        exit;
    }
    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name)) {
            // Insert record
            $insert = "insert into sub_category (subcategory_name,category_id,image,flag,brand_id) VALUES('$subcategory_name',$category_id,'$name',1,0)";
            if (mysqli_query($conn, $insert)) {
                header('location:addsubcategory.php?id=Sub-Category Added Successfully');
            } else {
                header('location:addsubcategory.php?id=Please check file extension(jpg , jpeg , png , gif only allowed)');
            }
        }
    }
    else{
        header('location:addsubcategory.php?id=Please check file extension(jpg , jpeg , png , gif only allowed)');
    }
    // header('location:index.php');
}

// Product insert
if (isset($_POST['product_submit'])) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id=$_POST['brand'];
    $sub_category = ($_POST['subcategory_id'])?$_POST['subcategory_id']:0;
    $name = time().'_'.$_FILES['image']['name'];
    $target_dir = "products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    $getCatNameUniq = mysqli_query($conn, "SELECT product_name FROM `products` WHERE product_name= '".trim($product_name)."' AND flag=1") or die("Query Unsuccessful.");
    $num = mysqli_num_rows($getCatNameUniq);
    if($num > 0){
        header('location:addproduct.php?id=Error ! Al-ready exist, Please try Another SUB CATEGORY 2');
        exit;
    }
    if (file_exists($target_file)) {
        header('location:addproduct.php?id=The file exists Please change the name of the file.........');
       exit;
    } else {
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name)) {
                // Insert record
                $insert = "insert into products (product_name,category_id,subcategory_id,image,flag,brand_id) VALUES('$product_name',$category_id,$sub_category,'$name',1,$brand_id)";
                if (mysqli_query($conn, $insert)) {
                    header('location:addproduct.php?id=SUB CATEGORY 2 Added Successfully');
                } else {
                    header('location:addproduct.php?id=Please check file extension(jpg , jpeg , png , gif only allowed)');
                }
            }
        }
        else{
            header('location:addproduct.php?id=Please check file extension(jpg , jpeg , png , gif only allowed)');
        }
    }
}

if(isset($_POST['addsubproduct_submit'])){ 
    // File upload configuration 
    $targetDir = "sub_product/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     $brand=$_POST['brand'];
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= $fileName.","; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
       
        
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            if(isset($_POST['category_id']) AND isset($_POST['subcategory_id2']) AND isset($_POST['product']) AND isset($_POST['sub_product']) AND isset($_POST['model_no']) AND isset($_POST['brand']))
            {
            $array = explode(',', $insertValuesSQL);
            $string_version = implode(',', $array);
            $category_id=$_POST['category_id'];
            $sub_category_id=$_POST['subcategory_id2'];
            $product_id=14;
            $sub_product_name=$_POST['sub_product'];
            $model_no=$_POST['model_no'];
            $brand_id=$_POST['brand'];
            $short=$_POST['short'];
            $features=$_POST['features'];
            $specification=$_POST['specification'];
            $download=$_POST['download_link'];

            $getCatNameUniq = mysqli_query($conn, "SELECT sub_product_name FROM `sub_product` WHERE sub_product_name= '".trim($sub_product_name)."' AND flag=1") or die("Query Unsuccessful.");
            $num = mysqli_num_rows($getCatNameUniq);
            if($num > 0){
                header('location:addsubproduct.php?id=Error ! Al-ready exist, Please try Another Product');
                exit;
            }
            
            $insert = "INSERT INTO `sub_product` (`sub_product_id`, `sub_product_name`, `model_no`, `category_id`, `subcategory_id`, `product_id`, `brand_id`, `short_description`, `features`, `specifications`, `download_link`, `file_name`, `uploaded_on`,`flag`) VALUES (default, '$sub_product_name', '$model_no', $category_id, $sub_category_id, $product_id, $brand_id, '$short', '$features', '$specification', '$download', '$string_version', NOW(),1)";
            if (mysqli_query($conn, $insert)) {
                header('location:addsubproduct.php?id=Product Added Successfully');
            } else {
                header('location:addsubproduct.php?id=Error !!!! ');
            }
            }
            if($insert){ 
                header('location:addsubproduct.php?id=Please check file extension(jpg,jpeg,png,gif only allowed)');
            }else{ 
                header('location:addsubproduct.php?id=Error !!!!');
            } 
        }else{ 
            header('location:addsubproduct.php?id=Error !!!!');
        } 
    }else{ 
        header('location:addsubproduct.php?id=Error !!!!');
    } 
}

// brand




}
