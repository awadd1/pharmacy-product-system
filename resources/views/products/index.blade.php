<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="mb-4">Products List</h1>

    @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <form method="GET" action="{{ route('products.index') }}" class="mb-3">
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search for products..."
          value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->title }}</td>
          <td>{{ $product->description }}</td>
          <td><img src="{{ $product->image }}" alt="{{ $product->title }}" width="100"></td>
          <td>${{ $product->price }}</td>
          <td>{{ $product->quantity }}</td>
          <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>