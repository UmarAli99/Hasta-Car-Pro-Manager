<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#3e454c">

        <title>Hasta Car Pro | Generate Booking Report</title>

        <!-- Font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Sandstone Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <!-- Admin Style -->
        <link rel="stylesheet" href="css/style.css">
        <!-- jsPDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <div class="ts-main-content">
            <?php include('includes/leftbar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title">Generate Booking Report</h2>
                            <!-- Example: Form for selecting date range -->
                            <form method="post">
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" name="generate_report" style="font-size: 18px;">Generate Report</button>
                            </form>
                            <!-- End of example form -->
                            <?php
                            if (isset($_POST['generate_report'])) {
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];

                                try {
                                    $sql = "SELECT * FROM tblbooking WHERE FromDate BETWEEN :start_date AND :end_date";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
                                    $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
                                    $query->execute();
                                    $bookingData = $query->fetchAll(PDO::FETCH_ASSOC);

                                    if ($bookingData) {
                                        echo "<h3>Booking Report for $start_date to $end_date</h3>";
                                        echo '<div class="table-responsive" id="contentToConvert">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Booking ID</th>
                                                            <th>User Email</th>
                                                            <th>Vehicle ID</th>
                                                            <th>From Date</th>
                                                            <th>To Date</th>
                                                            <th>Message</th>
                                                            <th>Status</th>
                                                            <th>Booking Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                        foreach ($bookingData as $booking) {
                                            echo '<tr>
                                                    <td>' . $booking['id'] . '</td>
                                                    <td>' . $booking['userEmail'] . '</td>
                                                    <td>' . $booking['VehicleId'] . '</td>
                                                    <td>' . $booking['FromDate'] . '</td>
                                                    <td>' . $booking['ToDate'] . '</td>
                                                    <td>' . $booking['message'] . '</td>
                                                    <td>' . ($booking['Status'] == 0 ? 'Pending' : 'Approved') . '</td>
                                                    <td>' . $booking['PostingDate'] . '</td>
                                                </tr>';
                                        }

                                        echo '</tbody></table></div>';
                                        // Display Save as PDF and Print buttons
                                        echo '<div class="mt-3">
                                                <button type="button" class="btn btn-success btn-sm" id="saveAsPDF" style="font-size: 18px">Save as PDF</button>
                                                <button type="button" class="btn btn-info btn-sm" id="printReport" style="font-size: 18px">Print</button>
                                              </div>';
                                    } else {
                                        echo "<p>No bookings found for the specified date range.</p>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- JavaScript for Save as PDF and Print buttons -->
        <script>
            // Save as PDF
            document.getElementById("saveAsPDF").addEventListener("click", function () {
                var pdf = new jsPDF();
                pdf.fromHTML($('#contentToConvert').get(0), 15, 15, {
                    width: 170
                });
                pdf.save("booking_report.pdf");
            });

            // Print function
            document.getElementById("printReport").addEventListener("click", function () {
                window.print();
            });
        </script>
    </body>

    </html>

<?php } ?>