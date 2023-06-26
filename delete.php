<?php

//delete a row from the table

if(isset($_GET['id'])){
    $id = $_GET['id'];


//database connection

$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

//create connection

$connection = new mysqli($servername, $username, $password, $database);




    $sql = "DELETE FROM clients WHERE id=$id";
    $result = $connection->query($sql);
    if(!$result){
        die("Invalid query: ") . $connection->error;
    }
    header("location: /myshop/index.php");
}




?>