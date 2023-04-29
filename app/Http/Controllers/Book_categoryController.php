<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Book;
use App\Models\Category;
use App\Models\Book_category;

class Book_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('categorybook.deleteCategoryBook',compact('books','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('categorybook.createCategoryBook',compact('books','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $book = Book::find($request->book_id);
        $category = Category::find($request->category_id);
        $book->categories()->attach($category);
        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book_category $book_category)
    {
        $books = Book::all();
        $categories = Category::all();
        return view('categorybook.deleteCategoryBook',compact('books','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $book = Book::find($request->book_id);
        $category = Category::find($request->category_id);
        $book->categories()->detach($category);
        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
