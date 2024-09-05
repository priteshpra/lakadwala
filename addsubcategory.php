<?php
SESSION_START();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
?>
<?php
if (isset($_SESSION['user_name'])) {

?>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            <?php
            include 'admintemp/nav.php';
            ?>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                    
                        <!-- <h2 class='text-center mb-3'>Add Category</h2> -->
                        <div class="row d-flex mx-5 justify-content-between">
                            <h2 class='text-center mb-3'>Add Sub-Category</h2>
                            <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                        </div>
                        
                        <?php 
                        if (isset($_GET['id']) && $_GET['id'] == 'Sub-Category Added Successfully') {
                            $success = ($_GET['id']);
                        ?>
                            <div class="alert alert-success alert-dismissible" id="success">
                                <?php echo $success; ?>
                                <a class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>
                        <?php  }else if(isset($_GET['id'])){ $success = ($_GET['id']); ?>
                            <div class="alert alert-danger alert-dismissible" id="success">
                                <?php echo $success; ?>
                                <a class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>
                        <?php } ?>
                        <div class="row justify-content-center">

                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="insert.php">
                                <HR class='bg-success mt-3'>
                                </HR>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-10 col-lg-6">
                                            <label for="inputEmail3" class="col-form-label">Select Category:</label>
                                            <div class="form-group border border-success" style="background-color:white;border:none">
                                                <select name="category_id" required class="form-control">
                                                    <!-- <option value=''>-----SELECT-----</option> -->
                                                    <?php
                                                    // $conn = mysqli_connect('localhost', 'root', '', 'lakadwala');
                                                    $result = mysqli_query($conn, 'SELECT * FROM category');
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='$row[category_id]'>$row[category_name]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Sub Category
                                                Name</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input type="text" class="form-control" name="subcategory_name" placeholder="Sub Category Name" required>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-10 col-lg-6">
                                            <label for="inputEmail3" class="col-form-label text-dark">SELECT BRAND</label>
                                            <div class="form-group border border-success W-100">
                                                <select name="brand" class="form-control W-100" required>
                                                    <option value=''>Select Brand</option>
                                                    <?php
                                                    $result = mysqli_query($conn, 'SELECT * FROM brand where flag=1');
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='$row[brand_id]'>$row[brand_name]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Image</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input type="file" name="image" id="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <HR class='bg-success'>
                                </HR>
                                <div class="form-group ROW text-center card-body">
                                    <button type="submit" class="btn btn-success" name="subcategory_submit">SUBMIT</button>
                                    <!-- <input type='submit' name='submit' id="butsave" class="btn btn-primary"> -->
                                </div>
                            </form>
                        </div>
                    </div>
                     <?php
            include 'admintemp/footer.php';
            ?>
                </div>
                <!-- Checkbox -->
            </main>
            <!-- page-wrapper -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>
            <script src="admintemp/admin.js"></script>
            <!-- (Optional) Latest compiled and minified JavaScript translation files -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
    <script>
        CKEDITOR.replace('short');
        CKEDITOR.replace('advantages');
        CKEDITOR.replace('short_description');
        CKEDITOR.replace('who_use_tools');
        CKEDITOR.replace('where_are_tools_used');
        CKEDITOR.replace('how_to_use');
        CKEDITOR.replace('desc');
        CKEDITOR.replace('features');
        CKEDITOR.replace('specification');
        CKEDITOR.replace('editor6');
        CKEDITOR.replace('download_link');
        CKEDITOR.replace('desc');
    </script>

</html>
<?php
}
?>