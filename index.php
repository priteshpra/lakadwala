<!doctype html>
<html lang="en">
<?php
// SESSION_START();
include 'connection.php';
include 'temp/head.php';
$category2 = mysqli_query($conn, 'SELECT * FROM `category` WHERE flag=1') or die("Query Unsuccessful.");
$category1 = mysqli_query($conn, 'SELECT category.*,brand.brand_name,brand.image as brand_image FROM `category` 
                                    LEFT JOIN brand ON brand.brand_id = category.brand_id 
                                    WHERE category.flag=1 AND brand.flag=1
                                    ORDER BY brand.brand_name ASC LIMIT 0,12') or die("Query Unsuccessful.");
$query = mysqli_query($conn, "SELECT * from brand where flag=1") or die("Query Unsuccessful.");
$query2 = mysqli_query($conn, "SELECT * from brand where flag=1 ORDER BY brand_name ASC") or die("Query Unsuccessful.");
$about = mysqli_query($conn, "SELECT * FROM aboutus");

?>

<body>
    <?php
    include 'temp/topnav.php';
    ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="logo/Banner-1423x500 (1).jpg" alt="First slide">
            </div>
            <!-- <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div> -->
        </div>
    </div>

    <?php
    include 'temp/nav.php';
    ?>
    <!----------HTML code starts here------->
    <div class="container mt-5">
        <div class="col-md-12">
            <h3 class="font-weight-bold text-uppercase">Explore Our Brands</h3>
            <div class="row mt-3">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                                $brand_image = $row['image'];
                            ?>
                                <div class="owl-item  border" style=" margin-right: 10px;">
                                    <div class="item">
                                        <a href='brand.php?id=<?php echo $row['brand_id'] ?>'> <img src="brand/<?php echo $brand_image ?>" alt=""></a>
                                    </div>
                                </div>
                            <?php
                            };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                960: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function(e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    </script>
    <section style="background-color: #cccccc;" class="mt-3">
        <div class="container my-5">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($about)) {
                        $image = $row['image'];
                    ?>
                        <div class="col-md-6 py-5">
                            <img src="logo/<?php echo $image ?>" alt="" style="width:100%">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h3 class="font-weight-bold">ABOUT US</h3>
                            <p><?php echo $row['content'] ?></p>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    </section>
    <style>
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

        .item>a img {
            height: 90px;
            object-fit: cover;
        }
    </style>
    <div class="container my-3">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-9 mt-5">
                    <div class="row">
                        <?php
                        $x = 0;
                        while ($row = mysqli_fetch_assoc($category1)) {
                            // echo "<pre>"; print_r($row);
                            $stArray = $row['image'];
                            $catname = $row['category_name'];
                            echo "<div class='col-sm-4'>
                                    <div class='row p-3 ' >
                                        <a class='text-decoration-none text-center bg' href='category.php?id={$row['category_id']}&catname=$catname' >
                                        <div class='box' >
                                            <img class='card-img-top' src='category/{$row['image']}' alt='Card image cap'>
                                            <div class='justify-content-center' >
                                            <h6 class='py-2 mt-1'>
                                            $catname
                                            </h6>
                                            </div>
                                        </div>
                                         </a>
                                    </div>
                                </div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <?php
                    echo " <h3 class='font-weight-bold text-uppercase mb-3'>Brands</h3>";
                    $x = 0;
                    while ($row = mysqli_fetch_assoc($query2)) {
                        $stArray = $row['image'];
                        $catname = $row['brand_name'];
                        echo "
                            <li class='list-group-item text-white' style='background-color: green;color:white'>
                            <a href='brand.php?id={$row['brand_id']}' class='text-white' style='text-decoration: none;'>
                            <h5>
                            $catname
                            </h5>
                            </a>
                    </li>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php
    include 'temp/footer.php';
    ?>
</body>

</html>