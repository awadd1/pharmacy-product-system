<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharmacy Details</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1>Pharmacy Details</h1>

    <div class="card mt-4">
      <div class="card-body">
        <h2>{{ $pharmacy->name }}</h2>
        <p><strong>Address:</strong> {{ $pharmacy->address }}</p>
      </div>
    </div>

    <h3 class="mt-5">Products Available in This Pharmacy</h3>
    @if($pharmacy->products->count() > 0)
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pharmacy->products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->title }}</td>
          <td>{{ $product->description }}</td>
          <td>${{ $product->pivot->price }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No products available in this pharmacy.</p>
    @endif

    <a href="{{ route('pharmacies.index') }}" class="btn btn-secondary mt-3">Back to Pharmacies List</a>
  </div>
</body>

</html>