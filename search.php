<?php
    session_start();
    ?>
<!doctype html>
<html lang="en">
<?php
    include 'connection.php';
    include 'temp/head.php';
    if(isset($_POST['submit']))
    {
        $string=$_POST['search'];
        // $res = mysqli_query($conn, "SELECT * FROM products WHERE product_name like '%$string%' and flag=1") or die("Query Unsuccessful.");
       
    //    $cate = mysqli_query($conn, "SELECT products.product_id,products.product_name,products.image 
    //                                 FROM products 
    //                                 LEFT JOIN category ON category.category_id = products.category_id 
    //                                 WHERE (products.product_name like '%$string%' || category.category_name like '%$string%') 
    //                                 and products.flag=1") or die("Query Unsuccessful.");

        $res2 = mysqli_query($conn, "SELECT sub_product.* 
                                    FROM sub_product
                                    LEFT JOIN category ON category.category_id = sub_product.category_id
                                    LEFT JOIN sub_category ON sub_category.subcategory_id = sub_product.subcategory_id
                                    WHERE (sub_product.sub_product_name LIKE '%$string%' || 
                                    category.category_name LIKE '%$string%' || 
                                    sub_category.subcategory_name LIKE '%$string%') 
                                    AND sub_product.flag = 1 AND category.flag = 1 
                                    AND sub_category.flag = 1") or die("Query Unsuccessful.");
       
    //    $cate2 = mysqli_query($conn, "SELECT sub_product.sub_product_id,sub_product.sub_product_name,sub_product.file_name 
    //                                 FROM sub_product
    //                                 LEFT JOIN sub_category as category ON category.subcategory_id = sub_product.category_id 
    //                                 WHERE (sub_product.sub_product_name like '%$string%' || category.subcategory_name like '%$string%')
    //                                 and sub_product.flag=1") or die("Query Unsuccessful.");

    }
   ?>

<body>
    <?php
        include 'temp/topnav.php';
        ?>
    <!-- <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="logo/Banner-1423x500 (1).jpg" alt="First slide">
                </div>
            </div>
        </div> -->
    <?php
        include 'temp/nav.php';
        ?>
    <style>
        .box img {
            height: 200px;
            object-fit: cover;
        }
        h6.p-1.mt-1 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 237px;
        }
    </style>
    <div class="container my-5">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        $x = 0;
                        if(mysqli_num_rows($res2) > 0 && isset($res2)){
                            while ($row = mysqli_fetch_assoc($res2)) {
                                $images = $row['file_name'];
                                $headers = explode(',', $images);
                                echo "<div class='col-sm-3'>
                                            <div class='row p-3' >
                                            <a class='text-decoration-none text-center bg' href='lastcat.php?id={$row['sub_product_id']}' >
                                            <div class='box' >
                                                <img class='card-img-top bg-white' src='sub_product/{$headers[0]}' alt='Card image cap'>
                                                <div class='justify-content-center' >
                                                <h6 class='p-1 mt-1'>
                                                {$row['sub_product_name']}
                                                </h6>
                                                </div>
                                            </div>
                                            </a>
                                            </div>
                                        </div>";
                            }
                        }else{
                            echo "<div class='col-sm-3'>
                                            <div class='row p-3' >
                                            <a class='text-decoration-none text-center bg' href='#' >
                                            <div class='box' >
                                                <img class='card-img-top bg-white' src='{$imageBlank}' alt='Card image cap'>
                                                <div class='justify-content-center' >
                                                <h6 class='p-1 mt-1'>
                                                </h6>
                                                </div>
                                            </div>
                                            </a>
                                            </div>
                                        </div>";
                            
                        }
                        // if(mysqli_num_rows($cate) > 0){
                        //     while ($row = mysqli_fetch_assoc($cate)) {
                        //         $images = $row['image'];
                        //         echo "<div class='col-sm-3'>
                        //                     <div class='row p-3' >
                        //                     <a class='text-decoration-none text-center bg' href='lastcat.php?id={$row['product_id']}' >
                        //                     <div class='box' >
                        //                         <img class='card-img-top bg-white' src='products/{$images}' alt='Card image cap'>
                        //                         <div class='justify-content-center' >
                        //                         <h6 class='p-1 mt-1'>
                        //                         {$row['product_name']}
                        //                         </h6>
                        //                         </div>
                        //                     </div>
                        //                     </a>
                        //                     </div>
                        //                 </div>";
                        //     }
                        // }
                        // if(mysqli_num_rows($cate2) > 0){
                        //     while ($row = mysqli_fetch_assoc($cate2)) {
                        //         $images = $row['file_name'];
                        //         $images = explode(',', $images);
                        //         echo "<div class='col-sm-3'>
                        //             <div class='row p-3' >
                        //             <a class='text-decoration-none text-center bg' href='lastcat.php?id={$row['sub_product_id']}' >
                        //             <div class='box' >
                        //                 <img class='card-img-top bg-white' src='sub_product/{$images}' alt='Card image cap'>
                        //                 <div class='justify-content-center' >
                        //                 <h6 class='p-1 mt-1'>
                        //                 {$row['sub_product_name']}
                        //                 </h6>
                        //                 </div>
                        //             </div>
                        //             </a>
                        //             </div>
                        //         </div>";
                        //     }
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'temp/footer.php';
        ?>

</body>

</html>