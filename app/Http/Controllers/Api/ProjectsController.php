<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Bots\TelegramBot;
use App\Services\JwtService;
use App\Services\ProjectsListService;
use Illuminate\Support\Facades\Cookie;

class ProjectsController extends Controller
{
    public function list(ProjectsListService $service, JwtService $jwtService, TelegramBot $bot)
    {
        $jwt = Cookie::get('JWT');
        $login = 'Кто-то';

        if ($jwt) {
            $jwtService->setToken($jwt);
            $jwtLogin = $jwtService->getLogin();

            $login = $jwtLogin ?: $login;
        }
        $bot->sendMessage($login . ' зашел в алиасы');

        return response()->json(ProjectResource::collection($service->getProjects()));
    }
}
