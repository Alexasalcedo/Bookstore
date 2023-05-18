<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo</title>
</head>
<body>
    <x-navbar/>
    <div style="background-color: lightgray; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
      <h1 class="text-lg font-medium mb-2" style="border-bottom: 3px solid #8c873e;"><b>Agrega PDF a un libro</b></h1>
      <br>
      <form action="/archivo" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label> Selecciona archivo </label>
            <input type="file" name="archivo" id="archivo">
        </div>
        <br>
        <input type="text" id="search" placeholder="Buscar libro..."><br>
        <select name="book_id" id="book_id">
          @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->nombre }}</option>
          @endforeach
        </select>

        <script>
          document.getElementById('search').addEventListener('input', function() {
            var input, filter, options, i, text;
            input = document.getElementById('search');
            filter = input.value.toUpperCase();
            options = document.getElementById('book_id').getElementsByTagName('option');

            for (i = 0; i < options.length; i++) {
              text = options[i].textContent || options[i].innerText;
              if (text.toUpperCase().indexOf(filter) > -1) {
                options[i].style.display = "";
              } else {
                options[i].style.display = "none";
              }
            }
          });
        </script>
        <br>
        <br>
        <div class="col-md-4">
            <button type="submit" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">
            <i class="mdi mdi-content-save-all"></i>
            Guardar
            </button>
        </div>

      </form>
    </div>
</body>
</html>