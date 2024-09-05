<?php
SESSION_START();

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'admintemp/head.php';
$select = mysqli_query($conn, "SELECT * FROM `user` WHERE flag=1 ") or exit(mysqli_error($conn));
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
                <div class="row mx-1 d-flex justify-content-between">
                        <h2 class='text-center mb-3'>Orders</h2>
                        <a href="javascript:history.go(-1)" title="Return to the previous page">
                            <button type="button" class="btn btn-success">« Go back</button>
                        </a>
                    </div>
                    <div class="row mx-auto">
                    
                   
                   
                    </div>
                   
                    <hr>
                   

                     <div class="col-md-12 my-5">
                    <!--<hr>-->
                    <!--<h3 class="text-center text-uppercase">Customers Information</h3>-->
                    <!--<hr>-->
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
                                <th>STATUS</th>
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
                                    <td><label class="switch"> 
                                            <input type="checkbox" id="ts4" class="ts4" name="ts4" <?php echo ($row['status'] == 1)?"checked":''; ?> value="<?php echo $row['id'] ?>">
                                            <span class="slider round"></span>
                                        </label>
                                        <input type="hidden" id="orId" name="orId" value="<?php echo $row['id'] ?>">
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
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
            
            var switchStatus = false;
            $(".ts4").on('change', function() {
                var orId = $(this).val();
                if ($(this).is(':checked')) {
                        switchStatus = $(this).is(':checked');
                        $.ajax({
                        url: "ordersstatus.php",
                        type: "POST",
                        data: {
                            type: switchStatus,
                            id: orId
                        },
                        success: function(data) {
                            
                        }
                    })
                }
                else {
                    switchStatus = $(this).is(':checked');
                    $.ajax({
                        url: "ordersstatus.php",
                        type: "POST",
                        data: {
                            type: switchStatus,
                            id: orId
                        },
                        success: function(data) {
                            
                        }
                    })
                }
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