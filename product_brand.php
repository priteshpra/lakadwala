<?php
// SESSION_START();
include 'connection.php';
include 'temp/head.php';
$id = $_GET['id']; //39
$brand = $_GET['brand']; //2
$catname = $_GET['categoryname'];
$brand_name = $_GET['brandname'];
$subcat = $_GET['subcat'];
// $res = mysqli_query($conn, "SELECT DISTINCT product_id FROM sub_product WHERE subcategory_id=$id AND brand_id=$brand and flag=1") or die("Query Unsuccessful.");
// while ($row = mysqli_fetch_assoc($res)) {
//     $product_id[]   = $row['product_id'];
// };
// $x = 0;
// foreach ($product_id as $value) {
//     $res2[$x] = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id=$value and flag=1") or die("Query Unsuccessful.");
//     $x++;
// }

$res2 = mysqli_query($conn, "SELECT products.* 
                            FROM products
                            LEFT JOIN sub_category ON sub_category.subcategory_id = products.subcategory_id
                            WHERE sub_category.subcategory_id =$id and products.flag=1");

$MainPro = mysqli_query($conn, "SELECT * FROM sub_product WHERE subcategory_id=$id AND product_id =0 AND brand_id=$brand and flag=1") or die("Query Unsuccessful.");
$x = 0;
while ($row = mysqli_fetch_assoc($MainPro)) {
    $MainPros[$x]   = $row;
    $x++;
};
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
    <div class="container mt-5">
        <div class="col-md-12">
            <div class="row d-flex justify-content-between">
                <p class="text-muted">
                    <a class="text-decoration-none" href="brand.php?id=<?php echo $brand ?>">
                        <?php echo $brand_name ?></a> &nbsp;> &nbsp;
                    <?php echo $catname; ?>&nbsp;>&nbsp;
                    <?php echo $subcat ?>&nbsp;
                </p>
                <a href="javascript:history.go(-1)" title="Return to the previous page">
                    <button type="button" class="btn btn-secondary">« Go back</button>
                </a>
            </div>
        </div>
    </div>

    <style>
        .box img {
            height: 250px;
            object-fit: cover;
        }
    </style>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-3">
                        <?php
                        $num = mysqli_num_rows($res2);
                        if($num > 0){
                        foreach ($res2 as $row){
                            // while ($row = mysqli_fetch_assoc($val)) {
                                $product_name = $row['product_name'];
                                echo "<div class='col-md-4 mt-3 ' style='width: 100%;'>
                                            <div class='row pr-3 py-3'>
                                            <a class='text-decoration-none  text-center bg' href='sub_product_brand.php?id={$row['product_id']}&brand={$brand}&brandname={$brand_name}&categoryname={$catname}&subcat={$subcat}&product={$product_name}'> 
                                                <div class='box' >
                                                    <img class='card-img-top' src='products/{$row['image']}' alt='Card image cap' >
                                                    <div class='justify-content-center' >
                                                        <h6 class='py-2 mt-1 px-2'>
                                                        {$product_name}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>";
                            }
                            // }
                         }
                        //  else{
                        //     echo "<div class='col-md-4 mt-3 ' style='width: 100%;'>
                        //             <div class='row pr-3 py-3'>
                        //                 <div class='box' >
                        //                     <img class='card-img-top' src='{$imageBlank}' alt='Card image cap' >
                        //                     <div class='justify-content-center' >
                        //                         <h6 class='py-2 mt-1 px-2'>
                        //                         </h6>
                        //                     </div>
                        //                 </div>
                        //             </div>
                        //         </div>";
                        //  } 
                         ?>
                         <?php
                            
                            if(!empty($MainPros)){
                                foreach ($MainPros as $val){
                                    $product_name = $val['sub_product_name'];

                                        echo '<div class="col-md-4 py-3" style="width:100%;">
                                        <div class="row pr-3" >
                                            <a class=""
                                                href="last_brand.php?id='.$val['sub_product_id'].'.& brand='.$val['brand_id'].'.&brand='.$val['brand_id'].'.&brandname='.$brand_name.'.&categoryname='.$catname.'.&subcat='.$subcat.'.&product='.$product_name.'"
                                                style="text-decoration:none">
            
                                                <div class="box">
                                                    <img class="card-img-top " src="sub_product/'.str_replace(',','',$val['file_name']).'"
                                                        alt="Card image cap" style="height:250px;">
                                                    <center>
                                                        <p class="card-text bg3 px-auto">'.$product_name .'</p>
                                                        <form action="cart.php" method="post">
                                                            <input type="hidden" class="form-control" name="name"
                                                                value="'.$product_name.'" required>
                                                            <input type="hidden" class="form-control" name="image"
                                                                value="sub_product/'.$val['file_name'].'" required>
                                                            <input type="hidden" class="form-control" name="quantity" value="1"
                                                                min="1">
                                                            <button type="submit" name="Submit1" value="Submit1" class="btn mt-2"
                                                                onclick="showDiv()"
                                                                style="background-color: #669933;color:white">Add To Cart</button>
                                                        </form>
                                                    </center>
                                                </div>
                                            </a>
                                        </div>
                                    </div>';
                                }
                             }else if(mysqli_num_rows($res2) <= 0){
                                echo "<div class='col-md-4 mt-3 ' style='width: 100%;'>
                                        <div class='row pr-3 py-3'>
                                            <div class='box' >
                                                <img class='card-img-top' src='{$imageBlank}' alt='Card image cap' >
                                                <div class='justify-content-center' >
                                                    <h6 class='py-2 mt-1 px-2'>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                             } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include 'temp/footer.php';
    ?>
</body>