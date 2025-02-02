<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brand List</title>
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
        .btn-group {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3 class="text-center">All Brands</h3>
           
                <div class="text-end mb-3">
                    <a href="{{ route('brand.create') }}" class="btn btn-primary">Create Brand</a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @if($brands->isEmpty())
                           <tr>
                               <td colspan="3" class="text-center">No data available</td>
                           </tr>
                       @else
                           @foreach ($brands as $brand)
                               <tr>
                                   <td>{{ $brand->id }}</td>
                                   <td>{{ $brand->name }}</td>
                                   <td>
                                       <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                       <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                       </form>
                                   </td>
                               </tr>
                           @endforeach
                       @endif
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
