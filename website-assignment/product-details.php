<?php

function get_product_details($order, $direction, $limit, $search)
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
    $sql = "SELECT * FROM products  WHERE name LIKE '%".$search."%' ORDER BY ".$order." ".$direction." LIMIT ".$limit."";
    $res = mysqli_query($conn, $sql);
        

    while($ar = mysqli_fetch_assoc($res))
    {
        $ret[] = $ar;
    }
    return $ret;
    $conn->close();
}

?>