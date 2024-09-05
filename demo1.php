//for the image
if($_FILES['photo']['name']==$image)
{
    $name = $image;
}
else
{
    $name=$_FILES['photo']['name'];
}
//for the banner
if($_FILES['image1']['name']==$banner)
{
    $name1 = $banner;
}
else
{
    $name1=$_FILES['image1']['name'];
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
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr) & in_array($imageFileType1, $extensions_arr)) {
        // Upload file

        if ((move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $name)) && (move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $name1)) )
        {
            // Insert record
            $insert = "UPDATE `category` SET `category_id`='$id',`category_name`='$c_name',`image`='$name',`small_description`='$short_description',`advantages`='$advantages',`who_use`='$who_use_tools',`where_use`='$where_are_tools_used',`how_to_use`='$how_to_use',`description`='$description',`banner`='$name1' WHERE `category_id`='$id'";
            if (mysqli_query($conn, $insert)) {
                header('location:categoryedit.php?reply=Product Added Successfully &id='.$id);
            } else {
                header('location:categoryedit.php?reply=Error ! Please Try Again & id='.$id);
            }
        } else {
            header('location:categoryedit.php?reply=Please check file extension(jpg,jpeg,png,gif only allowed) & id='.$id);
        }
    } else {
        header('location:categoryedit.php?reply=Please check file extension(jpg,jpeg,png,gif only allowed) & id='.$id);
    }
}