<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pharmacy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="mb-4">Edit Pharmacy</h1>

    <form action="{{ route('pharmacies.update', $pharmacy->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group mb-3">
        <label for="name">Pharmacy Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $pharmacy->name }}" required>
      </div>
      <div class="form-group mb-3">
        <label for="address">Pharmacy Address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ $pharmacy->address }}" required>
      </div>
      <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
  </div>
</body>

</html>