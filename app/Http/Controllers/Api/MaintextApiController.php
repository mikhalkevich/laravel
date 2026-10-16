<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintext;
use OpenApi\Attributes as OA;

class MaintextApiController extends Controller
{
    // Описываем конкретный метод GET /api/pages
    #[OA\Get(
        path: "/api/maintext",
        summary: "Получить список всех страниц",
        tags: ["Pages"],
        responses: [
            new OA\Response(response: 200, description: "Успешный возврат списка страниц")
        ]
    )]
    public function index()
    {
        $maintext = Maintext::all();
        return response()->json($maintext);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    #[OA\Post(
        path: "/api/maintext",
        summary: "Создать страницу",
        tags: ["Pages"],
        responses: [
            new OA\Response(response: 200, description: "Успешный возврат списка страниц")
        ]
    )]
    public function store(Request $request)
    {
       $maintext = Maintext::create($request->all());
        return response()->json($maintext);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $maintext = Maintext::find($id);
        return response()->json($maintext);
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
    public function update(Request $request, string $id)
    {
      $maintext = Maintext::find($id);
      $maintext->update($request->all());
      return response()->json($maintext);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
