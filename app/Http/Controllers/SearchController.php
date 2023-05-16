<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = DB::table('books')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('body', 'like', '%'.$query.'%')
                    ->get();

        return view('search', compact('results'));
    }
}
