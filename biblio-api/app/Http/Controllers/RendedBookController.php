<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRendedBookRequest;
use App\Http\Requests\UpdateRendedBookRequest;
use App\Models\RendedBook;
use Illuminate\Http\JsonResponse;

class RendedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(
            RendedBook::get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRendedBookRequest $request): JsonResponse
    {
        return new JsonResponse(
            RendedBook::create($request->all())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(RendedBook $rendedBook): JsonResponse
    {
        return new JsonResponse(
            $rendedBook
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRendedBookRequest $request, RendedBook $rendedBook): JsonResponse
    {
        $rendedBook->update($request->all());
        return new JsonResponse(
            $rendedBook
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RendedBook $rendedBook): JsonResponse
    {
        if ( $rendedBook->delete() ){
            return new JsonResponse([
                'msg' => 'Excluído com sucesso.'
            ]);
        }

        return new JsonResponse([
            'msg' => 'Houveram problemas'
        ]);
    }
}
