<?php
SESSION_START();
include 'connection.php';
$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM `category` WHERE category_id=$id AND flag=1") or die("Query Unsuccessful.");
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
                    <div class="table-responsive">
                    </div>
                    <div class="row d-flex justify-content-between">
                        <h2 class='text-center mb-3'>EDIT CATEGORY</h2>
                        <a href="javascript:history.go(-1)" title="Return to the previous page">
                            <button type="button" class="btn btn-success">« Go back</button>
                        </a>
                    </div>
                    <HR class='bg-success mt-3'>
                    </HR>
                    <?php
                    if ((isset($_GET['reply']) && $_GET['reply'] == 'Product and Images Updated Successfully')) {
                        $success = ($_GET['reply']);
                    ?>
                    <div class="alert alert-success alert-dismissible" id="success">
                        <?php echo $success; ?>
                        <a class="close" data-dismiss="alert" aria-label="close">x</a>
                    </div>
                    <?php  } else if ((isset($_GET['reply']) && $_GET['reply'] == 'Please Select the Banner Image') ||(isset($_GET['reply']) && $_GET['reply'] == 'Please Select the Category Image') ||(isset($_GET['reply']) && $_GET['reply'] == 'Error Please try again') || (isset($_GET['reply']) && $_GET['reply'] == 'Please check file extension only (jpg,jpeg,png,gif only allowed)')) {
                    $success = ($_GET['reply']);
                    
                    ?>
                    <div class="alert alert-danger alert-dismissible" id="success">
                        <?php echo $success; ?>
                        <a class="close" data-dismiss="alert" aria-label="close">x</a>
                    </div>
                    <?php
                    }
                    ?>
                </div> <!-- Checkbox -->
                <div class="row justify-content-center">
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        $image23 = $row['image'];
                        $banner = $row['banner'];
                    ?>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                        action="edit.php?image1=<?php echo $image23?>&banner=<?php echo $banner?>&id=<?php echo $id ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label">Category Name</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <input type="text" id="c_name" class="form-control text-dark"
                                            style="background-color:white;" name="c_name" required
                                            value="<?php echo $row['category_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6">
                                    <label for="inputEmail3" class="col-form-label text-dark">SELECT BRAND</label>
                                    <div class="form-group border border-success W-100">
                                        <select name="brand" class="form-control W-100" required>
                                            <option value=''>Select Brand</option>
                                            <?php
                                            $result = mysqli_query($conn, 'SELECT * FROM brand where flag=1');
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $seleted = ($rows['brand_id']==$row['brand_id'])?'selected':'';
                                                echo "<option value='$rows[brand_id]' $seleted>$rows[brand_name]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-lg-3">
                                    <label for="inputEmail3" class="col-form-label text-dark">Category Image</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <input class="form-control text-dark pb-3" id="photo" type="file" name="photo"
                                            style="background-color:white;" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-lg-3 my-auto form-group">
                                    <img src="category/<?php echo $image23; ?>" alt="" style="width:80px">
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">Short Description</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="short_description" id="short_description"
                                            class="materialize-textarea"><?php echo $row['small_description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">Advantages</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="advantages"
                                            id="advantages"><?php echo $row['advantages'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">WHO USES TOOLS ?</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="who_use_tools"
                                            id="who_use_tools"><?php echo $row['who_use'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">WHERE ARE TOOLS USED
                                        ?</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="where_are_tools_used"
                                            id="where_are_tools_used"><?php echo $row['where_use'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">HOW TO SAFELY USE TOOLS
                                        ?</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="how_to_use"
                                            id="how_to_use"><?php echo $row['how_to_use'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">Description</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <textarea name="desc" id="desc"><?php echo $row['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6 ">
                                    <label for="inputEmail3" class="col-form-label text-dark">Category Banner
                                        Image</label>
                                    <div class="form-group border border-success" style="background-color:white;">
                                        <input class="form-control text-dark pb-3" type="file" name="image1" id="image1"
                                            style="background-color:white;" value="<?php echo $banner ?>">
                                    </div>
                                </div>
                                <div class="col-sm-10 col-lg-6">
                                    <img src="category/<?php echo $banner; ?>" alt="" style="width:100%">
                                </div>
                            </div>
                        </div>
                        <HR class='bg-success'>
                        </HR>
                        <div class="row text-center card-body justify-content-center">
                            <button type="submit" class="btn btn-success" name="edit_category">SUBMIT</button>
                            <!-- <input type='submit' name='submit' id="butsave" class="btn btn-primary"> -->
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                     <?php
            include 'admintemp/footer.php';
            ?>
                </div>
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
var strNotes = $("#texteditor-notes").val();
</script>

</html>