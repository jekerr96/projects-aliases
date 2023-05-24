<?php

namespace App\BackendCore;

use App\BackendCore\Dto\BackendCore;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BitrixBackendCore extends AbstractCore implements BackendCoreInterface
{
    public function __construct(protected Project $project)
    {
    }

    public function getBackendCore(): BackendCore
    {
        return BackendCore::make()
            ->setCore('Bitrix')
            ->setVersion($this->getVersion());
    }

    protected function getVersion(): ?string
    {
        $versionFile = implode(DIRECTORY_SEPARATOR, [$this->project->getDirectory(), 'www', 'bitrix', 'modules', 'main', 'classes', 'general', 'version.php']);
        $filePath = $this->getRootDir() . $versionFile;

        if (!file_exists($filePath)) {
            return null;
        }

        $file = File::get($filePath);

        return Str::of($file)->after(',')->before(')')->replace("\"", '')->trim()->toString();
    }
}
