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
        <h1 style="font-size: 1.5rem;">Detalles de libros</h1>
        <div style="display: flex;">
        <div style="align-self: flex-start; margin-right: 0px;">
            <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 p-1" style="width: 50%; height: 50%;">
            <img src="https://descargamislibros.com/images/portadaDeLibro.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>
        </div>
        <ul>
            <li>ID: {{ $book->id }}</li>
            <li>Nombre: {{ $book->nombre }}</li>
            <li>Autor: {{ $book->autor }}</li>
            <li>Precio: {{ $book->price }}</li>
            <li>Trama: {{ $book->trama }}</li>
        </ul>
        </div>
        <br>
        @foreach($categories as $category)

            <h3>Categoria:  <a href="/bookCategory/{{ $category->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 rounded">{{ $category->nombre }}</a></h3>
            
        @endforeach
        <br>
        <ul>
            @foreach($comments as $comment)
            <li>
                Nombre: {{ $comment->nombre }}
            </li>
            <li>
                {{ $comment->text }}
            </li>
            <br>
            @endforeach
        </ul>

        <br>
        <div>
        <a href="/book/{{ $book->id }}/edit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Editar</a>
      
        <a href="/bookCategory/create" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Categoria</a>
        <br>
        <br>
        <p>
            <form action="/book/{{$book->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            </form>
        </p>
    </div>
    </div>
</body>
</html>