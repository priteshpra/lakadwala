<?php
SESSION_START();
include 'connection.php';
include 'temp/head.php';
$id = $_GET['id'];
$brand = $_GET['brand'];
$catname = $_GET['categoryname'];
$brand_name = $_GET['brandname'];
$subcat = $_GET['subcat'];
$product_name = $_GET['product'];
// $res = mysqli_query($conn, "SELECT * FROM sub_product WHERE product_id=$id AND brand_id=$brand and flag=1") or die("Query Unsuccessful.");
$res1 = mysqli_query($conn, "SELECT * FROM sub_product WHERE product_id=$id AND brand_id=$brand and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res1)) {
    $images1 = $row['file_name'];
    $headers1 = explode(',', $images1);
    $sub_product1 = $row['sub_product_name'];
}

$res = mysqli_query($conn, "SELECT sub_product.* 
                            FROM sub_product
                            LEFT JOIN sub_category ON sub_category.subcategory_id = sub_product.subcategory_id
                            WHERE sub_product.product_id =$id and sub_product.flag=1");
?>
<style>
.vi {
    width: 239.48px;
}
.box img {
    height: 250px;
    object-fit: cover;
}
.card-text{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 237px;
}
</style>

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
                    <?php echo $subcat ?>&nbsp;>&nbsp;
                    <?php echo $product_name ?>&nbsp;
                </p>
                <a href="javascript:history.go(-1)" title="Return to the previous page">
                    <button type="button" class="btn btn-secondary">« Go back</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row mt-2" id="demo" style="display:none;">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <img src="sub_product/<?php print_r($headers1[0]); ?>" class="rounded img-thumbnail mr-2"
                            style="width:40px;"><?php echo $sub_product1 ?> is added to cart. <a href="cart1.php"
                            class="alert-link">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-3">
                        <?php
                        $num = mysqli_num_rows($res);
                        if($num > 0){
                        while ($row = mysqli_fetch_assoc($res)) {
                            $images = $row['file_name'];
                            $headers = explode(',', $images);
                            $sub_product = $row['sub_product_name'];
                            $sub_product_id = $row['sub_product_id'];
                        ?>
                        <div class="col-md-4 py-3">
                            <div class="card" style="width:auto;">
                                <a class=''
                                    href='last_brand.php?id=<?php echo $sub_product_id?>& brand=<?php echo $brand?>&brand=<?php echo $brand?>&brandname=<?php echo $brand_name?>&categoryname=<?php echo $catname?>&subcat=<?php echo $subcat?>&product=<?php echo $product_name?>&sub_product=<?php echo $sub_product?>'
                                    style="text-decoration:none">
                                    <div class="box">
                                    <div class="card-body">
                                        <img class="card-img-top " src='sub_product/<?php print_r($headers[0])?>'
                                            alt="Card image cap" style="height:250px;">
                                        <center>
                                            <p class="card-text bg3 px-auto"><?php echo $sub_product ?></p>
                                            <form action='cart.php' method='post'>
                                                <input type='hidden' class='form-control' name='name'
                                                    value='<?php echo $sub_product ?>' required>
                                                <input type='hidden' class='form-control' name='id'
                                                    value='<?php echo $sub_product_id?>' required>
                                                <input type='hidden' class='form-control' name='image'
                                                    value='<?php echo $headers[0] ?>' required>
                                                <input type='hidden' class='form-control' name='quantity' value='1'
                                                    min='1'>
                                                <button type='submit' name='Submit1' value='Submit1' class='btn mt-2'
                                                    onclick='showDiv()'
                                                    style="background-color: #669933;color:white">Add To Cart</button>
                                            </form>
                                        </center>
                                    </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <?php } 
                        }else{ ?>
                            <div class="col-md-4 py-3">
                            <div class="card" style="width:auto;">
                                <a class='' href="#">
                                    <div class="box">
                                    <div class="card-body">
                                        <img class="card-img-top " src='<?php print_r($imageBlank)?>'
                                            alt="Card image cap" style="height:250px;">
                                        <center>
                                            <p class="card-text bg3 px-auto"></p>
                                        </center>
                                    </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
    function showDiv() {
        document.getElementById('demo').style.display = "block";
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.setTimeout(function() {
                    location.reload()
                }, 2000)
            }
        };
        request.open("GET", "last_brand.php", true);
        request.send();
    }
    </script>

    <?php
    include 'temp/footer.php';
    ?>
</body>