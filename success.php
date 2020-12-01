<?php

$name = $_POST['name'] ;
$email = $_POST['email'];
$ph = $_POST['ph'];
$image_name = $_FILES['img']['name'];
$temp_name = $_FILES['img']['tmp_name'];

$con = mysqli_connect('localhost','root','root','client_test');

move_uploaded_file($temp_name,"Images/$image_name");

$query = "INSERT INTO `clients`(`name`, `email`, `ph_no`, `image`) VALUES ('$name','$email','$ph','$image_name')";

$run = mysqli_query($con,$query);

if($con){
  echo "Connection Successful<br>";
}
else{
  echo "Error: " . mysqli_connect_error() ."<br>";
}

if($run == TRUE){
  echo "Submission Successful<br>";
}
else{
  echo "Submission Failed<br>";
  echo (mysqli_error($con)). "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
  </head>

  <body>
    <br><br>
    <a href="index.php"><u><b>Add new client</b></u></a>
    <div>
      <a href="all_clients.php"><u><b>View all the existing clients list</u></b></a>
    </div>
  </body>
</html>
