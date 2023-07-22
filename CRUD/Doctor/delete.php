<?php
require_once("../../db_connection.php");

if(isset($_GET['deleteprescription_id'])){
    $prescription_id=$_GET['deleteprescription_id'];

    $sql="DELETE from prescription WHERE prescription_id=$prescription_id";
    $result=mysqli_query($conn,$sql);
    if($result){
       //echo"Deleted successfully" ;
       header('location:viewprescription.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>