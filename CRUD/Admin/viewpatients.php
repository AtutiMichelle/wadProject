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

    <title>MediHub Admin</title>
</head>

<body>
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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            
            <div class="list-group list-group-flush my-3">
            <a href="../../users/admin.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</a>
                        <a href="viewdoctor.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>View Doctors</a>
                
                        <a href="viewpharmcomp.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>View Pharmaceutical Companies</a>
                <a href="viewpharmacies.php"class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>  View Pharmacies</a>
                <a href="viewsupervisor.php"class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>View Supervisors</a>
               
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
                    <h2 class="fs-1 m-2">Admin Dashboard</h2>
                    
                    
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
    
            <h2 class="fs-1 m-2">Patients</h2>
            <table class="table table-bordered table-striped">
  
  <thead>
    <tr>
      
    
     
      <th scope="col">Patient ID</th>
      <th scope="col">SSN</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
</thead>


  <?php
  $sql="SELECT * from patients";
  $result=mysqli_query($conn,$sql);


if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $patient_id = $row['patient_id'];
        $SSN = $row['SSN'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $dateOfBirth = $row['dateOfBirth'];
        $email = $row['email'];

        echo '<tr>
            <td>' . $patient_id . '</td>
            <td>' . $SSN . '</td>
            <td>' . $fname . '</td>
            <td>' . $lname . '</td>
            <td>' . $dateOfBirth . '</td>
            <td>' . $email . '</td>
            <td>
                <button class="btn btn-outline-danger">
                    <a href="delete.php?deletepatient_id=' . $patient_id . '" class="text-dark">Delete</a>
                </button>
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