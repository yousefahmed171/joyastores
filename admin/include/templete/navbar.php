<div id="mySidenav" class="sidenav apc">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="material-icons">highlight_off</i></a>
            <a class="active" href="index.php"> <i class="material-icons">home</i>&nbsp;&nbsp;&nbsp;Dashboard</a>
            <a href="category.php">         <i class="material-icons">add_box</i>&nbsp;&nbsp;&nbsp;Add Category</a>
            <a href="add-product.php">          <i class="material-icons">library_add</i>&nbsp;&nbsp;&nbsp;Add Product</a>
            <a href="users.php">                <i class="material-icons">people</i>&nbsp;&nbsp;&nbsp;Users</a>
            <a href="orders.php">               <i class="material-icons">shopping_cart</i>&nbsp;&nbsp;&nbsp;Orders</a>
            <a href="offers.php">               <i class="material-icons">local_offer</i>&nbsp;&nbsp;&nbsp;Offers</a>
        <a href="sale.php">                 <i class="material-icons">money_off</i>&nbsp;&nbsp;&nbsp;Sale</a>
            <a href="edit-home.php">            <i class="material-icons">laptop</i>&nbsp;&nbsp;&nbsp;Edit Home page</a>
            <a href="settings.php">             <i class="material-icons">settings</i>&nbsp;&nbsp;&nbsp;Settings</a>
        </div> 
<nav class="navbar navbar-default nav-dash navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <span class="navbar-text" style="font-size:20px;cursor:pointer" onclick="openNav()"><i class="fa fa-navicon"></i> &nbsp;J-Store Admin Panel</span>
                </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../index.php">View Shop</a></li>
                                <li><a href="logout.php">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
   
       