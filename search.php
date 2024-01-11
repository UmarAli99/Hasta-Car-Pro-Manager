<?php
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Hasta Car Pro</title>
  <!--Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"
    data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->

    <!-- Search Result -->
    <section class="listing-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <?php
                    if (isset($_POST['brand'])) {
                        // Retrieve search parameter
                        $brandId = $_POST['brand'];

                        // Query to fetch search results
                        $sql = "SELECT tblvehicles.*, tblbrands.BrandName FROM tblvehicles
                                JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand
                                WHERE tblvehicles.VehiclesBrand = :brand";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':brand', $brandId, PDO::PARAM_INT);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                ?>
                                <div class="product-listing-m gray-bg">
                                    <div class="product-listing-img">
                                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"
                                            class="img-responsive" alt="Image" />
                                    </div>
                                    <div class="product-listing-content">
                                        <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                                                <?php echo htmlentities($result->BrandName); ?> ,
                                                <?php echo htmlentities($result->VehiclesTitle); ?>
                                            </a></h5>
                                        <p class="list-price">$
                                            <?php echo htmlentities($result->PricePerDay); ?> Per Day
                                        </p>
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->SeatingCapacity); ?> seats
                                            </li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->ModelYear); ?> model
                                            </li>
                                            <li><i class="fa fa-car" aria-hidden="true"></i>
                                                <?php echo htmlentities($result->FuelType); ?>
                                            </li>
                                        </ul>
                                        <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">View
                                            Details <span class="angle_arrow"><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="product-listing-m gray-bg">
                                <p>No listings found for the selected brand.</p>
                            </div>
                        <?php }
                    } else {
                        // If brand parameter is not set, redirect to the search page
                        header("Location: search.php");
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
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