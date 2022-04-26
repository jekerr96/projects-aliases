<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectsListService;

class ProjectsController extends Controller
{
    public function list(ProjectsListService $service)
    {
        return response()->json(ProjectResource::collection($service->getProjects()));
    }
}
