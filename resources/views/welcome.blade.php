<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <x-navbar/>
    
    <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
    <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
        <img class="mx-auto h-12" src="{{ asset('images/libro.png') }}" alt="">
        <figure class="mt-10">
        <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
            <p>“En este espacio encontrarás una amplia variedad de libros de distintos géneros y autores, desde clásicos de la literatura hasta novedades literarias. Nuestra pasión por los libros nos ha llevado a crear esta plataforma para compartir con todos nuestros visitantes la magia de la lectura.
                Esperamos que disfrutes navegando por nuestra selección de libros y que encuentres ese título que estás buscando o que te sorprendas descubriendo nuevos títulos que llamen tu atención. En nuestra página, queremos fomentar la lectura como una actividad enriquecedora y transformadora, y por eso nos esforzamos en ofrecer una experiencia de compra cómoda y accesible para todos.
                Te invitamos a explorar nuestras secciones y descubrir todo lo que tenemos para ofrecer. ”</p>
        </blockquote>
        <figcaption class="mt-10">
            <img class="mx-auto h-10 w-10 rounded-full" src="{{ asset('images/af.png') }}" alt="">
            <div class="mt-4 flex items-center justify-center space-x-3 text-base">
            <div class="font-semibold text-gray-900">¡Gracias por visitarnos!</div>
            <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                <circle cx="1" cy="1" r="1" />
            </svg>
            <div class="text-gray-600">Bookstore</div>
            </div>
        </figcaption>
        </figure>
    </div>
    </section>

</body>
</html>