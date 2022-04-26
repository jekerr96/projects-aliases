<?php

namespace App\Http\Controllers;

use App\Services\ProjectsListService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(ProjectsListService $service)
    {
        dd($service->getProjects());
    }
}
