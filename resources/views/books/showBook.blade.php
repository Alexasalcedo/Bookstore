<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    </style>
</head>
<body>
   
    <x-navbar/>
    <div style="background-color: lightgray; color: black; padding: 30px; border-radius: 4px; margin: 16px;">
    @auth
        @can('isAdmin')
        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e;">
            <a href="/book/create" style="color: #9e9c71;">Agrega libros</a><br>
        </button>
        <br>
        @endcan
    @endauth

    <br>
    <form action="{{ route('books.search') }}" method="GET" class="flex items-center">
        <input type="text" name="q" placeholder="Search books..." class="rounded-full py-2 px-4 border border-gray-300 shadow-sm">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 ml-2 rounded shadow-md"  style="background-color: #5e8271;">Search</button>
    </form>
    <br>
    
    <section class="bg-white dark:bg-gray-900" style="overflow-x: auto; white-space: nowrap;">
        <div class="container px-6 py-10 mx-auto" style="padding: 20px;">
            <div class="flex flex-nowrap overflow-x-auto" style="scrollbar-width: thin;">
                @foreach ($books as $b)
                <div class="group relative border border-gray-400 mx-4" style="margin: 30px; background-color: #d1c5a5;">
                    <div class="min-h-96 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-96 p-2" style="display: flex; justify-content: center;">
                        <img src="https://descargamislibros.com/images/portadaDeLibro.jpg" alt="Front of men's Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full max-w-64" style="display: block; margin: 0 auto; width: 158px; height: 188px;">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div style="max-width: 200px; word-wrap: break-word;">
                            <h2 class="text-sm text-gray-700">
                                <a href="/book/{{ $b->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded" style="font-size: 1rem">{{ $b->nombre }}</a>
                                @foreach ($b->categories as $c)
                                    <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">{{ $c->nombre }}</p>
                                @endforeach
                            </h2>
                        </div>
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">{{ $b->autor }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(session('book')== 'guardado')
       <script>
        Swal.fire(
            'Nuevo libro!',
            'Se a agregado un nuevo libro!',
            'success'
        )
       </script>

    @endif
    
    </div>
</body>
</html>