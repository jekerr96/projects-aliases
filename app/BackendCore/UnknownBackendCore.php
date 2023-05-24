<?php

namespace App\BackendCore;

use App\BackendCore\Dto\BackendCore;
use App\Models\Project;

class UnknownBackendCore extends AbstractCore implements BackendCoreInterface
{
    public function __construct(protected Project $project)
    {
    }

    public function getBackendCore(): BackendCore
    {
        return BackendCore::make();
    }
}
