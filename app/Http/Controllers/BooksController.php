<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::paginate(5);
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isb' => 'required',
            'cover' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'available' => 'required',
        ]);

        $books = Books::create($validate);
        return response()->json([
            'message' => 'Book created successfully',
            'data' => $books
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        $books = Books::find($books);
        return response()->json($books);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isb' => 'required',
            'cover' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'available' => 'required',
        ]);

        $books = Books::find($books);
        $books->update($validate);
        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $books
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        $books = Books::find($books);
        $books->delete();
        return response()->json([
            'message' => 'Book deleted successfully',
            'data' => $books
        ]);
    }
}
