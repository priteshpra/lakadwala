<section style="background-color:black;display: none;">
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
                <!-- <div class="col-md-12">
                    <div class="row justify-content-around">
                        <div class="col-md-4 col-sm-4 mx-auto">
                            <li class="nav-item dropdown text-center ">
                                <div class="nav-link text-decoration-none " href="#" id="navbardrop" data-toggle="dropdown" id="item">
                                    <button type="button" class="btn  btn-lg btn-block navbtn"> Brand
                                    </button>
                                </div>
                                <div class="">
                                    <div class="">

                                        <div class="dropdown-menu" style="background-color: grey;">
                                            <div class="row mx-1 d-flex justify-content-around">
                                                <?php
                                                $x = 0;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $stArray = $row['image'];

                                                    echo "
                                        <div class='col-md-4 col-sm-6 w-100 col-3' >
                                        <div class='my-3'>
                                        <a href='brand.php?id={$row['brand_id']}' style='text-decoration:none;' >
                                      <center> <img class='' src='brand/{$row['image']}' alt='' style='width:100%'></center>
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
                        <div class="col-md-4 col-sm-4">
                            <li class="nav-item dropdown text-center ">
                                <div class="nav-link " href="#" id="navbardrop" data-toggle="dropdown" id="item">
                                    <button type="button" class="btn  btn-lg btn-block navbtn"> Category
                                    </button>
                                </div>
                                <div class="container-fluid">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="dropdown-menu inside dropup" style="background-color: grey;">
                                            <center>
                                                <div class="row mx-2 d-flex justify-content-around">
                                                    <?php
                                                    $x = 0;
                                                    while ($row = mysqli_fetch_assoc($category)) {
                                                        $stArray = $row['image'];
                                                        $cat = $row['category_name'];
                                                        echo "
                                                        <div class='col-md-5 m-2 border-bottom'>
                                                        <a class='text-decoration-none text-white hove' href='category.php?id={$row['category_id']}&catname=$cat' style='text-decoration:none'>
                                                        <h6>{$cat}<h6>
                                                        </a>
                                                        </div>";
                                                    }
                                                    ?>
                                                </div>
                                            </center>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <li class="nav-item dropdown text-center ">
                                <a class="nav-link " href="request.php" id="navbardrop" id="item">
                                    <button type="button" class="btn  btn-lg btn-block navbtn">Request A Quote
                                    </button>
                                </a>

                            </li>
                        </div>
                    </div>
                </div> -->
            </ul>
        </nav>
    </div>
</section>








<?php
$result1 = mysqli_query($conn, 'SELECT brand_name FROM `brand` WHERE brand_name="$id" and flag=1') or die("Query Unsuccessful.");
$sub_category = mysqli_query($conn, 'SELECT category_name FROM `category` WHERE category_name="$id" and flag=1') or die("Query Unsuccessful.");

//  if ($sub_category!==0) {
//     echo"in first if";
//   } elseif (mysqli_num_rows($result1)!==0) {
//     echo "in second group";
//   }
//   else{
//       echo"error......................";
//   }

?>