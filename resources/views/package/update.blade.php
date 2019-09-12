<!DOCTYPE html>
<html lang="en">
<head>
  <title>Package Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Package Update</h2>

  @if (session('success'))
      <div class="alert alert-success background-success">
            <strong>{{ session('success')}}</strong>
       </div>
    @endif
   @if (session('error'))
      <div class="alert alert-danger background-success">
            <strong>{{ session('error')}}</strong>
       </div>
    @endif

  <!-- <form action="http://demo.miyn.net/api/update-package/{{$values['package']['id']}}" method="post"> -->
  <form action="http://127.0.0.1:8000/package/update/{{$values['package']['id']}}" method="post">
    @csrf
    <div class="form-group">
      <label for="email">Package Name:</label>
      <input type="text" class="form-control" value="{{$values['package']['package_name']}}" id="pacakge" placeholder="Enter pacakge" name="package_name">
      <input type="hidden" class="form-control" value="{{$values['package']['id']}}" id="pacakge" placeholder="Enter pacakge" name="id">
    </div>
    <div class="form-group">
      <label for="pwd">Package Description:</label>
      <input type="text" class="form-control" value="{{$values['package']['package_description']}}" id="package_description" placeholder="Enter Package Description" name="package_description">
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>
