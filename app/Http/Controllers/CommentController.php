<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('book')->get();
        return view('comments.indexComment',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        return view('comments.createComment',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:15',
            'text' => 'required|max:255'
        ]);

        $comment = new Comment();
        $comment -> nombre = $request->nombre;
        $comment -> text = $request->text;

        $book = Book::find($request->book_id);
        $book -> comments()->save($comment);
        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.detailsComment',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.editComment',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:15',
            'text' => 'required|max:255'
        ]);
        
        $comment->nombre = $request->nombre;
        $comment->text = $request->text;
        $comment->update();
        return redirect()-> route('book.show',$comment->book_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect('/book');
    }
}
