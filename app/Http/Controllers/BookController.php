<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();
        return view('books.showBook',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.createBook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'autor' => 'required|max:50'
        ]);

        $book = new Book();
        $book -> nombre = $request->nombre;
        $book -> autor = $request->autor;
        $book -> save();
        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $comments = $book->comments;
        return view('books.detailsBook',compact('book','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.editBook',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'autor' => 'required|max:50'
        ]);
        
        $book->nombre = $request->nombre;
        $book->autor = $request->autor;
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
}
