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
@media only screen and (min-width:1199px) {
    .card-img-top {
        width: 239.48px;
        height: 206px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
}

@media only screen and (min-width:1004px) and (max-width:1199px) {
    .card-img-top {
        width: 212.5px;
        height: 212.5px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
}

@media only screen and (max-width:1004px) and (min-width:575px) {
    .card-img-top {
        width: 150px;
        height: 150px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
}

@media only screen and (max-width:575px) and (min-width:358px) {
    .card-img-top {
        width: 324px;
        height: 324px;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
        align-items: center;
    }
}
</style>

<body>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM `category` WHERE category_id=$id AND flag=1") or die("Query Unsuccessful.");
    $res1 = mysqli_query($conn, "SELECT * FROM `sub_category` WHERE category_id=$id AND flag=1 ORDER BY subcategory_name ASC") or die("Query Unsuccessful.");
    $res2 = mysqli_query($conn, "SELECT * FROM `sub_category` WHERE category_id=$id AND flag=1 ORDER BY subcategory_name ASC") or die("Query Unsuccessful.");
    while ($row = mysqli_fetch_assoc($res)) {
        $category_name = $row['category_name'];
        $image = $row['image'];
        $small = $row['small_description'];
        $advantages = $row['advantages'];
    }
    ?>
    <?php
    include 'temp/topnav.php';
    ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="logo/Banner-1423x500 (1).jpg" alt="First slide" style="height:300px">
            </div>
        </div>
    </div>

    <?php
    include 'temp/nav.php';
    ?>
    <div class="container my-2">
        <div class="col-md-12">
            <div class="row py-3 d-flex justify-content-between">
                <h2 class="text-muted">
                    <?php echo $catname ?>&nbsp;</h2>
                <a href="javascript:history.go(-1)" title="Return to the previous page">
                    <button type="button" class="btn btn-secondary">« Go back</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container mb-5 mt-2">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <?php
                        $x = 0;
                        while ($row = mysqli_fetch_assoc($res2)) {
                            echo "
                                    <div class='col-sm-4'>
                                        <div class='row pr-3 py-3 justify-content-center' >
                                        <a class='text-decoration-none text-center bg' href='sub_category.php?id={$row['subcategory_id']}&catname=$catname' >
                                        <div class='' >
                                            <img class='card-img-top' src='sub_category/{$row['image']}' alt='Card image cap'>
                                            <div class='justify-content-center' >
                                            <h6 class='py-2 mt-1'>
                                            {$row['subcategory_name']}
                                            </h6>
                                            </div>
                                        </div>
                                        </a>
                                        </div>
                                     </div>
                                        ";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-3 pt-3">
                    <div class="row card text-center">
                        <h3 class='font-weight-bold text-uppercase mb-3 p-2 text-center'><?php echo $category_name; ?>
                        </h3>
                        <?php
                        $x = 0;
                        while ($row = mysqli_fetch_assoc($res1)) {
                            $stArray = $row['image'];
                            echo "
                            <li class='list-group-item text-white' style='background-color: green;color:white'>
                            <a href='sub_category.php?id={$row['subcategory_id']}&catname=$catname' class='text-white' style='text-decoration: none;'>
                            <h5>
                            {$row['subcategory_name']}
                            </h5>
                            </a>
                    </li>";
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="" style="background-color: #cccccc;">
        <div class="container py-5">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-6 p-4">
                        <img class="card-img-top cartimg" src="category/<?php echo $image; ?>" alt="Card image cap"
                            style="width:100%;height:100%">
                    </div>
                    <div class="col-md-6 my-auto  p-4">
                        <h2> About
                            <h3 class="card-title" style="color:green"><?php echo $category_name; ?></h3>
                        </h2>
                        <p class="card-text">
                            <?php echo $small; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <?php
    include 'temp/footer.php';
    ?>
</body>

</html>