<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->nombre }}</title>
</head>
<body>
    <x-navbar/>
        <div style="background-color: #e9e0d1; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
        <h1 style="font-size: 1.5rem; border-bottom: 1px solid black;">Detalles de libro</h1>
        <br>
        <div style="display: flex;">
            <div style="align-self: flex-start; margin-right: 0px;">
                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 p-1" style="width: 50%; height: 50%;">
                    <img src="https://descargamislibros.com/images/portadaDeLibro.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
            </div>
            <ul style="font-size: 1.3rem;">
                <li>ID: {{ $book->id }}</li>
                <li>Nombre: {{ $book->titulo }}</li>
                <li>Autor: {{ $book->autor }}</li>
                <li>Precio: {{ $book->price }}</li>
                <li>Trama: {{ $book->trama }}</li>
            </ul>
        </div>
        @if(isset($archivo))
            <a href="/archivo/{{$archivo->id}}" class="text-xl font-bold text-purple-700 hover:text-white hover:bg-purple-700 py-2 px-4 rounded-md" style="color: #1c232e; text-decoration: underline;">Pdf de libro</a>

            @auth
                @can('isAdmin')
                    <form action="{{route('archivo.destroy',$archivo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">Eliminar archivo</button>
                    </form>
                @endcan
            @endauth
        @else
            No existe pdf de este libro.
            @auth
                @can('isAdmin')
                <br>
                <br>
                <a href="/archivo/create" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">Agrega PDF</a>
                <br>
                @endcan
            @endauth
        @endif   
        <br>
        @foreach($categories as $category)

            <h3>Categoria:  <a href="/bookCategory/{{ $category->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 rounded">{{ $category->nombre }}</a></h3>

        @endforeach
        <br>
        <br>
        <div>
        @auth
            @can('isAdmin')
                <a href="/book/{{ $book->id }}/edit" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">Editar</a>
      
                <a href="/bookCategory/create" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">Categoria</a>
            <br>
            <br>
            <p>
                <form action="/book/{{$book->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">
                </form>
            </p>
            @endcan
        @endauth
    </div>
    </div>
    <div style="background-color: white; color: black; padding: 30px; border-radius: 4px; margin: 16px; border: 1px solid navy;">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h3 class="text-lg font-medium mb-2" style="border-bottom: 1px solid navy;">Comments</h3>
            <ul>
                @foreach($comments as $comment)
                <li class="border-b border-gray-300 py-2" style="margin-bottom: 10px;">
                    <div class="flex items-center mb-2">
                        <img src="https://picsum.photos/50/50" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <h4 class="text-gray-800 font-medium">Nombre: {{ $comment->nombre }}</h4>
                    </div>
                    <p class="text-gray-600">{{ $comment->text }}</p>
                </li>
                @endforeach
            </ul>
            <a href="/comment/create" class="bg-purple-500 hover:bg-purple-600 text-black font-semibold py-2 px-4 rounded-md">Agrega un comentario!</a>
        </div>
    </div>

</body>
</html>