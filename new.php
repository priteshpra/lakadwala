<?php
// SESSION_START();
include 'connection.php';
include 'temp/head.php';

// header("location:javascript://history.go(-1)");
?>

<!doctype html>
<html lang="en">
<?php

include 'connection.php';
include 'temp/head.php';
$category1 = mysqli_query($conn, 'SELECT * FROM `category` WHERE category_id!=1 and flag=1') or die("Query Unsuccessful.");
$category2 = mysqli_query($conn, 'SELECT * FROM `category` WHERE category_id!=1 and flag=1') or die("Query Unsuccessful.");
?>
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
    rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
    rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
</script>
<style>
.owl-item {
    width: 10.906px;
    margin-right: 10px;
    background: powderblue;
}


/** to hide dots

.owl-theme .owl-dots .owl-dot{ display:none!important;}

**/
</style>

<body>

    <div class="container my-3 bg-grey">
        <div class="col-md-12">
            <div class="row" style="height: 60px;">
                <div class="col-md-2 mt-1">
                    <img src="logo/Lakdwala logo.png" alt="" style="width:100%">
                </div>

                <div class="col-md-4 my-auto d-flex justify-content-center">
                    <div class="row">
                        <form class="example mx-auto" action="">
                            <div class="input-group input-group-sm mb-3">
                                <input type="text" class="form-control" aria-label="Small"
                                    aria-describedby="inputGroup-sizing-sm" placeholder="Search..">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"
                                        style="background-color: green;"><i class="fa fa-search text-white"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 my-auto ml-auto">
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-md-2 text-center">
                            <i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:green"></i>
                            <p> Address</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:green"></i>
                            <p> Address</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:green"></i><br>
                            My Toolbox -
                            <?php
                            if (isset($_SESSION)) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }   ?>
                            <p> Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <!-- <h3 class="font-weight-bold text-uppercase">Explore Our Brands</h3> -->
            <div class="row mt-3">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/3M_LOGO-01_1543827788.png" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/black-and-decker_1438081908.jpg" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/dewalt-logo.jpg" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Expert_Logo.jpg" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/extech-logo.png" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/fluke-logo.png" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Fluke-Process-Instruments-AABTools-Al-Quoz-Head-Office-Dewalt-Fluke-Distributor-Dubai-UAE.jpg"
                                        alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Gazelle_Logo.jpg" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/groz-logo.png" alt="">
                                </div>
                            </div>

                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/husqvarna-logo-new.jpg" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/groz-logo.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 100%; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/groz-logo.png" alt="">
                                </div>
                            </div>
                            <!-- <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div> -->
                            <!-- <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div>
                            <div class="owl-item  border" style="width: 128.906px; margin-right: 10px;">
                                <div class="item">
                                    <img src="brand/Klauke-Logo-01-002.png" alt="">
                                </div>
                            </div> -->
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
                items: 5
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
                    <div class="col-md-6 py-5">
                        <img src="logo/About us-800x500.jpg" alt="" style="width:100%">
                    </div>
                    <div class="col-md-6 my-auto">
                        <h3 class="font-weight-bold">ABOUT US</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-3">
        <div class="col-md-12">
            <div class="row d-flex">
                <div class="col-md-9 mt-5">
                    <div class="row">
                        <?php
                        $x = 0;
                        while ($row = mysqli_fetch_assoc($category1)) {
                            $stArray = $row['image'];
                            echo "
                                    <div class='col-sm-4'>
                                        <div class='row  p-3' >
                                        <div class='border'>
                                            <img class='card-img-top ' src='category/{$row['image']}' alt='Card image cap'>
                                            <div class='row card-body'>
                                            <ul class='list-group list-group-flush text-center bg-dark' >
                                            <a class='text-decoration-none text-dark' href='category.php?id={$row['category_id']}' >
                                                <li class='list-group-item'>{$row['category_name']}</li>
                                                </a>
                                            </ul>       
                                            </div>
                                        </div>
                                        </div>
                                     </div>
                                        ";
                        }
                        ?>


                    </div>
                </div>
                <div class="col-md-3">
                    <?php
                    echo " <h2 class='font-weight-bold text-uppercase'>Category</h2>";
                    $x = 0;
                    while ($row = mysqli_fetch_assoc($category2)) {
                        $stArray = $row['image'];
                        echo "
                            <li class='list-group-item text-white' style='background-color: green;color:white'>
                            <a href='category.php?id={$row['category_id']}' class='text-white'>
                            <h5>
                            {$row['category_name']}
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
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4" style="background-image: url('logo/Footer Banner-1423x300.jpg');">

        <!-- Footer Links -->
        <div class="container text-center text-md-left text-white">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-4 mt-md-0 mt-3">
                    <!-- Content -->
                    <img src="logo/footer_logo.png" alt="" style="width: 50%;">
                    <!-- <h5 class="text-uppercase">Footer Content</h5> -->
                    <p class="mt-3">Here you can use rows and columns to organize your footer content.</p>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">
                <!-- Grid column -->
                <div class="col-md-3 text-center mb-md-0 mb-3">
                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 text-center">
                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-white">© 2022 Copyright:
            <a href="http://beingaddictive.com/"> Being Addictive</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- 
    <div class="card bg-dark text-white">
        <img class="card-img" src="logo/Footer Banner-1423x300.jpg" alt="Card image">
        <div class="col-md-12 card-img-overlay">
            <div class="row">
                <div class="col-md-3">
                    <img src="logo/footer_logo.png" alt="">
                    <div class="">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div> -->

</body>

</html>