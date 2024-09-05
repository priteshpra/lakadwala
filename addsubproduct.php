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
if(isset($_SESSION['user_name']))
{

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
                            <h2 class='text-center mb-3'>Add Products</h2>
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
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="submit.php">
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
                                        <div class="form-group border border-success W-100">
                                            <select name="category_id" id="Category1" class="form-control W-100"
                                                required>
                                                <option value=''>Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6">
                                        <label for="inputEmail3" class="col-form-label text-dark">SELECT
                                            SUB-CATEGORY</label>
                                        <div class="form-group border border-success W-100">
                                            <select name="subcategory_id2" id="sub_category1" class="form-control W-100"
                                                >
                                                <option value=''>Select Sub Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6">
                                        <label for="inputEmail3" class="col-form-label text-dark">SELECT SUB-CATEGORY 2</label>
                                        <div class="form-group border border-success W-100">
                                            <select name="product" id="product" class="form-control W-100" >
                                                <option value=''>Select SUB-CATEGORY 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">PRODUCT
                                            NAME</label>
                                        <div class="form-group border border-success W-100">
                                            <input type="text" name="sub_product" placeholder="Enter Product Name"
                                                class="form-control W-100" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">MODEL NUMBER</label>
                                        <div class="form-group border border-success W-100">
                                            <input type="text" name="model_no" placeholder="Enter model no"
                                                class="form-control W-100">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark text-uppercase">Short
                                            Description</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <textarea name="short_description" id="short_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3"
                                            class="col-form-label text-dark text-uppercase">features</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <textarea name="features"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3"
                                            class="col-form-label text-dark text-uppercase">specification</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <textarea name="specification"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3"
                                            class="col-form-label text-dark text-uppercase">download links</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <textarea name="download_link"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-lg-6 ">
                                        <label for="inputEmail3" class="col-form-label text-dark">IMAGE</label>
                                        <div class="form-group border border-success" style="background-color:white;">
                                            <input type="file" name="files[]" multiple class="form-control W-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <HR class='bg-success'>
                            </HR>
                            <div class="form-group ROW text-center card-body">
                                <button type="submit" class="btn btn-success"
                                    name="addsubproduct_submit">SUBMIT</button>
                                <!-- <input type='submit' name='submit' id="butsave" class="btn btn-primary"> -->
                            </div>
                        </form>
                    </div>
                </div>

            </div>
                            <?php
            include 'admintemp/footer.php';
            ?> 
            <!-- Checkbox -->
        </main>
        <!-- page-wrapper -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
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
            loadDAta("statedata2", sub_category1);
        })
        $('#brand_id').on("change", function() {
            var brand_id = $('#brand_id').val();
            loadDAta("category", brand_id);
        })
    // $('#sub_category1').on("change",function(){
    //     var category = $('#sub_category1').val();
    //     loadDAta("sub_category1",category);
    // })
});
</script>

</html>
<?php
}
?>