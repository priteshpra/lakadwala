<?php
SESSION_START();
include 'connection.php';
$res = mysqli_query($conn, "SELECT * FROM `brand` where flag=1") or die("Query Unsuccessful.");
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
                        <h2 class='text-center mb-3'>BRANDS</h2>
                        <div>
                            <a href="addbrand.php" title="Return to the previous page" style="text-decoration:none">
                            <button type="button" class="btn btn-success">Add Brand</button>
                        </a>
                        <a href="javascript:history.go(-1)" title="Return to the previous page">
                            <button type="button" class="btn btn-success">« Go back</button>
                        </a>
                        </div>
                    </div>
                    <HR class='bg-success mt-3'>
                    </HR>
                    <?php
                    if ((isset($_GET['reply']) && $_GET['reply'] == 'Brand Deleted')) {
                        $success = ($_GET['reply']);
                    ?>
                    <div class="alert alert-success alert-dismissible" id="success">
                        <?php echo $success; ?>
                        <a class="close" data-dismiss="alert" aria-label="close">x</a>
                    </div>
                    <?php  } else if ((isset($_GET['reply']) && $_GET['reply'] == 'Can not delete the Brand')) {
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
                        <table class="table " id="example">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col col-md">Banner Image</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Brand</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $image= $row['image'];
                                    $banner=$row['banner'];
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $id;
                                                        $id++; ?></td>
                                    <td>
                                        <?php
                                            echo $row['brand_name'];
                                            ?>
                                    </td>
                                    <td>
                                        <img src="brand/<?php echo $image; ?>" alt="" style="width:50px">
                                    </td>
                                    <td>
                                        <img src="brand/<?php echo $banner; ?>" alt="" style="width:100px">
                                    </td>

                                    <td>
                                        <a
                                            href="brandedit.php?image1=<?php echo $image?>&banner=<?php echo $banner?>&id=<?php echo  $row['brand_id']?>">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="deletetable.php?id=<?php echo $row['brand_id']?>&name=brand">
                                            <button type="button" class="btn btn-success">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
         <?php
      include 'admintemp/cdnofdatatables.php'
      ?>
</body>


</html>
<?php 
}
?>