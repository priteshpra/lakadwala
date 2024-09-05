<?php
SESSION_START();
?>
<!doctype html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php';
$id = $_GET['id'];
$catname = $_GET['catname'];
$sub_category_name = $_GET['sub_cat_name'];
$res = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id=$id and flag=1") or die("Query Unsuccessful.");
$res1 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE product_id=$id and flag=1") or die("Query Unsuccessful.");
$res2 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE product_id=$id and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res)) {
    $sub = $row['product_name'];
    $image = $row['image'];
}
while ($row = mysqli_fetch_assoc($res1)) {
    $images3 = $row['file_name'];
    $headers3 = explode(',', $images3);
    $sub_product3 = $row['sub_product_name'];
}
?>
<style type="text/css">
.box img {
    height: 200px !important;
    object-fit: cover;
}
.card-text {
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

    <div class="container my-2">
        <div class="col-md-12">
            <div class="row py-3 d-flex justify-content-between">
                <h6 class="text-muted">
                    <?php echo $catname ?>&nbsp;>&nbsp;<?php echo  $sub_category_name ?>
                    &nbsp;>&nbsp;<?php echo  $sub ?></h6>
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
                        <img src="sub_product/<?php print_r($headers3[0]); ?>" class="rounded img-thumbnail mr-2"
                            style="width:40px;"><?php echo $sub_product3 ?> is added to cart. <a href="cart1.php"
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
                        while ($row = mysqli_fetch_assoc($res2)) {
                            $images = $row['file_name'];
                            $headers = explode(',', $images);
                            $sub_product = $row['sub_product_name'];
                            $sub_product_id = $row['sub_product_id'];
                        ?>
                        <div class="col-md-4 py-3">
                            <div class="card" style="width:auto;">
                                <a class=''
                                    href='lastcat.php?id=<?php echo $row['sub_product_id'] ?>&catname=<?php echo $catname ?>&sub_cat_name=<?php echo $sub_category_name ?>&productname=<?php echo $sub ?>'
                                    style="text-decoration:none">
                                    <div class="box">
                                    <div class="card-body">
                                        <img class="card-img-top " src='sub_product/<?php print_r($headers[0]) ?>'
                                            alt="Card image cap" style="height:250px;">
                                        <center>
                                            <p class="card-text bg3 px-auto"><?php echo $sub_product ?></p>
                                            <form action='cart.php' method='post'>
                                                <input type='hidden' class='form-control' name='name'
                                                    value='<?php echo $sub_product ?>' required>
                                                <input type='hidden' class='form-control' name='id'
                                                    value='<?php echo $sub_product_id ?>' required>
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
                        ?>
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
        request.open("GET", "last_cat.php", true);
        request.send();
    }
    </script>







    <?php
    include 'temp/footer.php';
    ?>





</body>

</html>