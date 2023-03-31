<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-navbar/>
    <div style="background-color: lightgray; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
    <h1>Edit Book</h1>
    <form action="/book/{{$book->id}}" method="POST">
      @csrf
      @method('PATCH')
      <label for="nombre">Nombre:</label><br>
      <input type="text" name="nombre" value='{{ old("nombre") ?? $book->nombre }}'>
      @error('nombre')
        <h5>{{ $message }}</h5>
      @enderror
      <br>

      <label for="autor">Autor:</label><br>
      <input type="text" name="autor" value='{{ old("autor") ?? $book->autor }}'>
      @error('autor')
        <h5>{{ $message }}</h5>
      @enderror
      <br>
      <br>
      <input type="submit" value="Editar" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">

      <hr>
    </form>
    </div>
</body>
</html>