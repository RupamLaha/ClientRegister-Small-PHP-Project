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

?>

<br>
<form name = "delete" action = "all_clients.php" method = "post">
  Type the id to delete: <input type = "number" name = "delete-id"><input type="submit" value="Delete" name = "delete_button">
</form>
<form name = "delete_all" action = "all_clients.php" method = "post">
  <input type="submit" value="Delete All" name = "delete_all_button">
</form>

<!-- Delete id codes... -->

<?php
if(isset($_POST['delete_button'])){

  $delete_id = $_POST['delete-id'];

  // echo $delete_id;

  $conn = mysqli_connect('localhost','root','root','client_test');

  $d_query = "DELETE FROM `clients` WHERE id = $delete_id";

  $run = mysqli_query($conn,$d_query);

  if($conn == TRUE && $run == TRUE){
    echo "Connection Successful and Successfully Deleted.<br>";
  }
  else{
    echo "Error: " . mysqli_error() ."<br>";
  }

  echo "<a href='all_clients.php'><u><b>View all the existing clients list</u></b></a>";
}
?>

<!-- Delete all codes... -->

<?php
if(isset($_POST['delete_all_button'])){

  // echo $delete_id;

  $conn = mysqli_connect('localhost','root','root','client_test');

  $d_query = "DELETE FROM `clients`";

  $run = mysqli_query($conn,$d_query);

  if($conn == TRUE && $run == TRUE){
    echo "Connection Successful and Successfully Deleted.<br>";
  }
  else{
    echo "Error: " . mysqli_error() ."<br>";
  }

  echo "<a href='all_clients.php'><u><b>View all the existing clients list</u></b></a>";
}
?>


<?php

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
        <tr><img src= <?php echo "Images/" . $result['image']?> width="100" height="100"></tr>
        <tr><td> Id </td> <td> <?php echo $result['id']; ?> </td></tr>
        <tr><td> Name </td> <td> <?php echo $result['name']; ?> </td></tr>
        <tr><td> Email </td> <td> <?php echo $result['email']; ?> </td></tr>
        <tr><td> Ph. No. </td> <td> <?php echo $result['ph_no']; ?> </td></tr>
        <tr><td> Photo name </td> <td> <?php echo $result['image']; ?> </td></tr>
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
