<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharmacies List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="mb-4">Pharmacies List</h1>
    <a href="{{ route('pharmacies.create') }}" class="btn btn-primary mb-3">Add New Pharmacy</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pharmacies as $pharmacy)
        <tr>
          <td>{{ $pharmacy->id }}</td>
          <td>{{ $pharmacy->name }}</td>
          <td>{{ $pharmacy->address }}</td>
          <td>
            <a href="{{ route('pharmacies.edit', $pharmacy->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('pharmacies.destroy', $pharmacy->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>