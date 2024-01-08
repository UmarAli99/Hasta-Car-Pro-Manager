<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your custom styles can be added here */
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-light .navbar-brand,
        .navbar-light .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-light .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .container {
            margin-top: 20px;
        }

        h1 {
            color: #007bff;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Hasta Car Pro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>

    <!-- Sale Content -->
    <div class="container mt-5">
        <h1>Welcome to Our Sale Page!</h1>
        <p>Discover amazing deals and special offers on our products/services.</p>

        <!-- Example Product Sale Section -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="product1.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Description of Product 1. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.</p>
                        <p class="card-text">Price: $19.99 <span class="text-muted">($29.99)</span></p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- Add more product cards as needed -->
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>