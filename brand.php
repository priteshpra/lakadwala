<?php
session_start();
include 'connection.php';
$id = $_GET['id'];
include 'temp/head.php';
$res = mysqli_query($conn, "SELECT * FROM category where brand_id=$id and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res)) {
    $categorys['category_name']   = $row['category_name'];
    $categorys['category_id']   = $row['category_id'];
    $categorys['image']   = $row['image'];
    $categorys['description']   = $row['description'];
    $categorys['brand_id']   = $row['brand_id'];
    $categoryss[] = $categorys;
};
// echo "<pre>"; print_r($categoryss);die;

// $x = 0;
// if(!empty($category_id)){
//     foreach ($category_id as $value) {
//         $res2[$x] = mysqli_query($conn, "SELECT * from category where category_id=$value and flag=1") or die("Query Unsuccessful.");
//         $x++;
//     }
// }
$res3 = mysqli_query($conn, "SELECT * from brand where brand_id=$id and flag=1") or die("Query Unsuccessful.");
while ($row = mysqli_fetch_assoc($res3)) {
    $brand_name = $row['brand_name'];
    $brand_image = $row['image'];
    $brand_desc = $row['description'];
    $banner = $row['banner'];
    $headers = explode(',', $banner);
};
?>


<body>
    <?php
    include 'temp/topnav.php';
    ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="brand/<?php echo $banner ?>" alt="First slide">
            </div>

        </div>
    </div>

    <?php
    include 'temp/nav.php';
    ?>
    <!-- <section style="background-color: #cccccc;" class="">
    <div class="container mb-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 py-5">
                    <img src="brand/<?php echo $brand_image ?>" alt="" style="width:100%">
                </div>
                <div class="col-md-6 my-auto">
                    <h3 class="font-weight-bold text-uppercase">ABOUT Us</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
    <div class="container mt-4">
        <div class="col-md-12">
            <div class="row d-flex justify-content-end">
                <!-- <p><?php echo $brand_name ?></p> -->
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
    <div class="container my-3">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-12 col-sm-12 mt-2">
                    <div class="row">
                        <?php
                        if(!empty($categoryss)){
                            foreach ($categoryss as $val){
                                // while ($row = mysqli_fetch_assoc($val)) {
                                    // echo $row['category_id'];
                                    $catname = $val['category_name'];
                                    echo "<div class='col-md-4 col-sm-4'>
                                        <div class='row pr-3 py-3'>
                                        <a class='text-decoration-none  text-center bg' href='sub_brand.php?id={$val['category_id']}&brand={$id}&categoryname={$catname}' > 
                                        <div class='box' >
                                            <img class='card-img-top' src='category/{$val['image']}' alt='Card image cap'style='width: 100%;' >
                                            <div class='justify-content-center' >
                                            <h6 class='py-2 mt-1'>
                                            {$catname}
                                            </h6>
                                            </div>
                                                
                                            </div>
                                            </a>
                                            </div>
                                        </div>
                                        ";
                                // }
                            }
                         }else{
                            echo "<div class='col-md-4 col-sm-4'>
                            <div class='row pr-3 py-3'>
                            <div class='box' >
                                <img class='card-img-top' src='{$imageBlank}' alt='Card image cap'style='width: 100%;' >
                                <div class='justify-content-center' >
                                <h6 class='py-2 mt-1'>
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

    <div class="container">
        <div class="col-md-12">

            <h3 class="mt-3"><span class="text-warning"> ABOUT &nbsp<?php echo $brand_name ?> </span></h3>

            <div class="row justify-content-around my-5 border p-5">
                <div class="col-md-2 my-auto">
                    <div class="row">
                        <img src="brand/<?php echo $brand_image ?>" alt="" style="width:100%">
                    </div>
                </div>
                <div class="col-md-8 border-left">
                    <?php echo $brand_desc ?>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php
    include 'temp/footer.php';
    ?>
</body>