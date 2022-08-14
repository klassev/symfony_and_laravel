<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestAuthController extends Controller
{
    public function testAuth(Request $request): JsonResponse
    {
        return  response()->json([
            'UserName' => 'admin',
            'Password' => '12345'
        ]);
    }
}
