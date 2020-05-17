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
                            <li><a href="store.php">Store</a></li>
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
                        <?php if ($_SESSION["user"] = 'guest'){
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

        
            <main>
                <div class="container-fluid">
                    <form action="create-account.php" method="post">
                        <label for="username">Email:</label>
                        <input type="text" id="email" name="email"><br>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br>
                        <label for="password">Password:</label>
                        <input type="text" id="password" name="password"><br>
                        <input type="submit">
                    </form>
                </div>
                
            </main>
<!-- footer -->
        <footer class="bg-dark text-white">
            
        </footer>
    </body>

</html>