<?php

namespace App\BackendCore;

abstract class AbstractCore
{
    public function getRootDir(): string
    {
        return env('PROJECTS_DIR') . DIRECTORY_SEPARATOR;
    }
}
