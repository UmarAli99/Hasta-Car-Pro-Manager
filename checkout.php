<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (!isset($_SESSION['login'])) {
    header("Location: index.php"); // Redirect to the login page if the user is not logged in
    exit;
}

if (isset($_POST['checkout'])) {
    // Get the user's email from the session
    $useremail = $_SESSION['login'];

    // Fetch the booked vehicle details
    $vhid = $_GET['vhid'];
    $sql = "SELECT * FROM tblvehicles WHERE id=:vhid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->execute();
    $vehicle = $query->fetch(PDO::FETCH_ASSOC);

    // Calculate the total cost (you may need to modify this based on your pricing logic)
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $pricePerDay = $vehicle['PricePerDay'];
    $totalCost = calculateTotalCost($fromdate, $todate, $pricePerDay);

    // Update the booking status to '1' (confirmed)
    $sql = "UPDATE tblbooking SET Status=1 WHERE userEmail=:useremail AND VehicleId=:vhid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->execute();

    // Additional logic for recording sales or updating your sales database can be added here

    echo "<script>alert('Checkout successful.');</script>";
}

function calculateTotalCost($fromdate, $todate, $pricePerDay)
{
    // Add your logic to calculate the total cost based on the number of days booked
    // You may also include additional charges if needed
    // For simplicity, this example assumes a fixed daily rate
    $fromTimestamp = strtotime($fromdate);
    $toTimestamp = strtotime($todate);
    $numberOfDays = ceil(($toTimestamp - $fromTimestamp) / (60 * 60 * 24));
    return $numberOfDays * $pricePerDay;
}
?>

<!-- Your HTML code for the checkout page goes here -->