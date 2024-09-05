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

                    <div class="row d-flex mx-2 justify-content-between">
                        <h2 class='text-center mb-3'>PRODUCT</h2>
                        <div>
                            <a href="addsubproduct.php" title="Return to the previous page" style="text-decoration:none">
                                <button type="button" class="btn btn-success">Add Products</button>
                            </a><a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                        </div>

                    </div>
                    <HR class='bg-success mt-3'>
                    </HR>
                    <?php
                    if ((isset($_GET['id']) && $_GET['id'] == 'Product Added Successfully')) {
                        $success = ($_GET['id']);
                    ?>
                        <div class="alert alert-success alert-dismissible" id="success">
                            <?php echo $success; ?>
                            <a class="close" data-dismiss="alert" aria-label="close">x</a>
                        </div>
                    <?php  } else if ((isset($_GET['id']) && $_GET['id'] == 'Please select a file to upload.') || (isset($_GET['id']) && $_GET['id'] == 'Error Please try again') || (isset($_GET['id']) && $_GET['id'] == 'Please check file extension only (jpg,jpeg,png,gif only allowed)')) {
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
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="submit.php">
                            <?php
                            if ((isset($_GET['reply']) && $_GET['reply'] == 'Product Deleted')) {
                                $success = ($_GET['reply']);
                            ?>
                                <div class="alert alert-success alert-dismissible" id="success">
                                    <?php echo $success; ?>
                                    <a class="close" data-dismiss="alert" aria-label="close">x</a>
                                </div>
                            <?php  } else if ((isset($_GET['reply']) && $_GET['reply'] == 'Can not delete the product from Table')) {
                                $success = ($_GET['reply']);

                            ?>
                                <div class="alert alert-danger alert-dismissible" id="success">
                                    <?php echo $success; ?>
                                    <a class="close" data-dismiss="alert" aria-label="close">x</a>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10 col-lg-6">
                                        <label for="inputEmail3" class="col-form-label text-dark">SELECT BRAND</label>
                                        <div class="form-group border border-success W-100">
                                            <select name="brand_id" id="brand_id" required class="form-control W-100">
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
                                        <div class="form-group border border-success W-100">
                                            <select name="category_id" id="Category1" class="form-control W-100" required>
                                                <option value=''>Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6">
                                        <label for="inputEmail3" class="col-form-label text-dark">SELECT
                                            SUB-CATEGORY</label>
                                        <div class="form-group border border-success W-100">
                                            <select name="subcategory_id2" id="sub_category1" class="form-control W-100" required>
                                                <option value=''>Select Sub Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6">
                                        <label for="inputEmail3" class="col-form-label text-dark">SELECT  Sub Category 2</label>
                                        <div class="form-group border border-success W-100">
                                            <select name="product" id="product" class="form-control W-100" required>
                                                <option value=''>Select  Sub Category 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-sm-12 col-lg-12 ">
                            <HR class='bg-success mt-3'>
                            </HR>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-success text-white">
                                        <tr>
                                            <th scope="col">#ID</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Model Number</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                url: "datainput3.php",
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
                        $("#table").html('');
                        $("#product").html(data);
                        // if(data.includes("option value=") == true){
                        //     $("#table").html(data);
                        // }
                    } else if (type == "create") {
                        // $("#product").html('');
                        $("#table").html(data);
                    } else {
                        $("#product").html('');
                        $("#sub_category").html('');
                        $("#sub_category1").html('');
                        $("#Category").html(data);
                        $("#Category1").html(data);
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
                var category = $('#Category1').val();
                if (sub_category1 > 0) {
                    loadDAta("statedata2", sub_category1);
                } else {
                    var category = $('#Category1').val();
                    var postData = {
                        categoryId: category,
                        sub_category1: sub_category1
                    }
                    loadDAta("create", postData);
                }

            })
        $('#product').on("change", function() {
            var product = $('#product').val();
            var sub_category1 = $('#sub_category1').val();
            var category = $('#Category1').val();
            if (product > 0) {
                loadDAta("create", product);
            } else {
                var postData = {
                    categoryId: category,
                    sub_category1: sub_category1,
                    product: product
                }
                loadDAta("create", postData);
            }

        })
        $('#brand_id').on("change", function() {
            var brand_id = $('#brand_id').val();
            loadDAta("category", brand_id);
        })
    });
</script>

</html>