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
    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        <a href="/category/create">Agrega Categorias</a><br>
    </button>  

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">

            <div class="grid grid-cols-1 gap-4 mt-4 xl:mt-4 md:grid-cols-1 xl:grid-cols-1">

            @foreach ($categories as $category)
                <div class="group relative border border-gray-400" style="margin: 16px">
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h1 class="text-sm text-gray-700">
                                <a href="/category/{{ $category->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded" style="font-size: 1.2rem">{{ $category->nombre }}</a>
                            </h1>
                        </div>
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">{{ $category->descripcion }}</p>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </section>

    </div>
</body>
</html>