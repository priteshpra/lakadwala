<section style="background-color:black;">
    <div class="container">
        <nav class="navbar navbar-expand-sm  navbar-dark container-fluid">


            <!-- Links -->
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li> -->
                <!-- Dropdown -->
                <div class="col-md-12">
                    <div class="row justify-content-around">
                        <div class="col-md-4 mx-auto">
                            <li class="nav-item dropdown text-center dropup">
                                <a class="nav-link " href="#" id="navbardrop" data-toggle="dropdown" id="item">
                                    <button type="button" class="btn  btn-lg btn-block" style="width:350px"> Brand <i class="fa fa-caret-up float-right" aria-hidden="true"></i></button>

                                </a>
                                <div class="container">
                                    <div class="col-md-12">
                                        <!-- <form action="insert.php" method="POST" enctype='multipart/form-data'> -->
                                        <div class="dropdown-menu in " style="background-color: grey;">
                                            <div class="row mx-2">
                                                <?php
                                                $x = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $stArray = $row['image'];

                                                    echo "
                                        <div class='col-md-3 hove  dropdown-item' >
                                        <div class='card my-3' style='width: auto;'>
                                        <a href='brand.php?id={$row['brand_id']}'>
                                        <img class='card-img-top' src='brand/{$row['image']}' alt='Card image cap' >
                                        </a>
                                        </div>                                    
                                        </form>
                                        </div>
                                        ";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-4">
                            <li class="nav-item dropdown text-center dropup">
                                <a class="nav-link " href="#" id="navbardrop" data-toggle="dropdown" id="item">
                                    <button type="button" class="btn  btn-lg btn-block" style="width:350px"> Category <i class="fa fa-caret-up float-right" aria-hidden="true"></i></button>

                                </a>
                                <div class="container">
                                    <div class="col-md-12">

                                        <!-- <form action="insert.php" method="POST" enctype='multipart/form-data'> -->
                                        <div class="dropdown-menu in dropup" style="background-color: green;">
                                            <div class="row mx-2">
                                                <?php
                                                $x = 0;
                                                while ($row = mysqli_fetch_assoc($category)) {
                                                    $stArray = $row['image'];
                                                    echo "
                                    <div class='col-sm-4 p-4 '>
                                    <div class='row' style='background-color:green'>
                                    <div class=' d-flex'>
                                        <div class=''>
                                        <a class='text-decoration-none text-white' href='category.php?id={$row['category_id']}' >
                                        <h3 class=''>{$row['category_name']}</h3>
                                        </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-4">
                            <li>
                                <a class="nav-link " href="#" id="navbardrop" id="item">
                                    <button type="button" class="btn  btn-lg btn-block" style="width:350px">Request A Quote</button>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
</section>
<?php



$result1 = mysqli_query($conn, 'SELECT brand_name FROM `brand` WHERE brand_name="$id"') or die("Query Unsuccessful.");
$sub_category = mysqli_query($conn, 'SELECT category_name FROM `category` WHERE category_name="$id"') or die("Query Unsuccessful.");

//  if ($sub_category!==0) {
//     echo"in first if";
//   } elseif (mysqli_num_rows($result1)!==0) {
//     echo "in second group";
//   }
//   else{
//       echo"error......................";
//   }

?>