<?php

namespace App\Http\Controllers;

use App\Services\JwtService;

class IndexController extends Controller
{
    public function index(JwtService $jwtService)
    {
        return view('index', [
            'login' => $jwtService->getLogin(),
        ]);
    }
}
