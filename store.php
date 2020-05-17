<?php
    // Start the session
    session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tabletop One Stop</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--your css should be last-->
        <link href="styles.css" rel="stylesheet">

        <!--load jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!--load bootstrap.js-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

        <!--finally your own javascript-->
        <script src="myjavascript.js"></script>
        
        <?php 
            include("dbconnection.php");
            include("product-details.php");
        ?>
    </head>
    <body>
        <header class="container-fluid bg-dark text-white">
            <nav>
                <div class="row">
                    <div class="col-md-2">
                        <a href="index.php"><img src="images/logo.png" class="logo" alt="Logo"></a>
                    </div>
                    <div class="col-md-6 offset-md-1">
                        <ul class="navigation">
                            <li><a href="community.php">Community</a></li>
                            <li class="current-page"><a href="store.php">Store</a></li>
                            <li><a href="account.php">Account</a></li>
                            <li><a href="games.php">Games</a></li>
                        </ul>
                    </div>
                    <div class="col-md-1">
                        <a href="checkout.php"><img src="images/cart.png" class="cart" alt="shopping_cart"></a>
                    </div>
                    <div class="col-md-1 login">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <img src="images/account-img.png" class="account-img" alt ="account-img">
                        </button>
                        <?php if ($_SESSION["user"] == 'guest'){
                            echo '
                            <ul class="dropdown-menu bg-dark text-white dropdown-menu-right">
                                <li class="dropdown-item">
                                    <form action="login.php" method="post">
                                        <label for="username">Username:</label>
                                        <input type="text" id="username" name="username"><br>
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password"><br>
                                        <input type="submit">
                                    </form>
                                </li>
                                <li class="dropdown-item"><a href="password_retrieval">Forgot password?</a><a href="account_creation">Create account</a></li>
                            </ul>';
                        } else{
                            echo '
                            <ul class="dropdown-menu bg-dark text-white dropdown-menu-right">
                                <li class="dropdown-item">
                                    <a href="profile.html">Profile</a>
                                </li>
                                <li class="dropdown-item">
                                    Log out
                                </li>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </nav>
                </header>

        
            <main class="container-fluid row" id="storemain">
                <div class="col-md-12" id="store-nav">
                    <div class="col-md-4 offset-md-4" id="searchbar">
                        <form>
                            <input type="search" placeholder="Search" name="search-bar">
                        </form>
                    </div>
                </div>
                <div class="col-md-2" id="filters">
                    Sort by:
                    <form action="" method="post">
                        <input type="radio" name="sortby" value="popular-desc" checked="checked">Most Popular<br>
                        <input type="radio" name="sortby" value="popular-asc">Least Popular<br>
                        <input type="radio" name="sortby" value="price-asc">Price (Ascending)<br>
                        <input type="radio" name="sortby" value="price-desc">Price (descending)<br>
                        <input type="radio" name="sortby" value="alpha-asc">A-Z<br>
                        <input type="radio" name="sortby" value="alpha-desc">Z-A<br>
                        <input type="radio" name="sortby" value="date-asc">Newest<br>
                        <input type="radio" name="sortby" value="date-desc">Oldest<br>
                        <input type="submit">
                    </form>
                </div>
                <div class="col-md-9" id="storefront">
                    <?php
                        $host = "localhost";
                        //this is the database user that the website will use
                        $dbuser = "storeuser";
                        //this is the password for the database user
                        $dbpassword = "password";
                        //this is the name of the database
                        $database = "websiteassignment";

                        $conn = new mysqli($host,$dbuser,$dbpassword,$database);

                        $sortby = $_POST['sortby'];

                        $order= array();

                        if ($sortby == 'popular-asc'){
                            $order = ["views", "asc"];
                        } else if ($sortby == 'popular-desc'){
                            $order = ["views", "desc"];
                        } else if ($sortby == 'price-asc'){
                            $order = ["price", "asc"];
                        } else if ($sortby == 'price-desc'){
                            $order = ["price", "desc"];
                        } else if ($sortby == 'alpha-asc'){
                            $order = ["name", "asc"];
                        } else if ($sortby == 'alpha-desc'){
                            $order = ["name", "desc"];
                        } else if ($sortby == 'date-asc'){
                            $order = ["datecreated", "asc"];
                        } else if ($sortby == 'date-desc'){
                             $order = ["datecreated", "desc"];   
                        };
                        $conn->close();
                        
                        $products = get_product_details($order[0], $order[1], "20", '');
                        foreach($products as $ap)
                        {
                            $name = $ap['name'];
                            $id = $ap['productid'];
                            $description = $ap['description'];
                            $price = $ap['price'];
                            $img = "images/" .$ap['image']."";
                            
                            echo
                            "<div class = 'store-item'>
                                <img src=$img>
                                <h3>$name</h3>
                                <p>$description</p>
                                <p>\$$price</>
                                <form action='add-to-cart.php' method='post'>
                                    <input type='hidden' value='$id' name='productid'>
                                    <input type='number' value='1' name='quantity'>
                                    <input type='submit'>
                                </form>
                            </div>";
                        }
                    
                    ?>
                </div>
                
            </main>
<!-- footer -->
        <footer class="bg-dark text-white">
            
        </footer>
    </body>

</html>