<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->nombre }}</title>
    <style>
    /* Estilos para la barra de desplazamiento */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background-color: #F1F1F1;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    /* Estilos para la lista horizontal */
    .horizontal-list-container {
        overflow-x: scroll;
        white-space: nowrap;
        scrollbar-width: thin;
        display: flex;
        justify-content: center;
    }

    .horizontal-list {
        list-style-type: none;
        display: flex;
        flex-wrap: nowrap;
        gap: 20px;
    }

    .horizontal-list li {
        text-align: center;
    }

    .book-image {
        display: block;
        margin: 0 auto;
        width: 158px;
        height: 188px;
    }
</style>
</head>
<body>
    <x-navbar/>
    <div style="background-color: lightgray; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
        <h1 class="text-lg font-medium mb-2" style="border-bottom: 3px solid #8c873e;">Detalles de la Categoria</h1>
        <ul>
            <li >
                <b>-Nombre:</b> <br> <h3> {{ $category->nombre }}</h3>
            </li>
            <li >
                <b>-Autor:</b> <br> {{ $category->descripcion }}
            </li>
            <li >
                <b>-Fecha:</b> <br> {{ $category->created_at }}
            </li>
            <li>
                <b>Libros de esta categoria:</b>
                <br>
                <div class="horizontal-list-container">
                    <ul class="horizontal-list">
                        @foreach($category->books as $book)
                            <li>
                                <img src="https://descargamislibros.com/images/portadaDeLibro.jpg" alt="Front of men's Basic Tee in black." class="book-image">
                                <p>{{ $book->nombre }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
        <br>

        @auth
            @can('isAdmin')

            <a href="/category/{{ $category->id }}/edit" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">Editar</a>
            <br>
            <br>
            <p>
                <form action="/category/{{$category->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e; color: #9e9c71;">
                </form>
            </p>

            @endcan
        @endauth
    </div>
</body>
</html>