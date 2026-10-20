<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use OpenApi\Attributes as OA;

class CatalogApiController extends Controller
{
    #[OA\Get(
        path: "/api/catalog",
        summary: "Получить каталог всех страниц",
        tags: ["Pages"],
        responses: [
            new OA\Response(response: 200, description: "Успешный возврат каталога")
        ]
    )]
    public function index()
    {
        $catalogs = Catalog::all();
        return CatalogResource::collection($catalogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $catalog = Catalog::create($request->all());
        return new CatalogResource($catalog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        return new CatalogResource($catalog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {
        $catalog->update($request->all());
        return new CatalogResource($catalog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();
        return ['message'=>'deleted'];
    }
}
