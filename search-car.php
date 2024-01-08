<?php
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Hasta Car Pro | Car Search Result</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Font Awesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->

    <!-- Search Form -->
    <section class="search-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="search.php">
                        <div class="form-group"> <br>
                            <label for="brand">Select Brand:</label>
                            <!-- Assuming you have a table 'tblbrands' with 'id' and 'BrandName' columns -->
                            <select class="form-control" name="brand" id="brand">
                                <?php
                                $brandQuery = $dbh->prepare("SELECT * FROM tblbrands");
                                $brandQuery->execute();
                                $brands = $brandQuery->fetchAll(PDO::FETCH_OBJ);

                                foreach ($brands as $brand) {
                                    echo "<option value='{$brand->id}'>{$brand->BrandName}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Search Form -->

    <!-- Search Result -->
    <section class="listing-page">
        <!-- The existing code for displaying search results goes here -->
    </section>
    <!-- /Search Result -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- /Footer -->

    <!-- Back to top -->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    <!-- /Back to top -->

    <!-- Login-Form -->
    <?php include('includes/login.php'); ?>
    <!-- /Login-Form -->

    <!-- Register-Form -->
    <?php include('includes/registration.php'); ?>

    <!-- /Register-Form -->

    <!-- Forgot-password-Form -->
    <?php include('includes/forgotpassword.php'); ?>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>