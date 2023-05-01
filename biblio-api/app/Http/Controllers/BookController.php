<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new JsonResponse(
            Book::get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): JsonResponse
    {
        return new JsonResponse(
            Book::create($request->all())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): JsonResponse
    {
        return new JsonResponse(
            $book
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->all());
        return new JsonResponse(
            $book
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): JsonResponse
    {
        if ( $book->delete() ){
            return new JsonResponse([
                'msg' => 'Excluído com sucesso.'
            ]);
        }

        return new JsonResponse([
            'msg' => 'Houveram problemas'
        ]);
    }
}
