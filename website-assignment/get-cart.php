<?php
function get_cart_details($userid)
{
    $host = "localhost";
    //this is the database user that the website will use
    $dbuser = "storeuser";
    //this is the password for the database user
    $dbpassword = "password";
    //this is the name of the database
    $database = "websiteassignment";

    $conn = new mysqli($host,$dbuser,$dbpassword,$database);
    
    $ret = array();
    $sql = "SELECT * FROM cart WHERE userid = 'userid.'";
    $res = mysqli_query($conn, $sql);
        

    while($ar = mysqli_fetch_assoc($res))
    {
        $productid = $ar['productid'];
        $sql = "SELECT * FROM products WHERE productid = 'productid.'";
        $res2 = mysqli_query($conn, $sql);
        
        while($ar2 = mysqli_fetch_assoc($res2)){
            $ret = $ar2;
        }
    }
    return $ret;
    $conn->close();
}

?>