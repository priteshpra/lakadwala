<?php
SESSION_START();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php';
?>


<body>

    <!-- Category Form -->
    <!-- <div class="container">
        <div class="col-md-12">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center ">
                    <form method='post' action='insert.php' enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cars">Category Name</label><br>
                            <input type="text" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="file" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Short Description</label>
                            <textarea name="short_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">ADVANTAGES</label>
                            <textarea name="advantages"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">WHO USES TOOLS ?</label>
                            <textarea name="who_use_tools"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">WHERE ARE TOOLS USED ?</label>
                            <textarea name="where_are_tools_used"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">HOW TO SAFELY USE TOOLS ?</label>
                            <textarea name="how_to_use"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <input type='submit' name='submit' class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Sub Category Form -->

    <div class="container">
        <div class="col-md-12">
            <div class="row justify-content-center mx-auto">
                <div class="com-md-8">
                    <h4>Sub Category Informatiom</h4>
                    <form method='post' action='insert.php' enctype='multipart/form-data'>
                        <label for="cars">Select Category:</label><br>
                        <select name="category_id" required style="width:100%">
                            <option value=''>-----SELECT-----</option>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'lakadwala');
                            $result = mysqli_query($conn, 'SELECT * FROM category where `flag`=1');
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='$row[category_id]'>$row[category_name]</option>";
                            }
                            ?>
                        </select>
                        <div class="form-group">
                            <input type="text" name="subcategory_name" placeholder="Sub Category Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="file">
                        </div>
                        <div class="form-group">
                            <input type='submit' name='subcategory_submit' value='Upload' class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkbox -->
    <div class="container">
        <div class="col-md-12">
            <div class="row text-center">
                <div class="col-md-8">
                    <p>You Want to add more category ????</p><br>
                    <div class="form-group">
                        <input type="radio" name="user-type" value="Store">Yes
                    </div>
                    <div class="form-group">
                        <input type="radio" name="user-type" value="Brand">no
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(function() {
        $('.showstore').hide();
        $('.showbrand').hide();

        $("input[name=user-type]:radio").click(function() {
            if ($('input[name=user-type]:checked').val() == "Brand") {
                $('.showstore').hide();
                $('.showbrand').show();

            } else if ($('input[name=user-type]:checked').val() == "Store") {
                $('.showstore').show();
                $('.showbrand').hide();

            }
        });
    });
    </script>
    <!-- Product Form -->
    <div class="container showstore">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <form action="insert.php" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="category">Select Category:</label><br>
                            <select name="category_id" id="Category" required>
                                <option value=''>Select Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="subcategory_id" id="sub_category" required>
                                <option value=''>Select Sub Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="product_name" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="file" required>
                        </div>
                        <div class="form-group">
                            <input type='submit' name='submit' value='Upload' class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Form -->
    <div class="container showbrand">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <form action="insert.php" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="category">Select Category:</label><br>
                            <select name="category_id" id="Category" required>
                                <option value=''>Select Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="subcategory_id" id="sub_category" required>
                                <option value=''>Select Sub Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="product_name" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="file" required>
                        </div>
                        <div class="form-group">
                            <input type='submit' name='submit' value='Upload' class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Form -->
    <div class="container my-5 ">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="insert.php" method="POST" enctype='multipart/form-data'>
                        <div class="form-group">
                            <input type="text" name="brand_name" placeholder="Enter Brand Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" id="file" required>
                        </div>
                        <div class="form-group">
                            <textarea name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <input type='submit' name='submit' class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sub Product Form -->
    <div class="container ">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="submit.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category">Select Category:</label><br>
                            <select name="category_id" id="Category1">
                                <option value=''>Select Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="subcategory_id2" id="sub_category1">
                                <option value=''>Select Sub Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="product" id="product">
                                <option value=''>Select Product</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="sub_product" placeholder="Enter Sub Product Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="model_no" placeholder="Enter model no" />
                        </div>
                        <div class="form-group">
                            <select name="brand">
                                <option value=''>Select Product</option>
                                <?php
                                $result = mysqli_query($conn, 'SELECT * FROM brand and flag=1');
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='$row[brand_id]'>$row[brand_name]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Short Description</label>
                            <textarea name="short"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Features</label>
                            <textarea name="features"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="specification">Specification</label>
                            <textarea name="specification"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="download_link">Download Link</label>
                            <textarea name="download_link"></textarea>
                        </div>
                        <div class="form-group">
                            Select Image Files to Upload:<br>
                            <input type="file" name="files[]" multiple>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="UPLOAD">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        loadDAta();
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
    });
    </script>


    </script>
</body>
<script>
CKEDITOR.replace('short');
CKEDITOR.replace('advantages');
CKEDITOR.replace('short_description');
CKEDITOR.replace('who_use_tools');
CKEDITOR.replace('where_are_tools_used');
CKEDITOR.replace('how_to_use');
CKEDITOR.replace('description');
CKEDITOR.replace('features');
CKEDITOR.replace('specification');
CKEDITOR.replace('editor6');
CKEDITOR.replace('download_link');
CKEDITOR.replace('desc');
</script>

</html>