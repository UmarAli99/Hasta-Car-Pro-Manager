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

        <title>Hasta Car Pro | Generate Sales Report</title>

        <!-- Font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Sandstone Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <!-- Admin Style -->
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php include('includes/header.php'); ?>
        <div class="ts-main-content">
            <?php include('includes/leftbar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="page-title">Generate Sales Report</h2>
                            <!-- Your content for generating sales report goes here -->
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
                                <button type="submit" class="btn btn-primary" name="generate_report">Generate
                                    Report</button>
                            </form>
                            <!-- End of example form -->
                            <?php
                            if (isset($_POST['generate_report'])) {
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];

                                try {
                                    $sql = "SELECT * FROM tblsales WHERE booking_date BETWEEN :start_date AND :end_date";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':start_date', $start_date, PDO::PARAM_STR);
                                    $query->bindParam(':end_date', $end_date, PDO::PARAM_STR);
                                    $query->execute();
                                    $salesData = $query->fetchAll(PDO::FETCH_ASSOC);

                                    if ($salesData) {
                                        echo "<h3>Sales Report for $start_date to $end_date</h3>";
                                        echo "<pre>";
                                        print_r($salesData);
                                        echo "</pre>";
                                    } else {
                                        echo "<p>No sales found for the specified date range.</p>";
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
    </body>

    </html>

<?php } ?>