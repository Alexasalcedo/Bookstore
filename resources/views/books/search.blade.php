
<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <style>
       .feed {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feed h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feed ul {
            list-style-type: none;
            padding: 0;
        }

        .feed li {
            font-size: 18px;
            margin-bottom: 10px;
            padding-left: 20px;
            background-image: url('icono-libro.png');
            background-repeat: no-repeat;
            background-position: left center;
        }
    </style>
</head>
<body>
    <x-navbar/>
    <div class="feed">
        <h1>Search results for "{{ $query }}"</h1>
        <ul>
            @foreach ($books as $book)
                <li><a href="/book/{{ $book->id }} ">&middot;{{ $book->nombre }} by {{ $book->autor }}</a></li>
            @endforeach
        </ul>
    </div>


</body>
</html>
