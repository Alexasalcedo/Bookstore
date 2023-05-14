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
      <h1>Create Category</h1>
      <form action="/archivo" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label> Selecciona archivo </label>
            <input type="file" name="archivo" id="archivo">
        </div>
        
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
            <i class="mdi mdi-content-save-all"></i>
            Guardar
            </button>
        </div>
        
        <select name="book_id" id="book_id">
          @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->nombre }}
          @endforeach
        </select>

      </form>
    </div>
</body>
</html>