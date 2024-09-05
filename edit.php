<?php
SESSION_START();
// Database Connections
include 'connection.php';
// Category Insert

if (isset($_SESSION['user_name'])) {
    // print_r($_POST);die;
    if (isset($_POST['edit_category'])) {

        if (isset($_GET['image1'])) {
            $image = $_GET['image1'];
        } else {
            $image = "";
        }
        if (isset($_GET['banner'])) {
            $banner = $_GET['banner'];
        } else {
            $banner = "";
        }

        $id = $_GET['id'];
        //for the image
        if ($_FILES['photo']['name'] == "" && $image == "") {
            header('location:categoryedit.php?reply=Please Select the Category Image& id=' . $id);
            exit;
        } else
    if ($_FILES['photo']['name'] == "") {
            $name = $image;
        } elseif ($image == "") {
            $name = $_FILES['photo']['name'];
        } elseif ($_FILES['photo']['name'] == $image) {
            $name = $image;
        } else {
            $name = $_FILES['photo']['name'];
        }


        //for the banner
        if ($_FILES['image1']['name'] == "" && $banner == "") {
            header('location:categoryedit.php?reply=Please Select the Banner Image& id=' . $id);
            exit;
        } elseif ($_FILES['image1']['name'] == "") {
            $name1 = $banner;
        } elseif ($banner == "") {
            $name1 = $_FILES['image1']['name'];
        } elseif ($_FILES['image1']['name'] == $banner) {
            $name1 = $banner;
        } else {
            $name1 = $_FILES['image1']['name'];
        }

        $c_name = $_POST['c_name'];
        $short_description = $_POST['short_description'];
        $advantages = $_POST['advantages'];
        $who_use_tools = $_POST['who_use_tools'];
        $where_are_tools_used = $_POST['where_are_tools_used'];
        $how_to_use = $_POST['how_to_use'];
        $description = $_POST['desc'];
        // $name = $_FILES['photo']['name'];
        // $name1 = $_FILES['image1']['name'];
        $target_dir = "category/";
        $target_file = $target_dir . basename($name);
        $target_file1 = $target_dir . basename($name1);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            // print_r($extensions_arr);die;
            if ($_FILES['photo']['name'] != "") {
                if (in_array($imageFileType, $extensions_arr)) {
                    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $name);
                    $errorShow = 0;
                } else {
                    header('location:categoryedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)& id=' . $id);
                    $errorShow = 1;
                }
            } else {
                $errorShow = 0;
            }
        }

        if (file_exists($target_file1)) {
        } else {
            // print_r($extensions_arr);die;
            if ($_FILES['image1']['name'] != "") {
                if (in_array($imageFileType1, $extensions_arr)) {
                    move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $name1);
                    $fileuploades = "File Uploaded Successfully";
                    $errorShow = 0;
                } else {
                    header('location:categoryedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)& id=' . $id);
                    $errorShow = 1;
                }
            } else {
                $errorShow = 0;
            }
        }

        $insert = "UPDATE `category` SET `category_id`='$id',`category_name`='$c_name',`image`='$name',`small_description`='$short_description',`advantages`='$advantages',`who_use`='$who_use_tools',`where_use`='$where_are_tools_used',`how_to_use`='$how_to_use',`description`='$description',`banner`='$name1' WHERE `category_id`='$id' and `flag`=1";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {
            header('location:categoryedit.php?reply=Product and Images Updated Successfully&id=' . $id);
        } else {
            header('location:categoryedit.php?reply=Error ! Please Try Again& id=' . $id);
        }
    }

    if (isset($_POST['edit_subcategory'])) {
        $catid = $_GET['catid'];
        $subcatid = $_GET['subcatid'];
        $image = $_GET['image'];
        $subcategory_name = $_POST['subcategory_name'];

        //for the image
        if ($_FILES['image']['name'] == "" && $image == "") {
            // header('location:subcategoryedit.php?reply=Please Select the Category Image& id=' . $subcatid);
            exit;
        } elseif ($_FILES['image']['name'] == "") {
            $name = $image;
        } elseif ($image == "") {
            $name = $_FILES['image']['name'];
        } elseif ($_FILES['image']['name'] == $image) {
            $name = $image;
        } else {
            $name = $_FILES['image']['name'];
        }

        $target_dir = "sub_category/";
        $target_file = $target_dir . basename($name);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "JPEG", "JPG", "PNG");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            if (in_array($imageFileType, $extensions_arr)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
                $errorShow = 0;
            } else {
                $errorShow = 1;
                header('location:subcategoryedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)& subcatid=' . $subcatid . '&catid=' . $catid);
                exit;
            }
        }

        $insert = "UPDATE `sub_category` SET `subcategory_id`='$subcatid',`subcategory_name`='$subcategory_name',`category_id`='$catid',`image`='$name' WHERE `subcategory_id`='$subcatid'";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {
            header('location:subcategoryedit.php?reply=Product and Images Updated Successfully&subcatid=' . $subcatid . '&catid=' . $catid);
            exit;
        } else {
            header('location:subcategoryedit.php?reply=Error ! Please Try Again& subcatid=' . $subcatid . '&catid=' . $catid);
            exit;
        }
    }



    if (isset($_POST['edit_product'])) {
        $product_id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id=$product_id and `flag`=1") or die("Query Unsuccessful.");
        while ($row = mysqli_fetch_assoc($result)) {
            $catid = $row['category_id'];
            $subcatid = $row['subcategory_id'];
        }
        $image = $_GET['image'];
        $product_name = $_POST['product_name'];

        //for the image
        if ($_FILES['image']['name'] == "" && $image == "") {
            // header('location:subcategoryedit.php?reply=Please Select the Category Image& id=' . $subcatid);
            exit;
        } elseif ($_FILES['image']['name'] == "") {
            $name = $image;
        } elseif ($image == "") {
            $name = $_FILES['image']['name'];
        } elseif ($_FILES['image']['name'] == $image) {
            $name = $image;
        } else {
            $name = $_FILES['image']['name'];
        }

        $target_dir = "products/";
        $target_file = $target_dir . basename($name);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            if (in_array($imageFileType, $extensions_arr)) {
                $errorShow = 0;
                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
            } else {
                $errorShow = 1;
                header('location:productedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)&id=' . $product_id);
                exit;
            }
        }

        $insert = "UPDATE `products` SET `product_id`='$product_id',`product_name`='$product_name',`category_id`='$catid',`subcategory_id`='$subcatid',`image`='$name' WHERE `product_id`='$product_id' and `flag`=1";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {
            header('location:productedit.php?reply=Product and Images Updated Successfully&id=' . $product_id);
            exit;
        } else {
            header('location:productedit.php?reply=Error ! Please Try Again&id=' . $product_id);
            exit;
        }
    }


    if (isset($_POST['edit_subproduct'])) {
        $subproduct_id = $_GET['id'];


        $sub_product_name = $_POST['sub_product_name'];
        $model_no = $_POST['model_no'];
        $short_description = $_POST['short_description'];
        $features = $_POST['features'];
        $specifications = $_POST['specifications'];
        $download_link = $_POST['download_link'];


        $result = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE sub_product_id=$subproduct_id and `flag`=1") or die("Query Unsuccessful.");
        while ($row = mysqli_fetch_assoc($result)) {
            $catid = $row['category_id'];
            $subcatid = $row['subcategory_id'];
            $product_id = $row['product_id'];
            $brand_id = $row['brand_id'];
            $banner_table = $row['banner'];
            $image_table = $row['image'];
        }
        $img = $_GET['image'];
        $image = explode(",", $img);



        //for the image
        // if ($_FILES['image']['name'] == "" && $image[0]== "") {
        //     header('location:brandedit.php?reply=Please Select the Category Image& id=' . $subcatid);
        //     echo "both are null";
        // } elseif ($_FILES['image']['name'] == "") {
        //     $name = $_FILES['image']['name'];
        // } else
        if ($image[0] == "") {
            $name = $_FILES['photo']['name'];
        } elseif ($_FILES['photo']['name'] == $image[0]) {
            $name = $_FILES['photo']['name'];
        } else {
            $name = $_FILES['photo']['name'];
        }

        $target_dir = "products/";
        $target_file = $target_dir . basename($name);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            if (in_array($imageFileType, $extensions_arr)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
                $errorShow = 0;
            } else {
                $errorShow = 1;
                header('location:subproductedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)&id=' . $subproduct_id);
                exit;
            }
        }

        $insert = "UPDATE `sub_product` SET `sub_product_id`='$subproduct_id',`sub_product_name`='$sub_product_name',`model_no`='$model_no',`category_id`='$catid',`subcategory_id`='$subcatid',`product_id`='$product_id',`brand_id`='$brand_id',`short_description`='$short_description',`features`='$features',`specifications`='$specifications',`download_link`='$download_link',`file_name`='$name',`uploaded_on`=now() WHERE `sub_product_id`='$subproduct_id' and `flag`=1";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {

            header('location:subproductedit.php?reply=Product and Images Updated Successfully&id=' . $subproduct_id);
            exit;
        } else {
            header('location:subproductedit.php?reply=Error ! Please Try Again&id=' . $subproduct_id);
            exit;
        }
    }

    /////brand edite


    if (isset($_POST['edit_brand'])) {

        if (isset($_GET['image1'])) {
            $image = $_GET['image1'];
        } else {
            $image = "";
        }
        if (isset($_GET['banner'])) {
            $banner = $_GET['banner'];
        } else {
            $banner = "";
        }

        $id = $_GET['id'];
        //for the image
        if ($_FILES['photo']['name'] == "" && $image == "") {
            header('location:brandedit.php?reply=Please Select the Category Image&id=' . $id);
            exit;
        } elseif ($_FILES['photo']['name'] == "") {
            $name = $image;
        } elseif ($image == "") {
            $name = $_FILES['photo']['name'];
        } elseif ($_FILES['photo']['name'] == $image) {
            $name = $image;
        } else {
            $name = $_FILES['photo']['name'];
        }


        //for the banner
        if ($_FILES['image1']['name'] == "" && $banner == "") {
            header('location:brandedit.php?reply=Please Select the Banner Image& id=' . $id);
            exit;
        } elseif ($_FILES['image1']['name'] == "") {
            $name1 = $banner;
        } elseif ($banner == "") {
            $name1 = $_FILES['image1']['name'];
        } elseif ($_FILES['image1']['name'] == $banner) {
            $name1 = $banner;
        } else {
            $name1 = $_FILES['image1']['name'];
        }

        $brand_name = $_POST['brand_name'];
        $description = $_POST['description'];

        $target_dir = "brand/";
        $target_file = $target_dir . basename($name);
        $target_file1 = $target_dir . basename($name1);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            if ($_FILES['photo']['name'] != "") {
                if (in_array($imageFileType, $extensions_arr)) {
                    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $name);
                    $errorShow = 0;
                } else {
                    $errorShow = 1;
                    header('location:brandedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)& id=' . $id);
                }
            } else {
                $errorShow = 0;
            }
        }

        if (file_exists($target_file1)) {
        } else {
            if ($_FILES['image1']['name'] != "") {
                if (in_array($imageFileType1, $extensions_arr)) {
                    move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $name1);
                    $fileuploades = "File Uploaded Successfully";
                    $errorShow = 0;
                } else {
                    $errorShow = 1;
                    header('location:brandedit.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)& id=' . $id);
                }
            } else {
                $errorShow = 0;
            }
        }

        $insert = "UPDATE `brand` SET `brand_id`='$id',`brand_name`='$brand_name',`image`='$name',`banner`='$name1',`description`='$description' WHERE `brand_id`='$id' and `flag`=1";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {
            header('location:brandedit.php?reply=Product and Images Updated Successfully&id=' . $id);
        } else {
            header('location:brandedit.php?reply=Error ! Please Try Again& id=' . $id);
        }
    }

    // About US Edit
    if (isset($_POST['edit_about'])) {
        $id = $_GET['id'];
        $image = $_GET['image'];
        $content = $_POST['description'];
        $oneline = $_POST['one_line'];


        //for the image
        if ($_FILES['image']['name'] == "" && $image == "") {
            // header('location:subcategoryedit.php?reply=Please Select the Category Image& id=' . $subcatid);
            exit;
        } elseif ($_FILES['image']['name'] == "") {
            $name = $image;
        } elseif ($image == "") {
            $name = $_FILES['image']['name'];
        } elseif ($_FILES['image']['name'] == $image) {
            $name = $image;
        } else {
            $name = $_FILES['image']['name'];
        }


        $target_dir = "logo/";
        $target_file = $target_dir . basename($name);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // ckeck file is ex\ist or not
        if (file_exists($target_file)) {
        } else {
            if (in_array($imageFileType, $extensions_arr)) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
                $errorShow = 0;
            } else {
                $errorShow = 1;
                header('location:editabout.php?reply=Please check file extension only (jpg,jpeg,png,gif only allowed)');
                exit;
            }
        }
        $insert = "UPDATE `aboutus` SET `id`='$id',`image`='$name',`content`='$content',`about one line`='$oneline' WHERE `id`='$id'";
        if (mysqli_query($conn, $insert) && $errorShow == 0) {
            header('location:editabout.php?reply=Product and Images Updated Successfully');
            exit;
        } else {
            header('location:editabout.php?reply=Error ! Please Try Again');
            exit;
        }
    }


    // Address Edit
    if (isset($_POST['edit_address'])) {
        $id = $_GET['id'];



        $insert = "UPDATE `contact us` SET `id`='$id',`city`='$_POST[city]',`Address`='$_POST[address]',`Iframe`='$_POST[link]',`flag`=1 where `id`='$id'";
        if (mysqli_query($conn, $insert)) {
            header('location:editaddress.php?reply=Address Updated Successfully');
            exit;
        } else {
            header('location:editaddress.php?reply=Error ! Please Try Again');
            exit;
        }
    }
}
