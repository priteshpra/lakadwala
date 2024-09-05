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
                        <div class="row d-flex  justify-content-between">
                            <h2 class='text-center mb-3'>Add SUB CATEGORY 2</h2>
                            <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                        </div>

                        <?php
                        if (isset($_GET['id']) && $_GET['id'] == 'SUB CATEGORY 2 Added Successfully') {
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
                        <?php } ?>
                        <div class="row justify-content-center">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="insert.php">
                                <HR class='bg-success mt-3'>
                                </HR>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-10 col-lg-6">
                                            <label for="inputEmail3" class="col-form-label text-dark">SELECT BRAND</label>
                                            <div class="form-group border border-success W-100">
                                                <select name="brand" id="brand_id" class="form-control W-100" required>
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
                                        <div class="col-sm-10 col-lg-6">
                                            <label for="inputEmail3" class="col-form-label text-dark">SELECT
                                                CATEGORY</label>
                                            <div class="form-group border border-success ">
                                                <select name="category_id" id="Category" required class="form-control ">
                                                    <option value=''>Select Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">SELECT
                                                SUB-CATEGORY</label>
                                            <div class="form-group border border-success ">
                                                <select name="subcategory_id" id="sub_category" class="form-control ">
                                                    <option value=''>Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">SUB CATEGORY 2 NAME</label>
                                            <div class="form-group border border-success ">
                                                <input type="text" name="product_name" placeholder="CATEGORY 2 Name" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-lg-6 ">
                                            <label for="inputEmail3" class="col-form-label text-dark">IMAGE</label>
                                            <div class="form-group border border-success" style="background-color:white;">
                                                <input type="file" name="image" id="file" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <HR class='bg-success'>
                                </HR>
                                <div class="form-group ROW text-center card-body">
                                    <button type="submit" class="btn btn-success" name="product_submit">SUBMIT</button>
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
    <script>
        $(document).ready(function() {
            function loadDAta(type, category_id) {
                $.ajax({
                    url: "datainput.php",
                    type: "POST",
                    data: {
                        type: type,
                        id: category_id
                    },
                    success: function(data) {
                        if (type == "statedata") {
                            $("#sub_category").html(data);

                        } else if (type == "statedata1") {
                            $("#sub_category1").html(data);
                        } else if (type == "statedata2") {
                            $("#product").html(data);
                        } else {
                            $("#Category").append(data);
                            $("#Category1").append(data);
                        }
                    }
                })
            }
            // loadDAta();
            $('#Category').on("change", function() {
                    var category = $('#Category').val();
                    loadDAta("statedata", category);
                }),
                $('#Category1').on("click", function() {
                    var category = $('#Category1').val();
                    loadDAta("statedata1", category);
                }),
                $('#sub_category1').on("change", function() {
                    var sub_category1 = $('#sub_category1').val();
                    loadDAta("statedata2", sub_category1);
                })
            // $('#sub_category1').on("change",function(){
            //     var category = $('#sub_category1').val();
            //     loadDAta("sub_category1",category);
            // })
            $('#brand_id').on("change", function() {
                var brand_id = $('#brand_id').val();
                loadDAta("category", brand_id);
            })
        });
    </script>

</html>
<?php

}
?>