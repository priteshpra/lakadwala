<?php
SESSION_START();
include 'connection.php';
$res = mysqli_query($conn, "SELECT * FROM `sub_category` where flag=1") or die("Query Unsuccessful.");
$id = 1;
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
                    <div class="row d-flex mx-2 justify-content-between">
                            <h2 class='text-center mb-3'>SUB CATEGORY</h2>
                            <div>
                                <a href="addsubcategory.php" title="Return to the previous page" style="text-decoration:none">
                                <button type="button" class="btn btn-success">Add Sub-Category&nbsp;&nbsp;&nbsp; +</button>
                            </a>
                             <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                            </div>
                            
                        </div>
                    <HR class='bg-success mt-3'>
                    </HR>
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
                    <form action="">
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
                            <label for="inputEmail3" class="col-form-label text-dark">SELECT CATEGORY</label>
                            <div class="form-group border border-success W-100">
                                <select name="category_id" id="Category" required class="form-control W-100">
                                    <option value=''>Select Category</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    
                    <HR class='bg-success mt-5'>
                                </HR>
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Subcategory Name</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="sub_category">

                                </tbody>
                            </table>
                        </div>
                    </div>
                     <?php
            include 'admintemp/footer.php';
            ?>
                </div> <!-- Checkbox -->
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
$(document).ready(function() {
    function loadDAta(type, category_id) {
        $.ajax({
            url: "datainput1.php",
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
                    $("#Category").html();
                    $("#product").html('');
                    $("#sub_category").html('');
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
    })
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