<?php

require_once("../../db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/home.css">

</head>
<body >

    
<section class="header">
<a href="../../home.php" class="logo">MediHub.</a>
<nav class="navbar">
    <a href="../../home.php">home</a>
    <a href="../../about.php">about</a>
    <a href="../../services.php">services</a>
   
    <a href="../../contact.php">Contact</a>
    

</nav>

<a href="../../login/logout.php" class="btn">logout</a>
</section>
     
        <div class="container">
    <button class="btn btn-primary my-5"><a href="../../users/pharmcomp.php"
    class="text-light"> Add Drugs</a></button>

    <table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Drug ID</th>
      <th scope="col">Drug Name</th>
      <th scope="col">Drug Type</th>
      <th scope="col">Drug Price</th>
      <th scope="col">Drug Quantity</th>
      <th scope="col">Drug Expiration Date</th>
      <th scope="col">Drug Manufacturing  Date</th>
      <th scope="col">Drug Company</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql="SELECT * from drugs";
  $result=mysqli_query($conn,$sql);

  if($result){ 
    while(
    $row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $type=$row['type'];
        $price=$row['price'];
        $quantity=$row['quantity'];
        $exp_date=$row['exp_date'];
        $man_date=$row['man_date'];
        $company=$row['company'];

        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$type.'</td>
        <td>'.$price.'</td>
        <td>'.$quantity.'</td>
        <td>'.$exp_date.'</td>
        <td>'.$man_date.'</td>
        <td>'.$company.'</td>
        
        <td>
        <button class="btn btn-outline-info"><a href="update.php?updateid='.$id.'" class="text-dark">Update</a></button>
        <button class="btn btn-outline-danger"><a href="delete.php?deleteid='.$id.'" class="text-dark">Delete</a></button>
    </td>
      </tr>';
         
    }
    
  }
  
  
  ?>


    
  </tbody>
</table>
</div>
</body>
</html>