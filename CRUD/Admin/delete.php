<?php
require_once("../../db_connection.php");

if(isset($_GET['deletepatient_id'])){
    $patient_id = $_GET['deletepatient_id'];

    $sql = "DELETE FROM patients WHERE patient_id = $patient_id";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        // Deleted successfully
        header('location: viewpatients.php');
    } else {
        die(mysqli_error($conn));
    }
} elseif(isset($_GET['deletedoctor_id'])){
    $doctor_id = $_GET['deletedoctor_id'];

    $sql = "DELETE FROM doctor WHERE doctor_id = $doctor_id";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        // Deleted successfully
        header('location: viewdoctor.php');
    } else {
        die(mysqli_error($conn));
    }
} elseif(isset($_GET['deleteid'])){
    $pharmcomp_id = $_GET['deleteid'];

    $sql = "DELETE FROM pharmaceuticals WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        // Deleted successfully
        header('location: viewpharmcomp.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
