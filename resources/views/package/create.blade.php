@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Package Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

<div class="container">
  <h2>Package Create</h2>
  <form action="http://demo.miyn.net/api/package" method="post">
    <div class="form-group">
      <label for="email">Package Name:</label>
      <input type="text" class="form-control" id="package" placeholder="Enter pacakge" name="package_name">
    </div>
    <div class="form-group">
      <label for="pwd">Package Description:</label>
      <input type="text" class="form-control" id="package_description" placeholder="Enter Package Description" name="package_description">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

@endsection

