<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Comuna</title>
  </head>
  <body>
    <div class="container">
    <h1>Add Comuna</h1>
    <form method="POST" action="{{ route('comunas.store') }}">
        @call_user_func

  <div class="mb-3">
    <label for="id" class="form-label">code</label>
    <input type="text" class="form-control" id="id" aria-describedby="idlHelp" name="id" disable="disable">
    <div id="idlHelp" class="form-text">Comune code</div>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Commune</label>
    <input type="text" requiered class="form-control" id="id" aria-describedby="namehelp" name="name" placeholder="comuna name:">
  </div>
  <label for="municipality">Municipality:</label>
    <select class="form-select" id="municipality"> name="code" required>
    <option select disabled value="">Choose one...</option>
    @foreach ($municipios as $municipio)
    <option value="{{ $municipio->muni_codi }}">{{$municipio->muni_nomb}}</option>
    @endforeach
</select>
<div class="mt-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('comunas.index')}}" class="btn btn-warning">cancel</a>
</div>
</form>
</div>
  </body>
</html>