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
        <h1>Detalles de Categoria</h1>
        <ul>
            <li>
                ID: {{ $bookCategory->id }}
            </li>
            <li>
                Libro: {{ $bookCategory->book_id }}
            </li>
            <li>
                Categoria: {{ $bookCategory->category_id }}
            </li>
        </ul>
        <br>

        <br>
        <br>
        <p>
            <form action="/bookCategory/{{$bookCategory->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            </form>
        </p>
    </div>
</body>
</html>