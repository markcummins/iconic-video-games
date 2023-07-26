<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Top Games</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <style>
    .wrapper {
      margin: 1em auto;
      width: 95%;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <h1>Top Games</h1>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">title</th>
          <th scope="col">release_date</th>
          <th scope="col">platform</th>
          <th scope="col">developer</th>
          <th scope="col">genre</th>
          <th scope="col">content</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($games as $game)
        <tr>
          <td>{{ $game->id }}</td>
          <td>{{ $game->title }}</td>
          <td>{{ $game->release_date }}</td>
          <td>{{ $game->platform }}</td>
          <td>{{ $game->developer }}</td>
          <td>{{ $game->genre }}</td>
          <td>{{ $game->content }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
</body>

</html>