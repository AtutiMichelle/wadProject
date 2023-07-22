<?php
require_once("../../db_connection.php");

// Retrieve drug names from the inventory table
$drugQuery = "SELECT name FROM inventory";
$drugResult = mysqli_query($conn, $drugQuery);

if (isset($_GET["prescribepatient_id"])) {
    $patient_id = $_GET["prescribepatient_id"];
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $prescription_description = $_POST["prescription_description"];
    $expiration_date = $_POST["expiration_date"];
    $frequency = $_POST["frequency"];
    $duration = $_POST["duration"];

    $insertPrescriptionQuery = "INSERT INTO prescription (patient_id, name, prescription_description, expiration_date, frequency, duration) 
                                VALUES ('$patient_id', '$name', '$prescription_description', '$expiration_date', '$frequency', '$duration')";

    if (mysqli_query($conn, $insertPrescriptionQuery)) {
        header("Location:viewprescription.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediHub</title>
     <!--swiper css link-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <!--font awesome css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../CSS/home.css">
    <link rel="stylesheet" href="../../CSS/register.css">
</head>
<body>
<!--header section-->
<section class="header1">
<a href="../../home.php" class="logo">MediHub.</a>
<nav class="navbar">
    <a href="../home.php">home</a>
    <a href="../about.php">about</a>
    <a href="../services.php">services</a>
    <a href="../contact.php">Contact</a>
</nav>
<div id="menu-btn" class="fas fa-bars "></div>
</section>
<div class="background" style="background=url(../images/silde3.jpg)"></div>
<div class="container">
    <div class="content">
        <h2 class="logo"><i class="fa fa-heartbeat" aria-hidden="true"></i>MediHub</h2>
        <div class="text-sci">
            <h2>Welcome  <br>Assign Prescription Here <span></span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, ad. Minima ipsam ad neque dolorem.</p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i>></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></i></a>
            </div>
        </div>
    </div>
    <div class="logreg-box">
        <div class="form-box login">
            <form action="#" method="POST">
                <h2>Prescription</h2>
                <div class="input-box">
                    <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <select name="name" id="name">
                        <?php while ($row = mysqli_fetch_assoc($drugResult)) { ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                    <label for="name">Drug Name:</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="prescription_description" id="prescription_description">
                    <label for="prescription_description">Prescription Description:</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="date" name="expiration_date" id="expiration_date">
                    <label for="expiration_date">Expiration Date:</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-medical-prescription"></i></span>
                    <input type="text" id="frequency" name="frequency" required>
                    <label for="frequency">Frequency:</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-clock"></i></span>
                    <input type="text" name="duration" id="duration">
                    <label for="duration">Duration:</label>
                </div>
                <div class="input-box">
                    <button type="submit" name="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
