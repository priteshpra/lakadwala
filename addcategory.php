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
                        <HR class='bg-success mt-3'>
                        <div class="row d-flex mx-3 justify-content-between">
                            <h2 class='text-center mb-3'>Add Category</h2>
                            <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                        </div>

                        <HR class='bg-success mt-3'>
                        </HR>
                        <?php
                        if ((isset($_GET['id']) && $_GET['id'] == 'Category Added Successfully')) {
                            $success = ($_GET['id']);
                        ?>
                            <div class="alert alert-success alert-dismissible" id="success">
                                <?php echo $success; ?>
                                <a class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>
                        <?php  }else if(isset($_GET['id'])){
                            $success = ($_GET['id']);
                        ?>
                        <div class="alert alert-warning alert-dismissible" id="success">
                                <?php echo $success; ?>
                                <a class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>
                        <?php } ?>
                        <div class="row justify-content-center">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="insert.php">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label">Category Name</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input type="text" id="c_name" class="form-control text-dark" style="background-color:white;" name="c_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6">
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
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Category Image</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input class="form-control text-dark pb-3" id="photo" type="file" name="photo" style="background-color:white;" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Short
                                                Description</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="short_description" id="short_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Advantages</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="advantages" id="advantages"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">WHO USES TOOLS
                                                ?</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="who_use_tools" id="who_use_tools"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">WHERE ARE TOOLS USED
                                                ?</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="where_are_tools_used" id="where_are_tools_used"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">HOW TO SAFELY USE
                                                TOOLS ?</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="how_to_use" id="how_to_use"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Description</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <textarea name="desc" id="desc"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">Category Banner
                                                Image</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input class="form-control text-dark pb-3" type="file" name="image1" id="image1" style="background-color:white;" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <HR class='bg-success'>
                                </HR>
                                <div class=" ROW text-center card-body">
                                    <button type="submit" class="btn btn-success">SUBMIT</button>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>
            <script src="admintemp/admin.js"></script>
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

} ?>