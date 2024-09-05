<?php
SESSION_START();
include 'connection.php';
$res = mysqli_query($conn, "SELECT * FROM `category` WHERE category_id!=1 and flag=1") or die("Query Unsuccessful.");
$id = 1;
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
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
                        <div class="row d-flex mx-2 justify-content-between">
                            <h2 class='text-center mb-3'>CATEGORY</h2>
                            <div>
                                <a href="addcategory.php" title="Return to the previous page" style="text-decoration:none">
                                <button type="button" class="btn btn-success">Add Category&nbsp;&nbsp;&nbsp;+</button>
                            </a>
                            <a href="javascript:history.go(-1)" title="Return to the previous page">
                                <button type="button" class="btn btn-success">« Go back</button>
                            </a>
                            </div>
                            
                        </div>
                        <form action="">
                            <div class="col-sm-10 col-lg-6">
                                <label for="inputEmail3" class="col-form-label text-dark">SELECT BRANDS</label>
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
                        </form>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md" style="width:100%" id="example">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col col-md">Banner Image</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="category">
                                    <!-- <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $id;
                                                            $id++; ?></td>
                                            <td>
                                                <?php
                                                echo $row['category_name'];
                                                ?>
                                            </td>
                                            <td>
                                                <img src="category/<?php echo $row['image'] ?>" alt="" style="width:50px">
                                            </td>
                                            <td>
                                                <img src="category/<?php echo $row['banner'] ?>" alt="" style="width:100px">
                                            </td>
                                            <td>
                                                <a href="categoryedit.php?id=<?php echo $row['category_id'] ?>">
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="deletetable.php?id=<?php echo $row['category_id'] ?>&name=category">
                                                    <button type="button" class="btn btn-success">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?> -->
                                </tbody>
                            </table>
                        </div>
                        
                    </div> <!-- Checkbox -->
                     <?php
            include 'admintemp/footer.php';
            ?>
            </main>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>
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
                        if (type == "brand") {
                            $("#category").html(data);

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
            $('#brand_id').on("change", function() {
                var category = $('#brand_id').val();
                loadDAta("brand", category);
            })
        });
        </script>
            <!-- page-wrapper -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>
            <script src="admintemp/admin.js"></script>
            <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    </body>


</html>
<?php
}
?>