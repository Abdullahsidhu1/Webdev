<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple E-Commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .product-card {
            transition: 0.3s;
            border-radius: 10px;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .product-card {
            transition: 0.3s;
            border-radius: 10px;
            overflow: hidden;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-dark text-white text-center py-5">
        <h1>Welcome to E-Shop</h1>
        <p class="lead">Find the best products at unbeatable prices</p>
    </header>

    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card product-card shadow-sm">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">Price: {{ number_format($product->price, 2) }}</p>

                        <p class="card-text"><strong>Brand:</strong> {{ $product->brand->name }}</p>
    
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer class="text-center py-3 bg-light mt-5">
        <p class="mb-0">&copy; 2024 E-Shop. All rights reserved.</p>
        <p class="mb-0">Email: <a href="mailto:eshop@example.com">Abjutt222@gmail.com</a></p>
        <p class="mb-0">Phone: <a href="tel:+1234567890">+92 332 7529494</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
