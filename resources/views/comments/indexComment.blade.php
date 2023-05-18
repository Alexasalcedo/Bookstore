<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <x-navbar/>
    
    <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center lg:mx-0">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><b>Comentarios de nuestros usuarios</b></h1>
            <p class="mt-2 text-lg leading-8 text-gray-600">Leea la opinión de nuestros usuarios sobre los libros.</p>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 sm:gap-y-12 sm:gap-x-12 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($comments as $comment)
            <article class="flex flex-col items-center justify-between border-2 border-8c873e rounded-lg p-6" style="border-image: url('tu-imagen.png') 10 10 round;">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500">{{ $comment->created_at }}</time>
                        <a href="/category" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Categorías</a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            @if(isset($comment->book))
                                <a href="/book/{{ $comment->book->id }} ">
                                <span class="absolute inset-0"></span>
                                    Libro: {{ $comment->book->nombre }}
                                </a>
                            @else
                                <span class="absolute inset-0"></span>
                                El libro fue borrado
                            @endif
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $comment->text }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    {{ $comment->nombre }}
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>



</body>
</html>