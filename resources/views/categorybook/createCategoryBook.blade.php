<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria-Libro</title>
</head>
<body>
    <x-navbar/>
    <div style="background-color: lightgray; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
      <h1><b>Agrega una categoria a un libro</b></h1>
      <br>
      <form action="/bookCategory" method="POST">
        @csrf
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
        <input type="text" id="search" placeholder="Buscar categoría..."><br>
        <select name="category_id" id="category_id">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->nombre }}</option>
          @endforeach
        </select>

        <script>
          document.getElementById('search').addEventListener('input', function() {
            var input, filter, options, i, text;
            input = document.getElementById('search');
            filter = input.value.toUpperCase();
            options = document.getElementById('category_id').getElementsByTagName('option');

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
        <input type="submit" value="Enviar" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">

        <hr>
      </form>
    </div>
</body>
</html>