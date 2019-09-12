@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Package List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>

	@if (session('success'))
      <div class="alert alert-success background-success">
            <strong>{{ session('success')}}</strong>
       </div>
    @endif


    @if (session('error'))
      <div class="alert alert-success background-success">
            <strong>{{ session('error')}}</strong>
       </div>
    @endif

    

<div class="container">
  <h2>Package Create</h2>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Package Name</th>
      <th scope="col">Package Desc</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($values['packages'] as $key => $value)
        
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $value['package_name'] }}</td>
            <td>{{ $value['package_description'] }}</td>
            <td>
              <a class="btn btn-success" href="http://demo.miyn.net/api/package/{{$value['id']}}">Show</a>
              <a class="btn btn-primary" href="http://127.0.0.1:8000/package/edit/{{$value['id']}}">Edit</a>
              <a class="btn btn-danger" href="http://demo.miyn.net/api/package/{{$value['slug']}}">Delete</a>
            </td>
          </tr>
    @endforeach

  </tbody>
</table>

</div>

</body>
</html>

@endsection

