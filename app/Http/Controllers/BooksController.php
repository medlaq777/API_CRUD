<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Gestion des Articles",
 *     description="Documentation de l'API pour la gestion des articles",
 *     @OA\Contact(
 *         email="support@example.com"
 *     )
 * )
 * @OA\Server(
 *     url="http://127.0.0.1:8000/",
 *     description="Serveur local"
 * )
 */
class BooksController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/books",
     *     tags={"Books"},
     *     summary="Get paginated list of books",
     *     @OA\Response(
     *         response=200,
     *         description="List of books",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Books"))
     *     )
     * )
     */
    public function index()
    {
        $books = Books::paginate(5);
        return response()->json($books);
    }

    /**
     * @OA\Post(
     *     path="/api/books",
     *     tags={"Books"},
     *     summary="Create a new book",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Books")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Book created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Books")
     *     )
     * )
     */
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
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/books/{id}",
     *     tags={"Books"},
     *     summary="Get a single book by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book details",
     *         @OA\JsonContent(ref="#/components/schemas/Books")
     *     )
     * )
     */
    public function show($id)
    {
        return Books::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/books/{id}",
     *     tags={"Books"},
     *     summary="Update a book",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Books")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Books")
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $book = Books::findOrFail($id);
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

    /**
     * @OA\Delete(
     *     path="/api/books/{id}",
     *     tags={"Books"},
     *     summary="Delete a book",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book deleted successfully"
     *     )
     * )
     */
    public function destroy($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return response()->json([
            'message' => 'Book deleted successfully',
            'data' => $book
        ]);
    }
}
