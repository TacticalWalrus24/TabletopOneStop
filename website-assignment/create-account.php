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

$pwd = $_POST['password'];
$user = $_POST['username'];
$email = $_POST['email'];

$hash = password_hash($pwd, PASSWORD_DEFAULT);

$date = date("Y-m-d");

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

$userid = uniqidReal();

$sql = "INSERT INTO users (userid, username, email, pswrd, datejoined)
VALUES('$userid', '$user', '$email', '$hash', '$date')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
    $_SESSION["user"] = $user;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<meta http-equiv="refresh" content="0;URL=index.php" />