<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1>{{ $product->title }}</h1>
    <p>{{ $product->description }}</p>
    <img src="{{ $product->image }}" alt="{{ $product->title }}" width="200" class="mb-3">
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>

    <h2>Available in Pharmacies:</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Pharmacy Name</th>
          <th>Address</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($product->pharmacies as $pharmacy)
        <tr>
          <td>{{ $pharmacy->name }}</td>
          <td>{{ $pharmacy->address }}</td>
          <td>${{ $pharmacy->pivot->price }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products List</a>
  </div>
</body>

</html>