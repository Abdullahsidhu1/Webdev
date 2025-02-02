<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Brand</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .card {
            transition: 0.3s;
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .form-container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
            <h4 class="text-center">Admin Panel</h4>
            <hr>
            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            <a href="#">Orders</a>
            <a href="{{ route('brand.index') }}">Brand</a>
            <a href="{{ route('product.index') }}">Products</a>
            <a href="#">Categories</a>
            <a href="#">Customers</a>
            <a href="#">Settings</a>
            <a href="#" class="text-danger">Logout</a>
        </nav>
        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-5">
                <h3 class="text-center">Edit Brand</h3>
                <div class="form-container mx-auto">
                    <form action="{{ route('brand.update', $brand->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $brand->name) }}" required>
                        </div>
            
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
