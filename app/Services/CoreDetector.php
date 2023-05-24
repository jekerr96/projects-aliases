<?php

namespace App\Services;

use App\BackendCore\BackendCoreInterface;
use App\BackendCore\BitrixBackendCore;
use App\BackendCore\Dto\BackendCore;
use App\BackendCore\LaravelBackendCore;
use App\BackendCore\UnknownBackendCore;
use App\Models\Project;

class CoreDetector
{
    public function detectBackendCore(Project $project): BackendCore
    {
        $detects = [
            [$this, 'detectBitrix'],
            [$this, 'detectLaravel'],
        ];

        foreach ($detects as $detect) {
            /** @var BackendCoreInterface|null $core */
            $core = $detect($project);

            if ($core) {
                return $core->getBackendCore();
            }
        }

        return (new UnknownBackendCore($project))->getBackendCore();
    }

    protected function getRootDir(): string
    {
        return env('PROJECTS_DIR') . DIRECTORY_SEPARATOR;
    }

    public function detectBitrix(Project $project): ?BitrixBackendCore
    {
        $dir = implode(DIRECTORY_SEPARATOR, [$project->getDirectory(), 'www', 'bitrix']);
        $bxPath = $this->getRootDir() . $dir;

        if (!file_exists($bxPath)) {
            return null;
        }

        return new BitrixBackendCore($project);
    }

    public function detectLaravel(Project $project): ?LaravelBackendCore
    {
        $dir = implode(DIRECTORY_SEPARATOR, [$project->getDirectory(), 'app']);
        $path = $this->getRootDir() . $dir;

        if (!file_exists($path)) {
            return null;
        }

        return new LaravelBackendCore($project);
    }
}
