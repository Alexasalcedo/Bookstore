<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Models\Book;

class ArchivoController extends Controller
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
        return view('archivos.createArchivo',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos');

            //crea un registro en la tabla de archivos
            $archivos = new Archivo();
            $archivos->hash = $ruta;
            $archivos->nombre = $request->archivo->getClientOriginalName();
            $archivos->extension = $request->archivo->guessExtension();
            $archivos->mime = $request->archivo->getMimeType();

            $book = Book::find($request->book_id);
            $book -> archivo()->save($archivos);
            $archivos->save();
        }
        return redirect()->route('archivo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Archivo $archivo)
    {
        $contents = Storage::get($archivo->hash);

        // Create a response with the file contents and appropriate headers
        $response = response($contents, 200)
                        ->header('Content-Type', $archivo->mime)
                        ->header('Content-Disposition', 'attachment; filename=' . $archivo->nombre);

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archivo $archivo): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        Storage::delete($archivo->hash);
        $archivo->delete();

        return redirect()->route('book.index');
    }
}
