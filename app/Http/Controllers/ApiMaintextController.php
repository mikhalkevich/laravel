<?php

namespace App\Http\Controllers;

use App\Models\Maintext;
use OpenApi\Attributes as OA;


class ApiMaintextController extends Controller
{
    // Описываем конкретный метод GET /api/pages
    #[OA\Get(
        path: "/api/maintexts",
        summary: "Получить список всех страниц",
        tags: ["Pages"],
        responses: [
            new OA\Response(response: 200, description: "Успешный возврат списка страниц")
        ]
    )]
    public function index()
    {
        return response()->json(Maintext::all());
    }
}
