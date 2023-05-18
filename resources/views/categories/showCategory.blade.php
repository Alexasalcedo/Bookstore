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

    @auth
        @can('isAdmin')
        <button class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded" style="background-color: #1c232e;">
            <a href="/category/create" style="color: #9e9c71;">Agrega Categorias</a><br>
        </button>
        <br>
        @endcan
    @endauth

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 xl:mt-4">
                @foreach ($categories as $category)
                <article class="flex max-w-xl flex-col items-start justify-between m-4 p-4" style="background-color: white; border: 1px solid navy; border-radius: 4px;">
                    <div class="flex items-center text-xs" style="padding: 10px;">
                        <time datetime="2020-03-16" class="text-gray-500">{{ $category->created_at }}</time>
                    </div>
                    <div class="group relative mt-4" style="padding: 20px;">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="/category/{{ $category->id }}">
                                <span class="absolute inset-0"></span>
                                {{ $category->nombre }}
                            </a>
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-gray-600">{{ $category->descripcion }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>


    </div>
</body>
</html>