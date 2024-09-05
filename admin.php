<?php
SESSION_START();

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
$select = mysqli_query($conn, "SELECT * FROM `user` WHERE flag=1") or exit(mysqli_error($conn));
$category = mysqli_query($conn, "SELECT * FROM `category` WHERE flag=1 and category_id!=1") or exit(mysqli_error($conn));
$brand = mysqli_query($conn, "SELECT * FROM `brand` WHERE flag=1") or exit(mysqli_error($conn));
$count = mysqli_query($conn, "SELECT COUNT(id) as cd FROM user WHERE flag=1");
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet">


<!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script> -->

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
                    <!-- <hr>
                    <h3 class="text-center text-uppercase">Total Orders</h3>
                    
                    <hr> -->
                    <div class="row mx-auto mt-5">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="card rounded-0 p-0 shadow-sm justify-content-center">
                                <!-- <img src="https://user-images.githubusercontent.com/25878302/58369568-a49b2480-7efc-11e9-9ca9-2be44afacda1.png" class="card-img-top rounded-0" alt="Angular pro sidebar"> -->
                                <div class="card-body text-center">
                                    <h4 class="card-title">Total Orders</h4>
                                    <h3 class="card-title "><?php
                                    while ($row = mysqli_fetch_assoc($count)) {
                                         echo $row['cd']; 
                                    }?></h3>
                                    <!-- <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a> -->
                                    <a href="totalorders.php"  class="btn btn-success btn-sm">Preview</a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <!-- <h2>Admin Panel</h2> -->
                    <hr>
                    <h3 class="text-center text-uppercase">Categories</h3>

                    <div class="col-md-12 my-5">
                        <table id="example" class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md" style="width:100%">
                            <thead>
                                <tr class="bg-success text-white">
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>CATEGORY IMG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id1 = 1;
                                while ($row = mysqli_fetch_assoc($category)) {
                                ?>
                                    <tr>
                                        <td><?php echo $id1;
                                            $id1++ ?></td>
                                        <td style="width:70%"><?php echo $row['category_name'] ?></td>
                                        <td><img src="category/<?php echo $row['image'] ?>" alt="" style="width:100px"></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12 my-5">
                        <hr>
                        <h3 class="text-center text-uppercase">Brands</h3>
                        <hr>
                        <table id="example2" class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md" style="width:100%;overflow-x:scroll">
                            <thead>
                                <tr class="bg-success text-white">
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>BRAND IMG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id1 = 1;
                                while ($row = mysqli_fetch_assoc($brand)) {
                                ?>
                                    <tr>
                                        <td><?php echo $id1;
                                            $id1++ ?></td>
                                        <td style="width:70%"><?php echo $row['brand_name'] ?></td>
                                        <td><img src="brand/<?php echo $row['image'] ?>" alt="" style="width:100px"></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 my-5">
                    <hr>
                    <h3 class="text-center text-uppercase">Customers Information</h3>
                    <hr>
                    <table id="example1" class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md" style="width:100%;overflow-x:scroll">
                        <thead>
                            <tr class="bg-success text-white">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>MOBILE NUMBER</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <!--<th>REQUIRED FOR</th>-->
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = 1;
                            while ($row = mysqli_fetch_assoc($select)) {
                                $mobile = $row['mobile'];
                            ?>
                                <tr>
                                    <td><?php echo $id;
                                        $id++ ?></td>
                                    <td><?php echo $row['user_name'] ?></td>
                                    <td><?php echo $mobile ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <!--<td><?php echo $row['position'] ?></td>-->
                                    <td><a href="orders.php?id=<?php echo $mobile ?>">
                                            <button class="btn-success">
                                                ORDERS</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
 <?php
            include 'admintemp/footer.php';
            ?>
               
        </div>
        </main>
        <!-- page-content" -->
        </div>


        <!-- page-wrapper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="admintemp/admin.js"></script>
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
                var table = $('#example1').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                    .appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
        <script>
            $(document).ready(function() {
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                    .appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>

      <?php
      include 'admintemp/cdnofdatatables.php'
      ?>
    </body>

</html>
<?php  }
?>