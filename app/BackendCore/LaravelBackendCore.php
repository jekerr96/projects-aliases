<?php

namespace App\BackendCore;

use App\BackendCore\Dto\BackendCore;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LaravelBackendCore extends AbstractCore implements BackendCoreInterface
{
    public function __construct(protected Project $project)
    {
    }

    public function getBackendCore(): BackendCore
    {
        return BackendCore::make()
            ->setCore('Laravel')
            ->setVersion($this->getVersion());
    }

    protected function getVersion(): ?string
    {
        $versionFile = implode(DIRECTORY_SEPARATOR, [$this->project->getDirectory(), 'composer.lock']);
        $filePath = $this->getRootDir() . $versionFile;

        if (!file_exists($filePath)) {
            return null;
        }

        $file = File::get($filePath);

        return Str::of($file)->after('"name": "laravel/framework",')->after("version")->after("v")->before("\"")->toString();
    }
}
