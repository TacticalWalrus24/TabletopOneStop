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
$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username = '".$username."' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    if (password_verify($pwd, $row["pswrd"])){
    echo "welcome";
    $_SESSION["user"] = $row;
    } else{
    echo "incorrect password";
    }
}

$conn->close();
?>
<meta http-equiv="refresh" content="0;URL=index.php" />