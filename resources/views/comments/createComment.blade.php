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
      <h1>Add Comment</h1>
      <form action="/comment" method="POST">
        @csrf
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
          <h5>{{ $message }}</h5>
        @enderror
        <br>

        <label for="text">Text:</label><br>
        <input type="text" name="text" value="{{ old('text') }}">
        @error('text')
          <h5>{{ $message }}</h5>
        @enderror

        <br>

        <select name="book_id" id="book_id">
          @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->nombre }}
          @endforeach
        </select>
        <br>

        <input type="submit" value="Enviar" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">

        <hr>
      </form>
    </div>
</body>
</html>