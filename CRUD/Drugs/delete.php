<?php
require_once("../../db_connection.php");

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE from drugs WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
       //echo"Deleted successfully" ;
       header('location:display.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>