
<?php



$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";



// Create connection
$connection = new mysqli($servername, $username, $password, $database);



// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}






$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {

if (empty($name) || empty($email) || empty($phone) || empty($address)){
    $errorMessage = "All fields are required";
    break;
}



//add new client to the table
$sql = "INSERT INTO clients (name, email, phone, address) 
VALUES ('$name', '$email', '$phone', '$address')";
$result = $connection->query($sql);



if (!$result){
    $errorMessage = "Invalid query: " . $connection->error;
    break;
}




$name = "";
$email = "";
$phone = "";
$address = "";


   $successMessage = "New client added successfully";


   header("location: /myshop/index.php");
   exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container my-5">

<h2>New Client</h2>

<?php 

if (!empty($errorMessage)){

     echo " 
     
      
      
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong> $errorMessage </strong>
      <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-lable='Close'> </button>
      
      </div>
      
      
     
     ";



}

?>



<form action="" method="post">






<div class="row mb-3">

<label class="col-sm-3 col-form-lable">Name</label>

<div class="col-sm-6">

<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">


</div>



</div>


<div class="row mb-3">

<label class="col-sm-3 col-form-lable">Email</label>

<div class="col-sm-6">

<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">


</div>



</div>


<div class="row mb-3">

<label class="col-sm-3 col-form-lable">Phone</label>

<div class="col-sm-6">

<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">


</div>



</div>


<div class="row mb-3">

<label class="col-sm-3 col-form-lable">Address</label>

<div class="col-sm-6">

<input type="text" class="form-control" name="address" value="<?php echo $address; ?>">

</div>


</div>

<?php


if (!empty($successMessage)){

     echo " 
     
      <div class='row mb-3'> 
        <div class='offset-sm-3 col-sm-6'>
      
           <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong> $successMessage </strong>
              <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-lable>
      
            </div>
         </div>
      
      </div>
     
     ";

}
?>



<div class="row mb-3">

<div class="offset-sm-3 col-sm-3 d-grid">

<button type="submit" class="btn btn-primary">Submit</button>

</div>

<div class="col-sm-3 d-grid">

<a class="btn btn-outline-primary" href="/myshop/index.php" role = "button">Cancel</a>


</div>



</div>

</form>



</div>



</body>
</html>