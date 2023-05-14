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
        <a href="/book/create">Agrega libros</a><br>
    </button>  

    <section class="bg-white dark:bg-gray-900" style="overflow-x: auto;white-space: nowrap;">
        <div class="container px-6 py-10 mx-auto" style="padding: 20px;">
            <div class="flex flex-nowrap overflow-x-auto" >

                @foreach ($books as $b)
                    <div class="group relative border border-gray-400 mx-4" style="margin: 30px;">
                        <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 p-2" style="display: flex; justify-content: center;">
                            <img src="https://descargamislibros.com/images/portadaDeLibro.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full max-w-64" style="display: block; margin: 0 auto; width: 158px; height: 188px;">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div style="max-width: 200px; word-wrap: break-word;">
                                <h2 class="text-sm text-gray-700">
                                    <a href="/book/{{ $b->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded" style="font-size: 1rem">{{ $b->nombre }}</a>
                                    @foreach ($b->categories as $c)
                                        <br>    
                                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">{{ $c->nombre }}</p>
                                        <br>
                                    @endforeach
                                </h2>
                            </div>
                            <br>
                            <br>
                            <p class="mt-2 text-gray-500 capitalize dark:text-gray-300 group-hover:text-gray-300">{{ $b->autor }}</p>
                            <br>
                            <br>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    </div>
</body>
</html>