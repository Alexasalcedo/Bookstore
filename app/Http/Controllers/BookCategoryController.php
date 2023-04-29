<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Book;
use App\Models\Category;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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
    public function show(BookCategory $bookCategory)
    {
        return view('categorybook.detailsCategoryBook',compact('bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $bookCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCategory $bookCategory): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory): RedirectResponse
    {
        $bookCategory->delete();
        return redirect('/book');
    }
}
