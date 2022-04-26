<?php

namespace App\Models;

use Illuminate\Support\Str;

class Project
{
    protected string $icon = '/slon-256.png';

    public function __construct(protected string $directory)
    {
    }

    public function getName(): string
    {
        return Str::ucfirst($this->directory);
    }

    public function getUrl(): string
    {
        return str_replace("#NAME#", $this->directory, $this->getLinkTemplate());
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $iconSrc): static
    {
        $this->icon = $iconSrc;

        return $this;
    }

    protected function getLinkTemplate(): string
    {
        return env('PROJECTS_LINK_TEMPLATE');
    }
}
