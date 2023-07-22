<?php
require_once("../../db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../CSS/admin.css" />
    <link rel="stylesheet" href="../../CSS/home.css">

    <title>MediHub Doctor</title>
</head>

<body>
<section class="header">
<a href="../../home.php" class="logo">MediHub.</a>
<a href="../../home.php">home</a>
    <a href="../../about.php">about</a>
    <a href="../../services.php">services</a>
   
    <a href="../../contact.php">Contact</a>
    
    </nav>
    <a href="../../login/logout.php" class="btn">logout</a>
   
    </section>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            
            <div class="list-group list-group-flush my-3">
            <a href="../../users/doctor.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Doctor Dashboard</a>
                        
                <a href="displayPatients.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>View Patients</a>
                        <a href="viewprescription.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>View Prescriptions</a>
               
               
               
                <a href="../users/admin.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-1 me-3" id="menu-toggle"></i>
                    <h2 class="fs-1 m-2">Doctor Dashboard</h2>
                    
                    
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>      
                                <?php echo  $_SESSION['fname'];?>   <?php echo  $_SESSION['lname'];?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                
                                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
    
            <h2 class="fs-1 m-2">Prescription</h2>
            <table class="table table-bordered table-striped">
  
  <thead>
    <tr>
    <th scope="col">Prescription ID</th>
      <th scope="col">Patient ID</th>
      <th scope="col">Drug Name</th>
      <th scope="col">Prescription Description</th>
      <th scope="col">Expiration date</th>
      <th scope="col">frequency</th>
      <th scope="col">duration</th>
      
      
     
    </tr>
  </thead>
  <tbody>

  <?php
  $sql="SELECT * from prescription";
  $result=mysqli_query($conn,$sql);

  if($result){ 
    while(
    $row=mysqli_fetch_assoc($result)){
        $prescription_id = $row["prescription_id"];
        $patient_id = $row["patient_id"];
        $name = $row["name"];
        $prescription_description = $row["prescription_description"];
        $expiration_date = $row["expiration_date"];
        $frequency = $row["frequency"];
        $duration = $row["duration"];

        echo'<tr>
        <th scope="row">'.$prescription_id.'</th>
        <td>'.$patient_id.'</td>
        <td>'.$name.'</td>
        <td>'. $prescription_description.'</td>
        <td>'.$expiration_date.'</td>
        <td>'. $frequency.'</td>
        <td>'.$duration.'</td>
        
        
        <td>
        <button class="btn btn-outline-info"><a href="delete.php?deleteprescription_id='.$prescription_id.'" class="text-dark">Delete</a></button>
        
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