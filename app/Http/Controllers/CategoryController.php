<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Category;

class CategoryController extends Controller
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
        return view('categories.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:35',
            'descripcion' => 'required|max:250'
        ]);

        $category = new Category();
        $category -> nombre = $request->nombre;
        $category -> descripcion = $request->descripcion;
        $category -> save();
        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.detailsCategory',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|max:35',
            'descripcion' => 'required|max:250'
        ]);
        
        $category->nombre = $request->nombre;
        $category->descripcion = $request->descripcion;
        $category->update();
        return redirect()-> route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect('/book');
    }
}
