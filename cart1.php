<?php
SESSION_START();
?>
<!doctype html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php';
$category1 = mysqli_query($conn, 'SELECT * FROM `category` WHERE category_id!=1 and flag=1') or die("Query Unsuccessful.");
$category2 = mysqli_query($conn, 'SELECT * FROM `category` WHERE category_id!=1 And flag=1') or die("Query Unsuccessful.");
?>
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
    <div class="container my-5">
        <div class="col-md-12">
            <div class="row justify-content-between bg-success text-white px-2 py-2">
                <a href="index.php">
                    <button type="button" class="btn btn-success">Home</button>
                </a>
                <a href="javascript:history.go(-1)" title="Return to the previous page" style="text-decoration:none;color:white;" class="my-auto">
                    « Go back

                </a>
            </div>
            <div class="row" style="overflow-x: scroll;">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-uppercase">
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($_SESSION['cart'])) { ?>
                            <tr>
                                <td>
                                    <h3>Your cart is emty</h3>
                                </td>
                            </tr>

                        <?php } ?>
                        <?php
                        $id = 1;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $str = $value['image'];
                            $image = explode(",", $str);
                        ?>
                            <tr>
                                <th scope="row"><?php echo $id;
                                                $id++; ?></th>
                                <td><?php print_r($value['name']) ?></td>
                                <td><img src="sub_product/<?php echo $image[0] ?>" alt="" style="width:50px"></td>
                                <td>
                                    <input type="number" name="" class="cart-qty-single mt-1" data-item-id="<?php echo $key ?>" value="<?php print_r($value['quantity']) ?>" min="1" max="1000">
                                </td>
                                <td>
                                    <a href="delete.php?action=remove&item=<?php echo $key; ?>" class="text-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php if (!empty($_SESSION['cart'])) { ?>
                    <div class="col-md-12 mb-3">
                        <div class=" d-flex flex-row-reverse bd-highlight">
                            <div class="">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">GET A QUOTE</button>
                                <a href="delete.php?action=delete">
                                    <button type="button" class="btn btn-danger text-uppercase">Empty cart</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <center>
                        <h4 class="modal-title" id="exampleModalLabel">SENDER INFO</h4>
                    </center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form action="demo.php" method="post">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <input type="radio" name="require" value="BUSINESS USE">&nbsp;BUSINESS USE&nbsp;
                                    <input type="radio" name="require" value="RESELLER">&nbsp;RESELLER&nbsp;
                                    <input type="radio" name="require" value="PERSONAL USE">&nbsp;PERSONAL USE&nbsp;
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="text" class="form-control" name="num" placeholder="Phone Number" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div id="html_element"></div>
                                    <div class="g-recaptcha" data-sitekey="6LdQxiMjAAAAANnp0U327NMjDyhIEf7qq0RGNPVP">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <textarea class="form-control" name="address" rows="6" placeholder="Address" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="row justify-content-center mt-3">
                                        <input type="submit" value="Submit" style="background: green; color: #fff;border:none" id="01" class="text-center p-2">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    include 'temp/footer.php';
    ?>

    <!-- 
Site Key :6LdMVJUfAAAAAJJRjysX6Blzp8TZekH25FX8VoIK
Secretw key: 6LdMVJUfAAAAAOgOww8QHYP61vVAhfEjDvnUZb7S
 -->





</body>

</html>