<?php
SESSION_START();
?>
<!doctype html>
<html lang="en">
<?php
include 'connection.php';
include 'temp/head.php';
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    include 'temp/topnav.php';
    ?>
    <!-- 
    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="logo/Banner-1423x500 (1).jpg" alt="First slide" style="height:300px">
            </div>
        </div>
    </div> -->

    <?php
    include 'temp/nav.php';
    ?>
    <div class="conatiner-fluid mx-5 px-3 mt-5">
        <div class="col-md-12">
            <div class="row" style="background-color: white;">
                <h1>REQUEST A QUOTE</h1>
                <p>Welcome to our Request a Quote form. Please complete all your contact information in the fields below and then upload the inquiry for which you require a quote. One of our sales representatives will then contact you with an offer and with any further assistance that you may need. </p>
            </div>
        </div>
    </div>
    <section class="" style="background-color: white;">
        <div class="container py-5">
            <div class="col-lg-12 mx-auto">
                <form action="" method="post">
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
                            <input type="file" class="form-control" name="file" placeholder="Email" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <textarea class="form-control" name="address" rows="6" placeholder="Address" required></textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div id="html_element"></div>
                            <div class="g-recaptcha" data-sitekey="6LdMVJUfAAAAAJJRjysX6Blzp8TZekH25FX8VoIK">
                            </div>
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
    </section>
    <?php
    include 'temp/footer.php';
    ?>
</body>

</html>