<?php

namespace App\BackendCore;

use App\BackendCore\Dto\BackendCore;
use App\Models\Project;

interface BackendCoreInterface
{
    public function __construct(Project $project);

    public function getBackendCore(): BackendCore;
}
