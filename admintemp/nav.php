<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<?php $mylink = $_SERVER['PHP_SELF'];
$name = basename($mylink, ".php");
?>
<nav id="sidebar" class="sidebar-wrapper bg-white border">
    <div class="sidebar-content">
        <div class="sidebar-brand text-center">
            <a href="admin.php" style="text-decoration:none">
                <img src="logo/logo.png" alt="" style="width:100%">
            </a>
            <div id="close-sidebar">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="<?php echo ($name == 'admin')?'text-black bg-success':''; ?>">
                    <a href="admin.php">
                        <i class="fa fa-book"></i>
                        <span class="text-black">Dashboard</span>
                        <!-- <span class="badge badge-pill badge-warning">New</span> -->
                    </a>
                </li>
                <!--<li class="sidebar-dropdown">-->
                <!--    <a href="#">-->
                <!--        <i class="fa fa-shopping-cart"></i>-->
                <!--        <span>Add Products</span>-->
                <!--        <span class="badge badge-pill badge-danger">3</span>-->
                <!--    </a>-->
                <!--    <div class="sidebar-submenu ">-->
                <!--        <ul class='bg-white pr-4 list-unstyled'>-->
                <!--            <li>-->
                <!--                <a href="addcategory.php">Add Category-->
                <!--                </a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="addsubcategory.php">Add Subcategory</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="addproduct.php">Add Product</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="addsubproduct.php">Add Subproduct</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="addbrand.php">Add Brand</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
                <!--<li class="sidebar-dropdown">-->
                <!--    <a href="#">-->
                <!--        <i class="far fa-gem"></i>-->
                <!--        <span>Edit</span>-->
                <!--    </a>-->
                <!--    <div class="sidebar-submenu">-->
                <!--        <ul class='bg-white pr-4 list-unstyled'>-->
                <!--            <li>-->
                <!--                <a href="editcategory.php">Edit Category</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="editsubcategory.php">Edit Sub-Category</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="editproduct.php">Edit Product</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="editsubproduct.php">Edit Sub-Products</a>-->
                <!--            </li>-->
                <!--            <li>-->
                <!--                <a href="editbrand.php">Edit Brand</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
            <li class="<?php echo ($name == 'editcategory' || $name == 'categoryedit' || $name == 'addcategory')?'text-black bg-success':''; ?>">
            <a href="editcategory.php">
              <i class="fa fa-folder"></i>
              <span class="text-black">Category</span>
              <!--<span class="badge badge-pill badge-primary">Beta</span>-->
            </a>
          </li>
          <li class="<?php echo ($name == 'editsubcategory' || $name == 'subcategoryedit' || $name == 'addsubcategory')?'text-black bg-success':''; ?>">
            <a href="editsubcategory.php">
              <i class="fa fa-folder"></i>
              <span class="text-black">Sub-Category</span>
            </a>
          </li>
          <li class="<?php echo ($name == 'editproduct' || $name == 'productedit' || $name == 'addproduct')?'text-black bg-success':''; ?>">
            <a href="editproduct.php">
            <i class="fa fa-product-hunt"></i>
              <span class="text-black">Sub Category 2</span>
            </a>
          </li>
          <li class="<?php echo ($name == 'editsubproduct' || $name == 'subproductedit' || $name == 'addsubproduct')?'text-black bg-success':''; ?>">
            <a href="editsubproduct.php">
              <i class="fa fa-product-hunt"></i>
              <span class="text-black">Product</span>
            </a>
          </li>
          <li class="<?php echo ($name == 'editbrand' || $name == 'brandedit' || $name == 'addbrand')?'text-black bg-success':''; ?>">
            <a href="editbrand.php">
              <i class="fa fa-folder"></i>
              <span class="text-black">Brands</span>
            </a>
          </li>
          <li class="<?php echo ($name == 'editabout')?'text-black bg-success':''; ?>">
            <a href="editabout.php">
              <i class="fa fa-folder"></i>
              <span class="text-black">Edit About Us</span>
            </a>
          </li>
          <li class="<?php echo ($name == 'editaddress')?'text-black bg-success':''; ?>">
            <a href="editaddress.php">
              <i class="fa fa-folder"></i>
              <span class="text-black">Edit Address</span>
            </a>
          </li>
                <!-- <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>orders</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul class='bg-white pr-4 list-unstyled'>
                            <li>
                                <a href="#">Pie chart</a>
                            </li>
                            <li>
                                <a href="#">Line chart</a>
                            </li>
                            <li>
                                <a href="#">Bar chart</a>
                            </li>
                            <li>
                                <a href="#">Histogram</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Users</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul class='bg-white pr-4 list-unstyled'>
                            <li>
                                <a href="#">Google maps</a>
                            </li>
                            <li>
                                <a href="#">Open street map</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <!-- <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope bg-white"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a> -->
        <a href="logout.php">
            <i class="fa fa-power-off"></i>
        </a>
    </div>
</nav>