<?php
SESSION_START();

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
$number = $_GET['id'];
$select = mysqli_query($conn, "SELECT * FROM `orders` WHERE flag=1 and mobile=$number") or exit(mysqli_error($conn));
$user = mysqli_query($conn, "SELECT * FROM `user` WHERE flag=1 and mobile=$number") or exit(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($user)) {

    $username = $row['user_name'];
}

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" rel="stylesheet"> -->


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
                    <hr>
                    <div class="row d-flex mx-3 justify-content-between">
                        <h2 class='text-center mb-3'>Orders Of <?php echo $username ?></h2>
                        <a href="javascript:history.go(-1)" title="Return to the previous page">
                            <button type="button" class="btn btn-success">« Go back</button>
                        </a>
                    </div>
                    <hr>


                    <div class="col-md-12 my-5">
                        <table id="example" class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md dataTable no-footer " style="width:100%">
                            <thead>
                                <tr class="bg-success text-white">
                                    <th>ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>IMAGE</th>
                                    <th>QUANTITY</th>
                                    <th>ORDER ON</th>
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
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td><img src="sub_product/<?php echo $row['image'] ?>" alt="" style="width:60px"></td>
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['update_on'] ?></td>
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
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>

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
        <!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script> -->





    </body>

</html>
<?php  }
?>