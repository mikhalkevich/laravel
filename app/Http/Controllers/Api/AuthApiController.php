<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        //нужна валидация
        $password = Hash::make($request->password); // зашифровали пароль
        $request->merge(['password' => $password]);
        $user = User::create($request->all());
        if (!$user) {
            abort(401, 'Bad credentials');
        }
        $token = $user->createToken('Laravel Password Grant Client')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            abort(401, 'Bad credentials');
        }
        $token = $user->createToken('Laravel Password Grant Client')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }
    #[OA\Get(
        path: "/api/profile",
        summary: "Получить данные авторизованного пользователя или ошибку если пользователь не авторизован. Используем Bearer-token.",
        tags: ["Pages"],
        responses: [
            new OA\Response(response: 200, description: "Успешный возврат списка страниц")
        ]
    )]
    public function profile(Request $request)
    {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    public function logout(Request $request)
    {
        //Auth::user()->token()->delete();  //удаляются все токены
        Auth::user()->currentAccessToken()->delete(); //конкретный токен.
        return response()->json(['message' => 'Logged out']);
    }
}
