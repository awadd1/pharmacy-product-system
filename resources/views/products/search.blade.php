<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Products</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="mb-4">Search Results</h1>

    <form action="{{ route('products.search') }}" method="GET" class="mb-3">
      <input type="text" name="query" value="{{ old('query', $query) }}" class="form-control"
        placeholder="Search products..." />
      <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    @if($products->count() > 0)
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td><a href="{{ route('products.show', $product->id) }}">{{ $product->title }}</a></td>
          <td>{{ $product->description }}</td>
          <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" width="100"></td>
          <td>${{ $product->price }}</td>
          <td>{{ $product->quantity }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No products found matching your search criteria.</p>
    @endif
  </div>
</body>

</html>