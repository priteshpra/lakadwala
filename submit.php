<?php
SESSION_START();
include 'connection.php';
// Check connection

if (isset($_POST['addsubproduct_submit'])) {
    // File upload configuration 
    $targetDir = "sub_product/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $brand = $_POST['brand'];
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= $fileName . ",";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }


        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        $getCatNameUniq = mysqli_query($conn, "SELECT sub_product_name FROM `sub_product` WHERE sub_product_name= '".trim($_POST['sub_product'])."' AND flag=1") or die("Query Unsuccessful.");
        $num = mysqli_num_rows($getCatNameUniq);
        if($num > 0){
            header('location:addsubproduct.php?id=Error ! Al-ready exist, Please try Another Product');
            exit;
        }
        
        if (!empty($insertValuesSQL)) {
            if (isset($_POST['category_id']) and isset($_POST['subcategory_id2']) and isset($_POST['product']) and isset($_POST['sub_product']) and isset($_POST['model_no']) and isset($_POST['brand'])) {
                $array = explode(',', $insertValuesSQL);
                $string_version = implode(',', $array);
                $category_id = $_POST['category_id'];
                $sub_category_id = ($_POST['subcategory_id2'])?$_POST['subcategory_id2']:0;
                $product_id = ($_POST['product'])?$_POST['product']:0;
                $sub_product_name = $_POST['sub_product'];
                $model_no = $_POST['model_no'];
                $brand_id = $_POST['brand'];
                $short = $_POST['short_description'];
                $features = $_POST['features'];
                $specification = $_POST['specification'];
                $download = $_POST['download_link'];

                $insert = "INSERT INTO `sub_product` ( `sub_product_name`, `model_no`, `category_id`, `subcategory_id`, `product_id`, `brand_id`, `short_description`, `features`, `specifications`, `download_link`, `file_name`, `uploaded_on`,`flag`) VALUES ('$sub_product_name', '$model_no', $category_id, $sub_category_id, $product_id, $brand_id, '$short', '$features', '$specification', '$download', '$string_version', NOW(),1)";
                if (mysqli_query($conn, $insert)) {
                    header('location:addsubproduct.php?id=Product Added Successfully');
                } else {
                    header('location:addsubproduct.php?id=Error Please try again');
                }
            }
            if ($insert) {
                echo "Files are uploaded successfully." . $errorMsg;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            header('location:addsubproduct.php?id=Please check file extension only (jpg,jpeg,png,gif only allowed)');
        }
    } else {
        header('location:addsubproduct.php?id=Please select a file to upload.');
    }
}