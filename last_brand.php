<?php
SESSION_START();
?>
<!doctype html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php';
$id = $_GET['id'];
$catname = $_GET['categoryname'];
$brand_n = $_GET['brandname'];
$subcat = $_GET['subcat'];
$product_name = $_GET['product'];
$sub_product = $_GET['sub_product'];
$res = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE sub_product_id=$id and flag=1") or die("Query Unsuccessful.");
// $res1 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE product_id=$id") or die("Query Unsuccessful.");
$res2 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE sub_product_id=$id") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res)) {
    $sub = $row['sub_product_name'];
    $brand = $row['brand_id'];
    $image = $row['file_name'];
};
$br = mysqli_query($conn, "SELECT * FROM `brand` WHERE brand_id=$brand and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($br)) {
    $brand_name = $row['brand_name'];
    $brand_image = $row['image'];
};
$res1 = mysqli_query($conn, "SELECT * FROM `sub_product` WHERE sub_product_id=$id and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res1)) {
    $model_no = $row['model_no'];
    $id1 = $row['sub_product_id'];
    $name1 = $row['sub_product_name'];
    $images = $row['file_name'];
    $headers1 = explode(',', $images);
    $features = $row['features'];
    $specification = $row['specifications'];
    $link = $row['download_link'];
    $brand = $row['download_link'];
}
?>
<style>
@media only screen and (min-width:1200px) {
    .card-img-top {
        width: 100%;
        height: 500px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
}
</style>

<body>
    <?php
    include 'temp/topnav.php';
    include 'temp/nav.php';
    ?>


    <div class="container mt-5">
        <div class="col-md-12">
            <div class="row d-flex justify-content-between">
                <p class="text-muted">
                    <?php echo $brand_name ?>
                    &nbsp;> &nbsp;
                    <?php echo $catname; ?>&nbsp;>&nbsp;
                    <?php echo $subcat ?>&nbsp;>&nbsp;
                    <?php echo $product_name ?>&nbsp;>&nbsp;
                    <?php echo $sub_product ?></p>
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
                            style="width:40px;"><?php echo $sub_product ?> is added to cart. <a href="cart1.php"
                            class="alert-link">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="">
        <div class="container mt-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mt-3 ">
                        <div class="row card">
                            <img class="card-img-top" src="sub_product/<?php print_r($headers1[0]); ?>"
                                alt="Card image cap">
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="row my-auto">
                            <?php
                            while ($row = mysqli_fetch_assoc($res2)) {
                                $images = $row['file_name'];
                                $headers = explode(',', $images);
                                echo "
                            <div class='col-md-12'>
                                <div class='' >
                                 <div class='card-body'>
                                     <h3 class='pl-4'>{$row['sub_product_name']}</h3>
                                     <p class='pl-4'>MODEL # {$row['model_no']}<br>{$row['short_description']}</p>
                                <div class='col-md-12'>
                                <div class='row'>
                                <img class='pl-4' src='brand/$brand_image' alt=''>
                                <p class='pl-4'>MODEL # {$model_no}<br>BRAND #{$brand_name}</p>
                                </div>
                                </div>
                                <div class='col-md-12'>
                                <div class='row my-3 pl-2'>
                                <div class='col-md-8'>
                                    <form action='cart.php' method='post'>
                                        <input type='hidden' class='form-control' name='name' value='{$name1}' required>
                                        <input type='hidden' class='form-control' name='id' value='{$id1}' required>
                                        <input type='hidden' class='form-control' name='image' value='{$images}' required>
                                        <input type='hidden' class='form-control' name='quantity' value='1' min='1'>
                                        <button type='submit' name='Submit1' value='Submit1' class='btn btn-success w-100' onclick='showDiv()'>Add To Cart</button>
                                    </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                    </div>
                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active text-decoration-none" id="home-tab" data-toggle="tab" href="#home"
                            role="tab" aria-controls="home" aria-selected="true">FEATURES</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">SPECIFICATIONS</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">DOWNLOAD LINK</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active py-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p><?php echo $features; ?></p>
                    </div>
                    <div class="tab-pane fade py-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p><?php echo $specification; ?></p>
                    </div>
                    <div class="tab-pane fade py-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p><?php echo $link ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

</html>