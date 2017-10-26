<?php
//Include database file
include './includes/db.php';
//Create new object of database
$db = new db;
// Check if title is set, if true then fetch all the products from product table
if (isset($_GET['title'])){
    $getRows = json_encode($db->getRows("SELECT * FROM products"));
    print_r($getRows);
}
//Check if the id is set,
if (isset($_GET['id'])){
    print_r($_GET['id']);
}

?>