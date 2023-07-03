<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::latest()->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book): BookResource
    {
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book): JsonResponse
    {
        if ($book->delete()) {
            return response()->json([
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
