<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php'; 
$res = mysqli_query($conn, "SELECT * FROM `contact us` WHERE 1") or die("Query Unsuccessful.");

?>
<style>
    .nav-pills .nav-link{
        background-color: #f9f9f9;
        color:black;
    }
    .nav-pills .nav-link.active{
        background-color: green;
    }
</style>

<body>
    <?php
    include 'temp/topnav.php';
    include 'temp/nav.php';
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="row my-5">
                <h3>STORE LOCATOR</h3>
            </div>
            <div class="row border">
                <div class="col-md-4 mt-5 px-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active border my-5" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        $name = $row['city'];
                        $address=$row['Address'];
                        $link=$row['Iframe'];
                    }
                    ?>
                            <h4><?php echo $name?></h4>
                            <p><?php echo $address?></p>
</a>
                        <!--<a class="nav-link border my2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">-->
                        <!--    <h4>ABU DHABI (MUSSAFFAH)</h4>-->
                        <!--    <p>Plot No.98, Shop 2 & 3. Musaffah Industrial Area, M9,Abu Dhabi UAE.-->

                        <!--        Tel: +971 2 555 7282-->
                        <!--        Fax: +971 2 5557283-->

                        <!--        Email: websales@aabtools.com</p>-->
                        <!--</a>-->
                    </div>
                </div>
                <div class="col-md-8 my-4 border-left px-4">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                             <iframe src=" <?php echo strip_tags($link)?>" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        <!--<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.140141721098!2d54.504065414865885!3d24.37642778428455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e41a8da42deef%3A0x379c5277d43c3469!2sAABTools%20Abu%20Dhabi!5e0!3m2!1sen!2sin!4v1650703281446!5m2!1sen!2sin" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                        <!--    </div>-->
                        <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.140141721098!2d54.504065414865885!3d24.37642778428455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e41a8da42deef%3A0x379c5277d43c3469!2sAABTools%20Abu%20Dhabi!5e0!3m2!1sen!2sin!4v1650703281446!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                        <!--    </div>-->
                        <!--<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.140141721098!2d54.504065414865885!3d24.37642778428455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e41a8da42deef%3A0x379c5277d43c3469!2sAABTools%20Abu%20Dhabi!5e0!3m2!1sen!2sin!4v1650703281446!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                        <!--    </div> -->
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
