<?php
$con = mysqli_connect('localhost','root','root','client_test');

$query = "SELECT * FROM `clients`";

$run = mysqli_query($con,$query);

if($con){
  echo "Connection Successful<br>";
}
else{
  echo "Error: " . mysqli_connect_error() ."<br>";
}

if($run == TRUE){
  while($result = mysqli_fetch_assoc($run)){
    // echo "<br>".$result['id']."<br>";
    // echo $result['name']."<br>";
    // echo $result['email']."<br>";
    // echo $result['ph_no']."<br><br>";
    // echo "<pre>";
    // echo var_dump($result);

    ?>

    <br><br>
    <div>
      <table style="width:400px" float = "right" border="">
        <tr><td> Id </td> <td> <?php echo $result['id']; ?> </td></tr>
        <tr><td> Name </td> <td> <?php echo $result['name']; ?> </td></tr>
        <tr><td> Email </td> <td> <?php echo $result['email']; ?> </td></tr>
        <tr><td> Ph. No. </td> <td> <?php echo $result['ph_no']; ?> </td></tr>
      </table>
    </div>

    <?php
}
}
else{
  echo "Query Failed<br>";
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
  <div>
    <br><br>
    <a href="index.php"><u><b>Add new client</u></b></a>
  </div>
  </body>
</html>
