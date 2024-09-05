<?php
SESSION_START();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
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
                <div class="row d-flex justify-content-between">
                            <h2 class='text-center mb-3'>Add Brand</h2>
                            <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                        </div>
                    <?php 
                    if ((isset($_GET['id']) && $_GET['id'] == 'Product Added Successfully')) {
                        $success = ($_GET['id']);
                    ?>
                        <div class="alert alert-success alert-dismissible" id="success">
                            <?php echo $success; ?>
                            <a class="close" data-dismiss="alert" aria-label="close">x</a>
                        </div>
                    <?php  } else if (isset($_GET['id'])) {
                    $success = ($_GET['id']);
                    
                    ?>
                        <div class="alert alert-danger alert-dismissible" id="success">
                            <?php echo $success; ?>
                            <a class="close" data-dismiss="alert" aria-label="close">x</a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row justify-content-center">

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="insert.php">
                            <HR class='bg-success mt-3'>
                            </HR>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">Brand Name</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                        <input type="text" name="brand_name" placeholder="Enter Brand Name" required  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">Image</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <input type="file" name="image" id="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark text-uppercase">Short Description</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <textarea name="short_description" id="short_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">Banner Image</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <input type="file" name="image1" id="image1" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <HR class='bg-success'>
                            </HR>
                            <div class="form-group ROW text-center card-body">
                                <button type="submit" class="btn btn-success" name="brand_submit">SUBMIT</button>
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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