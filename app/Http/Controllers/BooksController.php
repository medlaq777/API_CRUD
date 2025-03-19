<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::paginate(5);
        return response()->json($books);
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'cover_image' => 'required',
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

    public function show($id)
    {
        return Books::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $book = Books::find($id);
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'cover_image' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'available' => 'required',
        ]);

        $book->update($validate);
        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    public function destroy($id)
    {
        $books = Books::find($id);
        $books->delete();
        return response()->json([
            'message' => 'Book deleted successfully',
            'data' => $books
        ]);
    }
}