<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Category_Book;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eager Loading
        $books = Book::with('categories')->get();
        return view('books.showBook',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('isAdmin')) {
            return view('books.createBook');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:55',
            'autor' => 'required|max:50',
            'price' => 'numeric|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'trama' => 'required|max:255'
        ]);

        $book = new Book();
        $book -> nombre = $request->nombre;
        $book -> autor = $request->autor;
        $book->price = $request->price;
        $book->trama = $request->trama;
        $book -> save();
        return redirect()->route('book.index')->with('book','guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $comments = $book->comments;
        $categories = $book->categories;
        $archivo = $book->archivo;
        $book->titulo = $book->nombre;
        
        return view('books.detailsBook',compact('book','comments','categories','archivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        if (Gate::allows('isAdmin')) {
            return view('books.editBook',compact('book'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'autor' => 'required|max:50',
            'price' => 'numeric|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'trama' => 'required|max:255'
        ]);
        
        $book->nombre = $request->nombre;
        $book->autor = $request->autor;
        $book->price = $request->price;
        $book->trama = $request->trama;
        $book->update();
        return redirect()-> route('book.show',$book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect('/book');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $books = Book::where('nombre', 'like', '%'.$query.'%')->orWhere('autor', 'like', '%'.$query.'%')->get();
        return view('books.search', ['books' => $books, 'query' => $query]);
    }

}
