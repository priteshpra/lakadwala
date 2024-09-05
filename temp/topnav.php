<!-- <?php
        SESSION_START();
        ?> -->

<div class="container my-3 bg-grey">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2 my-auto logo">
                <a href="index.php" style=' text-decoration: none;
  color: black;
  background-color: white;'>
                    <img src="logo/Lakdwala logo.png" alt="">
                </a>
            </div>
            <div class="col-md-6 my-auto">
                <form class="form-inline d-flex justify-content-center md-form form-sm" action="search.php"
                    method="POST">
                    <div class="input-group md-form form-sm form-1 pl-0 w-75">
                        <input class="form-control my-0 py-4 red-border" type="text" placeholder="Search"
                            aria-label="Search" name="search" required>
                        <div class="input-group-append">
                            <button class="input-group-text btn btn-primary" type="submit" id="basic-text1"
                                name='submit'>
                                <i class="bi bi-search " aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 my-auto">
                <div class="row my-auto">
                    <div class="iconmargin text-center">
                        <a href="locator.php" class='text-dark' style=' text-decoration: none;
  color: black;
  background-color: white;'>
                            <i class="bi bi-geo-alt" style="font-size:40px;color:green" aria-hidden="true"
                                aria-hidden="true"></i>
                            <!-- <i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:green"></i> -->
                            <p>Store Locator</p>
                        </a>
                    </div>
                    <div class="iconmargin text-center" data-toggle="modal" data-target="#exampleModalCentered">
                        <i class="bi bi bi-box-arrow-in-right" style="font-size:40px;color:green" aria-hidden="true"
                            aria-hidden="true"></i>
                        <!-- <i class="fa fa-map-marker fa-3x" aria-hidden="true" style="color:green"></i> -->
                        <p>Admin&nbsp;Login</p>
                    </div>
                    <div class="iconmargin text-center">
                        <a href="cart1.php" class='text-dark' style=' text-decoration: none;
  color: black;
  background-color: white;'>
                            <i class="bi bi-cart4" style="font-size:40px;color:green" aria-hidden="true"
                                aria-hidden="true"></i>
                            <br>
                            My Toolbox -
                            <?php
                            if (isset($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }   ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenteredLabel">LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="login.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="text" name="name" class="form-control" placeholder="USERNAME" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <div class="row justify-content-center mt-3">
                            <input type="submit" value="LOGIN" style="background: green; color: #fff;border:none"
                                class="text-center p-2">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>