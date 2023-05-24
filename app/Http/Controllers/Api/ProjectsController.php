<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Bots\TelegramBot;
use App\Services\JwtService;
use App\Services\ProjectsListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectsController extends Controller
{
    public function list(ProjectsListService $service, JwtService $jwtService, TelegramBot $bot): \Illuminate\Http\JsonResponse
    {
        $login = 'Кто-то';
        $jwtLogin = $jwtService->getLogin();
        $login = $jwtLogin ?: $login;

        $bot->sendMessage($login . ' зашел в алиасы');

        return response()->json(ProjectResource::collection($service->getProjects()));
    }

    public function pick(Request $request, JwtService $jwtService, TelegramBot $bot)
    {
        $project = $request->post('project');
        $login = 'Кто-то';
        $jwtLogin = $jwtService->getLogin();
        $login = $jwtLogin ?: $login;

        Cache::increment('project' . $project);

        $bot->sendMessage($login . ' перешел в ' . $project);

        return response()->json([
            'success' => true,
        ]);
    }
}
