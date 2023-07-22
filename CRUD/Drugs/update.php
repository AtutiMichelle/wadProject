<?php
require_once ("../../db_connection.php");
$id = $_GET['updateid'];
$sql = "SELECT * FROM drugs WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$type = $row['type'];
$price = $row['price'];
$quantity = $row['quantity'];
$exp_date = $row['exp_date'];
$man_date = $row['man_date'];
$company = $row['company'];

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $exp_date = $_POST["exp_date"];
    $man_date = $_POST["man_date"];
    $company = $_POST["company"];

    $sql = "UPDATE drugs SET name='$name', type='$type', price='$price', quantity='$quantity',
            exp_date='$exp_date', man_date='$man_date', company='$company' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/home.css">
</head>
<body>
    <section class="header">
        <a href="home.php" class="logo">MediHub.</a>
        <nav class="navbar">
            <a href="../../home.php">home</a>
            <a href="../../about.php">about</a>
            <a href="../../services.php">services</a>
            <a href="../../contact.php">Contact</a>
        </nav>
        <a href="../../login/logout.php" class="btn">logout</a>
    </section>
    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label>Drug Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name"
                    value="<?php echo $name; ?>">

                <label>Drug Type</label>
                <input type="text" class="form-control" placeholder="Enter type" name="type"
                    value="<?php echo $type; ?>">

                <label>Drug Price</label>
                <input type="number" class="form-control" placeholder="Enter price" name="price"
                    value="<?php echo $price; ?>">

                <label>Drug Quantity</label>
                <input type="number" class="form-control" placeholder="Enter quantity" name="quantity"
                    value="<?php echo $quantity; ?>">

                <label>Drug Expiration Date</label>
                <input type="date" class="form-control" placeholder="Enter Expiration Date" name="exp_date"
                    value="<?php echo $exp_date; ?>">

                <label>Drug Manufacturing Date</label>
                <input type="date" class="form-control" placeholder="Enter Manufacturing Date" name="man_date"
                    value="<?php echo $man_date; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
