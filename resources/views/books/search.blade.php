
    <h1>Search results for "{{ $query }}"</h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->nombre }} by {{ $book->autor }}</li>
        @endforeach
    </ul>
