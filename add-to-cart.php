<?php
// Start the session
session_start();
$host = "localhost";
//this is the database user that the website will use
$dbuser = "storeuser";
//this is the password for the database user
$dbpassword = "password";
//this is the name of the database
$database = "websiteassignment";

$conn = new mysqli($host,$dbuser,$dbpassword,$database);

function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

$id = uniqidReal();

$productid = $_POST['productid'];
$quantity = $_POST['quantity'];
$user = $_SESSION['user'];
$userid = $user['userid'];

$sql = "INSERT INTO cart (cartid, userid, productid, quantity)
VALUES ('$id', '$userid', '$productid', '$quantity' )";
$result = mysqli_query($conn, $sql);

$conn->close();
?>
<meta http-equiv="refresh" content="0;URL=index.php" />