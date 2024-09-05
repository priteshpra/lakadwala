<?php
SESSION_START();
include 'connection.php';
$id = $_GET['id']; //39
$brand = $_GET['brand']; //2
$res = mysqli_query($conn, "SELECT DISTINCT product_id FROM sub_product WHERE category_id=$id AND brand_id=$brand and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res)) {
    $product_id[]   = $row['product_id'];
};
$x = 0;
foreach ($product_id as $value) {
    $res2[$x] = mysqli_query($conn, "SELECT * from products where product_id=$value and flag=1") or die("Query Unsuccessful.");
    $x++;
}
?>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <h4>About:</h4>
                <h4>Categories:</h4>
                <div class="col-md-4">
                    <div class="row mt-3">
                        <?php
                        foreach ($res2 as $val)
                            while ($row = mysqli_fetch_assoc($val)) {
                                echo $row['product_id'];
                                echo "
                                        <div class='col-md-2 mt-3'>
                                             <div class='card' >
                                                  <img class='card-img-top' src='products/{$row['image']}' alt='Card image cap'style='width: 50%;'>
                                                   <a href='sub_product_brand.php?id={$row['product_id']}& brand={$brand}' > 
                                                    <div class='card-body'>
                                                    <h6 class='card-title'>{$row['product_name']}</h6>
                                                    </div>
                                                    </a>
                                              </div>
                                         </div> ";
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>