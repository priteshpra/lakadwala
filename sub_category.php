<?php
SESSION_START();
?>
<!doctype html>
<html lang="en">
<?php
include 'connection.php';
$id = $_GET['id'];
$catname = $_GET['catname'];
include 'temp/head.php';
?>
<style>
@media only screen and(min-width:1200px) {
    .card-img-top {
        width: 239.48px;
        height: 206px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
}
.box img {
    height: 200px;
    object-fit: cover;
}
h6.py-2.mt-1 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 237px;
}
</style>

<body>
    <?php

    // $res = mysqli_query($conn, "SELECT * FROM `sub_category` WHERE subcategory_id=$id and flag=1") or die("Query Unsuccessful.");
    // $res1 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE sub_product_id=$id and flag=1") or die("Query Unsuccessful.");
    // $res2 = mysqli_query($conn, "SELECT * FROM `products` WHERE subcategory_id=$id and flag=1") or die("Query Unsuccessful.");
    // while ($row = mysqli_fetch_assoc($res)) {
    //     $sub_category_name = $row['subcategory_name'];
    //     $image = $row['image'];
    // }

    $res2 = mysqli_query($conn, "SELECT products.* 
                            FROM products
                            LEFT JOIN sub_category ON sub_category.subcategory_id = products.subcategory_id
                            WHERE sub_category.subcategory_id =$id and products.flag=1");

    $MainPro = mysqli_query($conn, "SELECT sub_product.*,sub_category.subcategory_name 
                                    FROM sub_product 
                                    LEFT JOIN sub_category ON sub_category.subcategory_id = sub_product.subcategory_id
                                    WHERE sub_product.subcategory_id=$id AND sub_product.product_id = 0  and sub_product.flag=1") or die("Query Unsuccessful.");    $x = 0;
    while ($row = mysqli_fetch_assoc($MainPro)) {
        $MainPros[$x]   = $row;
        $x++;
    };

    ?>
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
    <div class="container my-2">
        <div class="col-md-12">
            <div class="row py-3 d-flex justify-content-between">
                <h6 class="text-muted">
                    <?php echo $catname; ?>&nbsp;>&nbsp;<?php echo  $MainPros[0]['subcategory_name'] ?></h6>
                <a href="javascript:history.go(-1)" title="Return to the previous page">
                    <button type="button" class="btn btn-secondary">« Go back</button>
                </a>
            </div>
        </div>
    </div>
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
    <?php
    include 'temp/footer.php';
    ?>
</body>

</html>